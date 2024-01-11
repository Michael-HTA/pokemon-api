<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    private $active = 1;
    use HasFactory;

    public function getActive(){
        return $this->active;
    }

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

    public function scopeFilter($query){
        if(request('search')){
            return $query->where('name','like', '%'.request('search').'%');
        }
    }
}
