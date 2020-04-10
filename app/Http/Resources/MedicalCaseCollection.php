<?php

namespace App\Http\Resources;

use App\Http\Resources\MedicalCaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalCaseCollection extends ResourceCollection
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
            'data' => MedicalCaseResource::collection($this->collection)
        ];
    }
}
