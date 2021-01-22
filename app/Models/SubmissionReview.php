<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class SubmissionReview extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $guarded = [];
    protected $casts = [];

    public function question(): ?HasOne
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }

    public function getAnswerValueAttribute($value)
    {
        return (strtolower($value) == 'continue') ? null : $value;
    }
}
