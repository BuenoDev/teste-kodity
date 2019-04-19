<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'brandId'=> $this->brand->id,
            'brand' => $this->brand->name,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
