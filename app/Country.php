<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function medicalCases()
    {
        return $this->hasMany(User::class, 'nationality_country_id');
    }
}
