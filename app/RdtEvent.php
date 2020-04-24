<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RdtEvent extends Model
{
    public function applicants()
    {
        return $this->hasMany(RdtApplicant::class);
    }
}
