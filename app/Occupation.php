<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * @property              $id
 * @property string	      $title
 * @property tinyInteger	$sequence
 * @property tinyInteger	$status	    nullable
 * @property timestamp    $deleted_at Used for softdelete function
 */
class Occupation extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function medicalCases()
    {
        return $this->hasMany(MedicalCase::class);
    }
}
