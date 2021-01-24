<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $table= 'territory';
    protected $guarded = [];
    protected $casts = [];
}
