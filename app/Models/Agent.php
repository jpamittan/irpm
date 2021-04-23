<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_ach';
    }

    protected $table= 'Meta_BrokerAgent';
    protected $guarded = [];
    protected $casts = [];
}
