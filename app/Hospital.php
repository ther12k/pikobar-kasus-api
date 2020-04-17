<?php

namespace App;

use App\Area;
use App\MedicalCaseHistory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function medicalCaseHistories()
    {
    	return $this->hasMany(MedicalCaseHistory::class);
    }
}
