<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'medical_case_id' => $this->medical_case_id,
            'hospital_id' => $this->hospital_id,
            'status' => $this->status,
            'stage' => $this->stage,
            'final_result' => $this->final_result,
            'last_changed' => $this->last_changed,
            'is_went_abroad' => $this->is_went_abroad,
            'visited_country' => $this->visited_country,
            'is_went_other_city' => $this->is_went_other_city,
            'visited_city' => $this->visited_city,
            'is_contact_with_positive' => $this->is_contact_with_positive,
            'history_notes' => $this->history_notes,
            'is_sample_taken' => $this->is_sample_taken,
            'report_source' => $this->report_source,
            'first_symptom_date' => $this->first_symptom_date,
            'other_notes' => $this->other_notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
