<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = "rankings";
    protected $fillable = [
        'victorys',
        'defaat',
        'draws',
        'punctuation'
    ];
}
