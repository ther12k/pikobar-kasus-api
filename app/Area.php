<?php

namespace App;

use App\MedicalCase;
use App\Hospital;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }

    public function medicalCases()
    {
    	return $this->hasMany(MedicalCase::class);
    }

    public function getDinkesCode()
    {
        return substr($this->code_kemendagri, 0, 5);
    }
}
