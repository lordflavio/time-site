<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Clubs;
use Carbon\Carbon;

class Game extends Model
{
    protected $table = "games";
    protected $fillable = [
        'date',
        'time',
        'address',
        'description'
    ];
    
    public function game() 
    {
    return $this->belongsToMany(Clubs::class,'games_club')->withPivot(['gols']);
    }
    
//    public function getDateAttribute($value)
//    {
//        return Carbon::parse($value)->format('d/m/Y');
//    }
}
