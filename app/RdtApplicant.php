<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RdtApplicant extends Model
{
    public function event()
    {
        return $this->belongsTo(RdtEvent::class);
    }
}
