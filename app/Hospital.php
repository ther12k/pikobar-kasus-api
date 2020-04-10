<?php

namespace App;

use App\Area;
use App\MedicalHistory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function medicalHistories()
    {
    	return $this->hasMany(MedicalHistory::class);
    }
}
