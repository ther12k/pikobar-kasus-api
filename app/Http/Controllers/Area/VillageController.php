<?php

namespace App\Http\Controllers\Area;

use App\Area;
use App\Http\Controllers\ApiController;

class VillageController extends ApiController
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($district_code)
    {
        $area = Area::where('code_kemendagri', $district_code)->first();

        $villages = Area::where('parent_id', $area->id)
            ->orderBy('code_kemendagri')
            ->get();

        return $this->showAll($villages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($village_code)
    {   
        $village = Area::where('code_kemendagri', $village_code)
            ->firstOrFail();

        return $this->showOne($village);
    }
}
