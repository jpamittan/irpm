<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Question extends Model
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

    public function submissionReviews(): ?HasMany
    {
        return $this->hasMany(SubmissionReview::class, 'submissions_id', 'id');
    }

    public function answers(): ?HasMany
    {
        return $this->hasMany(Answer::class, 'questions_id', 'id');
    }
}
