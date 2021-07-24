<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Http\Resources\SingleUserAgeResource;
use App\Http\Resources\SingleUserCountryResource;
use App\Http\Resources\SingleUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


        public function __construct($client = null, string $verification_sid = null)
        {

            if ($client === null) {
                $sid = "ACc2f48cbc9890be69d26eb91762c8da22";
                $token = "8199d7e3d8ec946cb351b73f89602703";
                $client = new Client($sid, $token);
            }
            $this->client = $client;
            $this->verification_sid = $verification_sid ?: "VA3a509fb7fc0e98aa1d3e925464ef4b78";


    }
    public function index()
    {
        return view('Users.list')->with('user',User::all());
    }
    public function response(Request $request)
    {
        $user_id=$request->user_id;
        $code=$request->code;
        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            if ($user->email_code==$code) {
                $user->markEmailAsVerified();
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Email Verified',


                ]);

            }
            else{
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Email Not Verified',


                ]);
            }

        }
        else{
            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$user_id,

                'message'=>'Email Already Verified',


            ]);


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $code=Str::random(6);
        $token = "8199d7e3d8ec946cb351b73f89602703";
        $twilio_sid = "ACc2f48cbc9890be69d26eb91762c8da22";
        $twilio_verify_sid = "VA3a509fb7fc0e98aa1d3e925464ef4b78";
        $twilio = new Client($twilio_sid, $token);


            User::create([
                    'full_name' => $request['full_name'],
                    'username' => $request['username'],
                    'phone_number' => $request['phone_number'],
                    'email' => $request['email'],
                    'email_code' => $code,
                    'password' => Hash::make($request['password']),
                ]);



        $id=User::max('id');
        if(User::where('email', $request['email'])->exists()){
            // your code...

            $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create(

                $request['phone_number'], "sms");
                $details = [
                    'to' => $request['email'],
                    'from' => 'dev07@imtekh.com',
                    'subject' => 'Verfication code of Mind in Action',
                    'title' => 'Vefification',
                    "body"  => $code,
                ];

                Mail::to($request->email)->send(new \App\Mail\serverMail($details));
            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Add successfully',

                'phone_number' => $request['phone_number'],


            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
        }
    }


    public function social_store(Request $request)
    {

            User::create([
                    'full_name' => $request['full_name'],
                    'username' => $request['username'],
                    'phone_number' => $request['phone_number'],
                    'email' => $request['email'],
                    'email_code' => $code,
                    'password' => bcrypt($request['password']),
                ]);



        $id=User::max('id');
            // your code...

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Add successfully',

                'phone_number' => $request['phone_number'],


            ]);


            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);

    }


    public function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = "8199d7e3d8ec946cb351b73f89602703";
        $twilio_sid = "ACc2f48cbc9890be69d26eb91762c8da22";
        $twilio_verify_sid = "VA3a509fb7fc0e98aa1d3e925464ef4b78";
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request['verification_code'], array('to' => $request['phone_number']));
        if ($verification->valid) {
            $user = tap(User::where('phone_number', $request['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            $id=User::max('id');
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$id,

                    'message'=>'User Add successfully',

                    ]);

            }
            else{

                return response([

                    'message'=>'Record Not Created..',
                    'status' =>'error'
                ]);
            }

    }
    public function verify_email(Request $request) {


    }
    public function user_detail_age(Request $request, $id)
    {

        $user=User::find($id);
        $user->gender=$request->gender;
        $user->age=$request->age;
        $user->school=$request->school;
        $result=$user->save();

        if ($result) {

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Detail Added successfully',

            ]);
        }else{

            return response([

                'message'=>'User Not Found..',
                'status' =>'error'
            ]);
        }
    }

    public function user_detail_country(Request $request, $id)
    {

        $user=User::find($id);
        $user->country=$request->country;
        $user->city=$request->city;

        $result=$user->save();

        if ($result) {

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Detail Added successfully',

            ]);
        }else{

            return response([

                'message'=>'User Not Found..',
                'status' =>'error'
            ]);
        }

    }
    public function login(Request $request){

        if (empty($request->email) || empty($request->password)) {

    		return response(['message' => 'Email And Password Are Required','status' =>'error']);

    	}else{

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::where('email',$request->email)->first();
            if(!empty($user->email_verified_at) & !empty($user->isVerified) )
            {
                return new LoginResource(Auth::user());
            }
            else{
                return response(['message' => 'Email or Phone Number is not verifief','status' =>'error']);
            }


        }else{

               return response(['message' => 'These Crediantals Not Matched','status' =>'error']);

            }
         }
     }


     public function user_social_login(Request $request){

        $user = User::where('email',$request->email1)->first();
        if (!empty($user)) {


                  if(!empty($user->phone_number)){
                    return new LoginResource($user);
                }
                else{
                    return response([

                        'message'=>'User Detail not found',
                        'status' =>'error',

                        'user_attempt' =>true,

                        'uid' =>$user->id,
                    ]);

                }

        }else{
            User::create([
                'username' => $request['username1'],
                'email' => $request['email1'],

            ]);
            $id=User::max('id');
                return response([
                    'status' =>true,

                    'token' =>true,

                    'email' =>$request['email1'],

                    'user_attempt' =>true,
                    'data' =>[
                        'user' =>[
                           'id' =>$id,
                           ],
                   ],

                    'message'=>'User Add successfully',

                    ]);

            }
         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        if ($user) {

            return  new SingleUserResource($user);

         }else{

            return response(['message' => 'User Not Found','status' =>'error']);
         }
    }
    public function edit_age($id)
    {
        $user=User::find($id);
        if ($user) {

            return  new SingleUserAgeResource($user);

         }else{

            return response(['message' => 'User Not Found','status' =>'error']);
         }
    }
    public function edit_country($id)
    {
        $user=User::find($id);
        if ($user) {

            return  new SingleUserCountryResource($user);

         }else{

            return response(['message' => 'User Not Found','status' =>'error']);
         }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
          $user=User::find($id);
            if($request->hasFile('image')){
                $extension=$request->image->extension();
                    $image_name=time()."_.".$extension;
                    $request->image->move(public_path('userimage'),$image_name);
            }elseif(empty($request->image) & !empty($user->image)){
                $username=$user->image;
            }
            else
            {
                $image_name='';
            }

        if(empty($request->full_name)){
            $full_name=$user->full_name;
        }
        else{
            $full_name=$request->full_name;
        }

        if(empty($request->username)){
            $username=$user->username;
        }
        else{
            $username=$request->username;
        }

        if(empty($request->phone_number)){
            $phone_number=$user->phone_number;
        }
        else{
            $phone_number=$request->phone_number;
        }

        if(empty($request->email)){
            $email=$user->email;
        }
        else{
            $email=$request->email;
        }

        if(empty($request->password)){
            $password=$user->password;
        }
        else{
            $password=$request->password;
        }

        if(empty($request->gender)){
            $gender=$user->gender;
        }
        else{
            $gender=$request->gender;
        }

        if(empty($request->age)){
            $age=$user->age;
        }
        else{
            $age=$request->age;
        }

        if(empty($request->school)){
            $school=$user->school;
        }
        else{
            $school=$request->school;
        }
        if(empty($request->country)){
            $country=$user->country;
        }
        else{
            $country=$request->country;
        }

        if(empty($request->city)){
            $city=$user->city;
        }
        else{
            $city=$request->city;
        }



        $result=User::whereId($id)->update([
            'full_name'=>$full_name,
            'username'=>$username,
            'phone_number'=>$phone_number,
            'email'=>$email,
            'password'=>bcrypt($password),
            'gender'=>$gender,
            'age'=>$age,
            'school'=>$school,
            'country'=>$country,
            'city'=>$city,
            'image'=>$image_name,
        ]);


        $users=User::find($id);
        if ($result) {
            return  new SingleUserAgeResource($users);

        }else{

            return response([

                'message'=>'User Not Found..',
                'status' =>'error'
            ]);
        }

    }

    public function user_detail_age_update(Request $request, $id)
    {

        $user=User::find($id);
        $user->gender=$request->gender;
        $user->age=$request->age;
        $user->school=$request->school;
        $result=$user->save();

        if ($result) {

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Update successfully',

            ]);
        }else{

            return response([

                'message'=>'User Not Found..',
                'status' =>'error'
            ]);
        }
    }

    public function user_detail_country_update(Request $request, $id)
    {

        $user=User::find($id);
        $user->country=$request->country;
        $user->city=$request->city;
        $result=$user->save();

        if ($result) {

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'User Update successfully',

            ]);
        }else{

            return response([

                'message'=>'User Not Found..',
                'status' =>'error'
            ]);
        }

    }



    public function password_reset_link(Request $request)
    {
        $code= mt_rand(100000, 999999); //Str::random(6);
        if(User::where('email', $request['email'])->exists()){
            // your code...
                $details = [
                    'to' => $request['email'],
                    'from' => 'dev07@imtekh.com',
                    'subject' => 'Verfication code of Mind in Action',
                    'title' => 'Vefification',
                    "body"  => $code,
                ];
               $user= User::where('email', $request['email'])->first();
               $id=$user->id;
                Mail::to($request->email)->send(new \App\Mail\serverMail($details));
                User::whereId($id)->update([
                    'email_code' => $code,
                 ]);

            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$id,

                'message'=>'Password Reset Link send  successfully',


            ]);
        }else{

            return response([

                'message'=>'User Not Found',
                'status' =>'error'
            ]);
        }
    }
    public function password_update(Request $request)
    {

                $result=User::whereId($request['id'])->update([
                    'password' => Hash::make($request['password']),
                 ]);
                 if($result){
            return response([
                'status' =>true,

                'token' =>true,

                'message'=>'Password Updated Successfully',

            ]);
        }else{

            return response([

                'message'=>'Password Not update',
                'status' =>'error'
            ]);
        }
    }


    public function password_reset_link_verify(Request $request)
    {
        $user_id=$request->user_id;
        $code=$request->code;
        $user = User::findOrFail($user_id);

            if ($user->email_code==$code) {
                $user->markEmailAsVerified();
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Code Verified',


                ]);

            }
            else{
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Code Not Verified',


                ]);
            }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
