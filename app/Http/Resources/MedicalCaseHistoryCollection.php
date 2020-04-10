<?php

namespace App\Http\Resources;

use App\Http\Resources\MedicalCaseHistoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalCaseHistoryCollection extends ResourceCollection
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
            'data' => MedicalCaseHistoryResource::collection($this->collection)
        ];
    }
}
