<?php

namespace App;

use App\User;
use App\Hospital;
use App\MedicalCase;
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

    public function users()
    {
        return $this->hasMany(User::class, 'city_code', 'code_kemendagri');
    }

    public function childs()
    {
    	return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo(self::class, 'id', 'parent_id');
    }
}
