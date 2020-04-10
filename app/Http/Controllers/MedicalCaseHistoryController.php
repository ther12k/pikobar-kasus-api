<?php

namespace App\Http\Controllers;

use App\MedicalCaseHistory;
use Illuminate\Http\Request;
use App\Http\Resources\MedicalCaseHistoryResource;
use App\Http\Resources\MedicalCaseHistoryCollection;
use App\MedicalCase;

class MedicalCaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicalCase $medicalCase)
    {
        $medicalCaseHistories = $medicalCase->medicalCaseHistories;

        return new MedicalCaseHistoryCollection($medicalCaseHistories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalCase $medicalCase, Request $request)
    {
        $rules = [
            'hospital_id' => 'required|exists:hospitals,id',
            'status' => 'required',
            'stage' => 'required',
            'final_result' => 'required',
            'last_changed' => 'required',
            'is_went_abroad' => 'required',
            'visited_country' => '',
            'is_went_other_city' => 'required',
            'visited_city' => '',
            'is_contact_with_positive' => 'required',
            'history_notes' => '',
            'is_sample_taken' => 'required',
            'report_source' => 'required',
            'first_symptom_date' => '',
            'other_notes' => ''
        ];

        $request->validate($rules);

        $data = $request->all();
        $data['medical_case_id'] = $medicalCase->id;

        $medicalCaseHistory = MedicalCaseHistory::create($data);

        return response(new MedicalCaseHistoryResource($medicalCaseHistory->fresh()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalCaseHistory  $medicalCaseHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalCase $medicalCase, MedicalCaseHistory $history)
    {
        return new MedicalCaseHistoryResource($history);
    }
}
