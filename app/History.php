<?php

namespace App;

use App\Case_;
use App\Hospital;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'case_id',
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

    public function case()
    {
        return $this->belongsTo(Case_::class, 'case_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
