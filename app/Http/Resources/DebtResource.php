<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DebtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->user_id,
            'product_name'=>$this->product_name,
            "product_count"=>$this->product_count,
            'd_name'=>$this->d_name,
            'd_phone'=>$this->d_phone,
            'cost'=>$this->cost,
            'status'=>$this->status,
            "date"=>$this->date
        ];
    }
}
