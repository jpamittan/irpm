<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionMod extends Model
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

    public function outcomeType()
    {
        return $this->hasOne(OutcomeType::class, 'id', 'outcome_type_id');
    }
}
