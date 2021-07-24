<?php

namespace App\Http\Resources;
use Carbon\Carbon;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleUserResource extends JsonResource
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

            'id' =>$this->id,

           'full_name' => $this->full_name ==null ? '0' : $this->full_name,

           'username' => $this->username ==null ? '0' : $this->username,

           'email' => $this->email ==null ? '0' : $this->email,

           'password' => $this->password ==null ? '0' : $this->password,

           'country' => $this->country ==null ? '0' : $this->country,

           'city' => $this->city ==null ? '0' : $this->city,

           'gender' => $this->gender ==null ? '0' : $this->gender,

           'age' => $this->age ==null ? '0' : $this->age,

           'school' => $this->school ==null ? '0' : $this->school,

           'image' => $this->image ==null ? '0' : asset('userimage/'.$this->image),

           'phone_number' => $this->phone_number ==null ? '0' : $this->phone_number,

           'isVerified' => $this->isVerified ==null ? '0' : $this->isVerified,

           'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),

       ];
    }
}
