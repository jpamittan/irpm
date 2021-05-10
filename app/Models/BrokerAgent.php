<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    HasMany,
    HasOne
};

class BrokerAgent extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.codeeast');
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

    public function agent(): ?HasOne
    {
        return $this->hasOne(Agent::class, 'AgentKey', 'EntityId');
    }
}
