<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class backing extends Model
{
    protected $table = "backings";
    protected $fillable = [
        'name',
        'img'
    ];
}
