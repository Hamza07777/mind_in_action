<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.list')->with('employee',employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee=new employee();
        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('employee_image'),$filename);
        $services = implode(",", $request->get('services'));

        $employee->name=$request->name;
        $employee->email =$request->email;
        $employee->address=$request->address;
        $employee->phone_number=$request->phone_number;
        $employee->working_hours=$request->working_hours;
        $employee->start_time=$request->start_time;
        $employee->end_time=$request->end_time;
        $employee->gender=$request->gender;
        $employee->image=$filename;
        $employee->save();
        return redirect('/employee');
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
        $employee=employee::findOrFail($id);
        return view('employee.edit')->with('employee',$employee);

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

        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('employee_image'),$filename);



        employee::whereId($id)->update([

        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'phone_number'=>$request->phone_number,
        'working_hours'=>$request->working_hours,
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time,
        'gender'=>$request->gender,
        'image'=>$filename,

            ]);
            return redirect('/employee');
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
        $branch=employee::findOrFail($id);
        $branch->delete();
        return redirect('/employee');
    }
}
