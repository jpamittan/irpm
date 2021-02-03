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
    const UPDATED_AT = 'updated_date';

    public function question(): ?HasOne
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }

    public function getAnswerValueAttribute($value)
    {
        $scores = [
            'continue',
            'Continue',
            'Continue ',
            '500/500',
            '1,000/1,000',
            'Continue as None'
        ];

        return (in_array($value, $scores)) ? null : $value;
    }
}
