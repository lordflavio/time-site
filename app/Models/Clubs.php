<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ranking;

class Clubs extends Model
{
    protected $table = "clubs";
    protected $fillable = [
        'name',
        'shild',
        'description',
    ];
    
    
    public function positionRanking() 
    {
         return $this->hasOne(Ranking::class);
    }
    
    
    public function allgames() {
        
        $this->belongsToMany(Game::class,'games_club');
    }
    
}
