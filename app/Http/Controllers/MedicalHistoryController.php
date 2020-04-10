<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalHistories = MedicalHistory::all();

        return $this->showAll($medicalHistories);
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
            'medical_case_id' => 'required|exists:medical_cases,id',
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

        // todo default or specifed generating value
        // $data['attr'] = User::REGULAR_USER;

        $medicalHistory = MedicalHistory::create($data);

        return $this->showOne($medicalHistory->fresh(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalHistory $medicalHistory)
    {
        return $this->showOne($medicalHistory);
    }
}
