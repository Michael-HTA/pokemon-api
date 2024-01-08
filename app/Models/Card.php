<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function rarity(){
        return $this->belongsTo('App\Models\Rarity');
    }
    public function set(){
        return $this->belongsTo('App\Models\Set');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
