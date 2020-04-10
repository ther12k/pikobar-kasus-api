<?php

namespace App\Http\Resources;

use App\Http\Resources\CaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CaseCollection extends ResourceCollection
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
            'data' => CaseResource::collection($this->collection)
        ];
    }
}
