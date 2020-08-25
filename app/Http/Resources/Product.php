<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'product',
                'product_id' => $this->id,
                'attributes' => [
                    'heading' => $this->heading,
                    'description' => $this->description,
                    'price' =>  $this->price
                ]
            ],
//            'links' => [
//                'self' => url('/product/' . $this->id),
//            ]
        ];
    }
}
