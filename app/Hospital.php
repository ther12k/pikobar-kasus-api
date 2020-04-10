<?php

namespace App;

use App\Area;
use App\History;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function histories()
    {
    	return $this->hasMany(History::class);
    }
}
