<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrokerAgent extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_codeeast';
    }

    protected $table = 'Meta_BrokerAgent';
    protected $guarded = [];
    protected $casts = [];

    public function allStates(): ?HasMany
    {
        return $this->hasMany(BrokerAgentAllStates::class, 'EntityId', 'EntityId')
            ->orderBy('AppointedStateCode');
    }

    public function contacts(): ?HasMany
    {
        return $this->hasMany(BrokerAgentContacts::class, 'EntityId', 'EntityId')
            ->orderBy('ContactType');
    }
}
