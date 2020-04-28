<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\MedicalCaseStoreRequest;
use App\Http\Resources\MedicalCaseResource;
use App\MedicalCase;
use Illuminate\Http\Request;

class MedicalCaseController extends Controller
{
    /**
     * MedicalCaseController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(MedicalCase::class, 'medical-case');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MedicalCase::select();

        if ($request->has('search')) {
            $query->where('id_case', 'like', '%'.$request->search.'%')
                ->orWhere('name', 'like', '%'.$request->search.'%');
        }

        $order = $request->order == 'asc' ? 'asc' : 'desc';
        $query->orderBy($request->query('sort','created_at'), $order);

        $medicalCases = $query->paginate($request->query('limit',15));

        return MedicalCaseResource::collection($medicalCases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalCaseStoreRequest $request)
    {
        $request->validated();

        $user = $request->user();

        $verifiedStatus = MedicalCase::VERIFIED_PENDING;

        if ($user->can('cases.create')) {
            $verifiedStatus = MedicalCase::VERIFIED;
        }

        $data = $request->all();

        // assign into payload
        $data['case_code']         = MedicalCase::generateNextCaseCode($request->city_code);
        $data['author_id']       = $user->id;
        $data['verified_status'] = $verifiedStatus;

        $medicalCase = MedicalCase::create($data);

        return new MedicalCaseResource($medicalCase->fresh());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalCase  $medicalCase
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCase $medicalCase)
    {
        return new MedicalCaseResource($medicalCase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalCase $medicalCase)
    {
        $rules = [
            'area_id'       => 'exists:areas,id',
            'author_id'     => 'exists:users,id',
            'occupation_id' => 'exists:occupations,id',
            'age'           => 'integer',
            'gender'        => 'in:'.MedicalCase::MALE_GENDER.','.MedicalCase::FEMALE_GENDER,
        ];

        $medicalCase->fill($request->all());

        if ($medicalCase->isClean()) {
            return $this->errorResponse(
                'You need to specify any different value to update.',
                422
            );
        }

        $request->validate($rules);

        $medicalCase->save();

        return new MedicalCaseResource($medicalCase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalCase  $medicalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalCase $medicalCase)
    {
        $medicalCase->delete();

        return response()->json(null);
    }
}
