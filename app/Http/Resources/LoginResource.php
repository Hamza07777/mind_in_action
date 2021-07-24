<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                 'message' => 'Login Successfully',

                 'status' =>true,

                 'token' =>true,

                 'user_attempt' =>false,

                'user' =>[
                    'id' =>$this->id,

                    'full_name' => $this->full_name ==null ? '0' : $this->full_name,

                    'email' => $this->email ==null ? '0' : $this->email,

                    'password' => $this->password ==null ? '0' : $this->password,

                    'username' => $this->username ==null ? '0' : $this->username,

                    'image' => $this->image ==null ? '0' : asset('userimage/'.$this->image),

                    'phone_number' => $this->phone_number ==null ? '0' : $this->phone_number,

                    'isVerified' => $this->isVerified ==null ? '0' : $this->isVerified,
                ],






        ];
    }
}
