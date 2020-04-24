<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property string	      $name
 * @property string	      $code
 * @property tinyInteger	$status  nullable
 * @property timestamp    $created_at
 * @property timestamp    $updated_at
 * @property timestamp    $deleted_at  Used for softdelete function
 */
class Country extends Model
{
    public function medicalCases()
    {
        return $this->hasMany(User::class, 'nationality_country_id');
    }
}
