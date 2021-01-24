<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $guarded = [];
    protected $casts = [];

    public function submissionReviews(): ?HasMany
    {
        return $this->hasMany(SubmissionReview::class, 'submissions_id', 'id');
    }

    public function answers(): ?HasMany
    {
        return $this->hasMany(Answer::class, 'questions_id', 'id');
    }
}
