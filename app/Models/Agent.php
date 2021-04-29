<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_ach_uat';
    }

    protected $table = 'ACH_UAT.dbo.Agents';
    protected $primaryKey = 'AgentKey';
    protected $guarded = [];
    protected $casts = [];
    protected $hidden = [
        'AgentRoutingNumber',
        'AccountNumber'
    ];
    const CREATED_AT = 'DateTimeCreated';
    const UPDATED_AT = 'DateTimeModified';
}
