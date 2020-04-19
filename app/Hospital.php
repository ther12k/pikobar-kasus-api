<?php

namespace App;

use App\Entities\Concerns\HasArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
