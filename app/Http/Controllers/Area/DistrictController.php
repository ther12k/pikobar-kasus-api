<?php

namespace App\Http\Controllers\Area;

use App\Area;
use App\Http\Controllers\ApiController;

class DistrictController extends ApiController
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
        $areas = Area::all();

        return $this->showAll($areas);
    }

}
