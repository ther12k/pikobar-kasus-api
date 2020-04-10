<?php

namespace App;

use App\MedicalCase;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public function medicalCases()
    {
    	return $this->hasMany(MedicalCase::class);
    }
}
