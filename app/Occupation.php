<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * @property              $id
 * @property string	      $title
 * @property tinyInteger	$sequence
 * @property tinyInteger	$status	    nullable
 * @property timestamp    $deleted_at
 */
class Occupation extends Model
{
    public function medicalCases()
    {
        return $this->hasMany(MedicalCase::class);
    }
}
