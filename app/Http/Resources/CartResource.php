<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return[
            'id'=>$this->id,
            'attributes'=>[
               'name'=>$this->course_name,
               'price'=>$this->price,
               'user_id'=>$this->user_id,
               'course_id'=>$this->course_id,
               'price'=>$this->price,
               'qty'=>$this->qty,
           ],
           
       ];
    }
}
