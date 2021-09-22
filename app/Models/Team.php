<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'foundation_year',
        'country'
    ];

    public function players(){
        return $this->hasMany(Player::class);
    }
}
