<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalCaseResource extends JsonResource
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
            'area_id' => $this->area_id,
            'occupation_id' => $this->occupation_id,
            'author_id' => $this->author_id,
            'id_case' => $this->id_case,
            'id_case_national' => $this->id_case_national,
            'id_case_related'=> $this->id_case_related,
            'nik'=> $this->nik,
            'name'=> $this->name,
            'birth_date'=> $this->birth_date,
            'age'=> $this->age,
            'gender'=> $this->gender,
            'address'=> $this->address,
            'office_address'=> $this->office_address,
            'phone_number'=> $this->phone_number,
            'nationality'=> $this->nationality,
            'nationality_country_id'=> $this->nationality_country_id,
            'verified_status'=> $this->verified_status,
            'verified_comment'=> $this->verified_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
