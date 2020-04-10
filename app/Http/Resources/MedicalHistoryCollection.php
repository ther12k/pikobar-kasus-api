<?php

namespace App\Http\Resources;

use App\Http\Resources\MedicalHistoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalHistoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => MedicalHistoryResource::collection($this->collection)
        ];
    }
}
