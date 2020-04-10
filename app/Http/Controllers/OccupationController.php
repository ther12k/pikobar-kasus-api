<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Occupation as OccupationResource;
use App\Occupation;

class OccupationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupations = Occupation::all();

        return OccupationResource::collection($occupations);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        return new OccupationResource($occupation);
    }
}
