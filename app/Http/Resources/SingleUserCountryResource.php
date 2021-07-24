<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleUserCountryResource extends JsonResource
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

           'country' => $this->country ==null ? '0' : $this->country,

           'city' => $this->city ==null ? '0' : $this->city,



           'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),

       ];
    }
}
