<?php

namespace App;

use App\Entities\Concerns\HasArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * @property              $id
 * @property string	      $province_code	nullable
 * @property string	      $city_code	    nullable
 * @property string	      $district_code	nullable
 * @property string	      $village_code	  nullable
 * @property string	      $name
 * @property string	      $description	  nullable
 * @property string	      $address	      nullable
 * @property string	      $phone_numbers	nullable
 * @property tinyInteger	$status	        nullable
 * @property timestamp    $created_at
 * @property timestamp    $updated_at
 * @property timestamp    $deleted_at
 */
class Hospital extends Model
{
    use HasArea, SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function medicalCaseHistories()
    {
        return $this->hasMany(MedicalCaseHistory::class);
    }
}
