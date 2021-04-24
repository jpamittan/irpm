<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerAgentContacts extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_codeeast';
    }

    protected $table = 'Meta_BrokerAgent_Contacts';
    protected $guarded = [];
    protected $casts = [];
}
