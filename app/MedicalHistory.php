<?php

namespace App;

use App\MedicalCase;
use App\Hospital;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
        'medical_case_id',
        'hospital_id',
        'status',
        'stage',
        'final_result',
        'last_changed',
        'is_went_abroad',
        'visited_country',
        'is_went_other_city',
        'visited_city',
        'is_contact_with_positive',
        'history_notes',
        'is_sample_taken',
        'report_source',
        'first_symptom_date',
        'other_notes'
    ];

    public function medicalCase()
    {
        return $this->belongsTo(MedicalCase::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
