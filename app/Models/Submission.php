<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    HasOne,
    HasMany
};

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

    public function submissionMods(): ?HasMany
    {
        return $this->hasMany(SubmissionMod::class, 'submissions_id', 'id');
    }

    public function latestSubmissionMods(): ?HasOne
    {
        return $this->hasOne(SubmissionMod::class, 'submissions_id', 'id')
            ->latest();
    }

    public function submissionReviews(): ?HasMany
    {
        return $this->hasMany(SubmissionReview::class, 'submissions_id', 'id');
    }
}
