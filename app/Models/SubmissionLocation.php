<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubmissionLocation extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $guarded = [];
    protected $casts = [];

    public function territory(): ?HasOne
    {
        return $this->hasOne(Territory::class, 'zip', 'zip');
    }
}
