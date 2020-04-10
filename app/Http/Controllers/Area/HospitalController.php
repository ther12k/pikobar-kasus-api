<?php

namespace App\Http\Controllers\Area;

use App\Hospital;
use App\Http\Controllers\ApiController;

class HospitalController extends ApiController
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return $this->showAll($hospitals);
    }
}
