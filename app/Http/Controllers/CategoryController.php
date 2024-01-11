<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function set($id){

        $card = Card::where('set_id','=',$id)->get();

        return $card;
    }

    public function type($id){

        $card = Card::where('type_id','=',$id)->get();

        return $card;
    }

    public function rarity($id){

        $card = Card::where('rarity_id','=',$id)->get();

        return $card;
    }
}
