<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_ach';
    }

    protected $table = 'ACH.dbo.Agents';
    protected $guarded = [];
    protected $casts = [];
    const CREATED_AT = 'DateTimeCreated';
    const UPDATED_AT = 'DateTimeModified';
}
