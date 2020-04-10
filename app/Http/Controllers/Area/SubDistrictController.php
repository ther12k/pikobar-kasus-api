<?php

namespace App\Http\Controllers\Area;

use App\Area;
use App\Http\Controllers\ApiController;

class SubDistrictController extends ApiController
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city_code)
    {
        $area = Area::where('code_kemendagri', $city_code)->first();

        $subDistricts = Area::where('parent_id', $area->id)
            ->orderBy('code_kemendagri')
            ->get();

        return $this->showAll($subDistricts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sub_district_code)
    {   
        $subDistrict = Area::where('code_kemendagri', $sub_district_code)
            ->firstOrFail();

        return $this->showOne($subDistrict);
    }
}
