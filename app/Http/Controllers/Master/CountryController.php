<?php

namespace App\Http\Controllers\Master;

use App\Country;
use App\Http\Resources\Country as CountryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::query();

        if ($request->has('search')) {
            $countries = $countries->where('name','LIKE','%'.$request->input('search').'%')
                                 ->orWhere('code','LIKE','%'.$request->input('search').'%');
        }

        $records = $countries->get();

        return CountryResource::collection($records);
    }
}
