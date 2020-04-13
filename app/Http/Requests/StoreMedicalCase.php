<?php

namespace App\Http\Requests;

use App\MedicalCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalCase extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'area_id' => 'required|exists:areas,id',
            'occupation_id' => 'required|exists:occupations,id',
            'age' => 'required|integer',
            'gender' => 'required|in:' . MedicalCase::MALE_GENDER . ',' . MedicalCase::FEMALE_GENDER,
            'name' => 'required',
        ];
    }
}
