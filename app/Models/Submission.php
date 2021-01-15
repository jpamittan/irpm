<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $connection= 'sqlsrv_uat';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function submissionMods()
    {
        return $this->hasMany(SubmissionMod::class, 'submissions_id', 'id');
    }

    public function latestSubmissionMods()
    {
        return $this->hasOne(SubmissionMod::class, 'submissions_id', 'id')
            ->latest();
    }
}
