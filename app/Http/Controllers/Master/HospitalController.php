<?php

namespace App\Http\Controllers\Master;

use App\Hospital;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Hospital as HostpitalResource;
use Illuminate\Http\Request;

class HospitalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hospitals = Hospital::query();

        if ($request->has('search')) {
            $hospitals = $hospitals->where('name','LIKE','%'.$request->input('search').'%');
        }

        $records = $hospitals->get();

        return HostpitalResource::collection($records);
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
