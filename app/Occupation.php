<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public function cases()
    {
    	return $this->hasMany(Case_::class, 'case_id', 'id');
    }
}
