<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutcomeType extends Model
{
    protected $connection= 'sqlsrv_uat';
    protected $table= 'outcome_type';

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
}
