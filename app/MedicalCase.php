<?php

namespace App;

use App\Area;
use App\Entities\Concerns\HasArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * @property                    $id
 * @property string	            $case_code	        nullable
 * @property string	            $national_case_code	nullable
 * @property string	            $related_case_code	nullable
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
 * @property unsignedBigInteger	$occupation_id

 * @property tinyInteger	      $nationality	    nullable
 * @property unsignedBigInteger	$nationality_country_id

 * @property string	            $verified_status	nullable
 * @property string	            $verified_comment nullable
 * @property unsignedBigInteger	$author_id
 * @property timestamp          $created_at
 * @property timestamp          $updated_at
 * @property timestamp          $deleted_at       Used for softdelete function
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
        //'case_code',
        'national_case_code',
        'related_case_code',
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
        'office_address',
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

    /*
     * Generate next case_code for a given city code
     *
     * @return string the next case code
     */
    static function generateNextCaseCode($kemendagri_code)
    {
        $area = Area::where('code_kemendagri', $kemendagri_code)->first();

        $last_case = $area->medicalCases()
                          ->withTrashed()
                          ->orderBy('created_at', 'desc')
                          ->first();

        if (empty($last_case)) {
            $last_area_case_number = "1";
        } else {
            $last_area_case_number = (integer)substr($last_case->case_code, 12);
            $last_area_case_number++;
            $last_area_case_number = (string) $last_area_case_number;
        }

        $new_case_code = "covid-";
        $new_case_code .= $area->code_dinkes;
        $new_case_code .= substr(date("Y"), 2, 2);
        $new_case_code .= str_repeat("0", (4 - strlen($last_area_case_number)));
        $new_case_code .= $last_area_case_number;

        return $new_case_code;
    }

}
