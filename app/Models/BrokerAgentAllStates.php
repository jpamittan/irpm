<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerAgentAllStates extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_codeeast';
    }

    protected $table = 'Meta_BrokerAgent_AllStates';
    protected $guarded = [];
    protected $casts = [];
}
