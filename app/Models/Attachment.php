<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function __construct()
    {
        $this->connection = 'sqlsrv_attachment';
    }

    protected $guarded = [];
    protected $casts = [];

    public function getFileSizeAttribute($value): string
    {
        $i = floor(log($value) / log(1024));
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        return sprintf('%.02F', $value / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
    }
}
