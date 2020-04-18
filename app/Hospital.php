<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Area::class, 'province_code', 'code_kemendagri');
    }

    public function city()
    {
        return $this->belongsTo(Area::class, 'city_code', 'code_kemendagri');
    }

    public function district()
    {
        return $this->belongsTo(Area::class, 'district_code', 'code_kemendagri');
    }

    public function village()
    {
        return $this->belongsTo(Area::class, 'village_code', 'code_kemendagri');
    }

    public function medicalCaseHistories()
    {
        return $this->hasMany(MedicalCaseHistory::class);
    }
}
