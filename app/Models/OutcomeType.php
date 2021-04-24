<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutcomeType extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $table = 'outcome_type';
    protected $guarded = [];
    protected $casts = [];
}
