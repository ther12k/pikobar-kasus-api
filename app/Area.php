<?php

namespace App;

use App\Case_;
use App\Hospital;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }

    public function cases()
    {
    	return $this->hasMany(Case_::class);
    }

    public function getDinkesCode()
    {
        return substr($this->code_kemendagri, 0, 5);
    }
}
