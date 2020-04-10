<?php

namespace App\Http\Controllers\Master;

use App\Hospital;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Hospital as HostpitalResource;

class HospitalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return HostpitalResource::collection($hospitals);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return new HostpitalResource($hospital);
    }
}
