<?php

namespace App;

use App\User;
use App\MedicalCaseHistory;
use App\Occupation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalCase extends Model
{
    use SoftDeletes;

    const MALE_GENDER = 'PRIA';
    const FEMALE_GENDER = 'WANITA';

    const VERIFIED = 'verified';
    const VERIFIED_PENDING = 'pending';

    protected $fillable = [
        'area_id',
        'occupation_id',
        'author_id',
        'id_case',
        'id_case_national',
        'id_case_related',
        'nik',
        'name',
        'birth_date',
        'age',
        'gender',
        'address',
        'office_address',
        'phone_number',
        'nationality',
        'nationality_name',
        'verified_status',
        'verified_comment'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

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
