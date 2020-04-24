<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * @property                    $id
 * @property unsignedBigInteger	$medical_case_id
 * @property unsignedBigInteger	$hospital_id
 * @property string	            $status	                  nullable
 * @property string	            $stage	                  nullable
 * @property string	            $final_result	            nullable
 * @property date	              $last_changed	            nullable
 * @property boolean	          $is_went_abroad	          default(false)
 * @property string	            $visited_country	        nullable
 * @property boolean	          $is_went_other_city	      default(false)
 * @property string	            $visited_city	            nullable
 * @property boolean	          $is_contact_with_positive	default(false)
 * @property string	            $history_notes            nullable
 * @property boolean	          $is_sample_taken	        default(false)
 * @property string	            $report_source	          nullable
 * @property date	              $first_symptom_date	      nullable
 * @property string	            $other_notes	            nullable
 * @property timestamp          $created_at
 * @property timestamp          $updated_at
 */
class MedicalCaseHistory extends Model
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
        'other_notes',
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
