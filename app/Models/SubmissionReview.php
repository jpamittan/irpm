<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class SubmissionReview extends Model
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

    public function question(): ?HasOne
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }
}
