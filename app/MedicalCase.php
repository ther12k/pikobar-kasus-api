<?php

namespace App;

use App\Entities\Concerns\HasArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * @property                    $id
 * @property string	            $id_case	        nullable
 * @property string	            $id_case_national	nullable
 * @property string	            $id_case_related	nullable
 * @property string	            $nik	            unique,nullable
 * @property string	            $name
 * @property date	              $birth_date	      nullable
 * @property unsignedInteger	  $age
 * @property string	            $gender	          index
 * @property string	            $phone_number	    nullable

 * @property string	            $address	        nullable
 * @property string	            $province_code	  nullable
 * @property string	            $city_code	      nullable
 * @property string	            $district_code	  nullable
 * @property string	            $village_code	    nullable
 * @property string	            $office_address	  nullable
 * @property unsignedBigInteger	$occupation_id');

 * @property tinyInteger	      $nationality	    nullable
 * @property unsignedBigInteger	$nationality_country_id

 * @property string	            $verified_status	nullable
 * @property string	            $verified_comment nullable
 * @property unsignedBigInteger	$author_id
 * @property timestamp          $created_at
 * @property timestamp          $updated_at
 * @property timestamp          $deleted_at
 */
class MedicalCase extends Model
{
    use HasArea, SoftDeletes;

    const MALE_GENDER = 'PRIA';
    const FEMALE_GENDER = 'WANITA';

    const VERIFIED = 'verified';
    const VERIFIED_PENDING = 'pending';

    const WNI = 1;
    const WNA = 2;

    protected $fillable = [
        'id_case',
        'id_case_national',
        'id_case_related',
        'nik',
        'name',
        'birth_date',
        'age',
        'gender',
        'phone_number',
        'address',
        'province_code',
        'city_code',
        'district_code',
        'village_code',
        'office_addres',
        'occupation_id',
        'nationality',
        'nationality_country_id',
        'verified_status',
        'verified_comment',
        'author_id',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'nationality_country_id' => 102, //Indonesia
    ];

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function medicalCaseHistories()
    {
        return $this->hasMany(MedicalCaseHistory::class);
    }

}
