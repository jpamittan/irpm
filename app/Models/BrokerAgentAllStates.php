<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerAgentAllStates extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.codeeast');
    }

    protected $table = 'Meta_BrokerAgent_AllStates';
    protected $guarded = [];
    protected $casts = [];
}
