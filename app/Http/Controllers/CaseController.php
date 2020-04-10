<?php

namespace App\Http\Controllers;

use App\Area;
use App\Case_;
use Illuminate\Http\Request;
use App\Http\Resources\CaseResource;
use App\Http\Resources\CaseCollection;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cases = Case_::paginate(15);
        
        return new CaseCollection($cases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'area_id' => 'required|exists:areas,id',
            'occupation_id' => 'required|exists:occupations,id',
            'age' => 'required|integer',
            'gender' => 'required|in:' . Case_::MALE_GENDER . ',' . Case_::FEMALE_GENDER,
            'name' => 'required',
        ];

        $request->validate($rules);

        $user = $request->user();

        // Verified Status
        $verifiedStatus = Case_::VERIFIED_PENDING;

        if ($user->isDinkesKota())
        {
            $verifiedStatus = Case_::VERIFIED;
        }

        // generate id case
        $area = Area::find($request->area_id);

        $idCase = "covid-";
        $idCase .= $area->getDinkesCode();
        $idCase .= substr(date("Y"), 2, 2);
        $idCase .= str_repeat("0", (4 - strlen((string)$area->cases->count())));
        $idCase .= $area->cases->count();

        $data = $request->all();

        // assign into payload
        $data['id_case'] = $idCase;
        $data['author_id'] = $user->id;
        $data['verified_status'] = $verifiedStatus;

        $case = Case_::create($data);

        return response(new CaseResource($case->fresh()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(Case_ $case)
    {
        return new CaseResource($case);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Case_ $case)
    {
        $rules = [
            'area_id' => 'exists:areas,id',
            'author_id' => 'exists:users,id',
            'occupation_id' => 'exists:occupations,id',
            'age' => 'integer',
            'gender' => 'in:' . Case_::MALE_GENDER . ',' . Case_::FEMALE_GENDER
        ];

        $case->fill($request->all());

        if ($case->isClean())
        {
            return $this->errorResponse(
                'You need to specify any different value to update.',
                422
            );
        }

        $request->validate($rules);

        $case->save();

        return response(new CaseResource($case), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Case_ $case)
    {
        $case->delete();

        return response(new CaseResource($case));
    }
}
