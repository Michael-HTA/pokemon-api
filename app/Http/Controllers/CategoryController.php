<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function set($id){

        $user = Card::where('user_id',Auth::id());
        $card = Card::where('set_id','=',$id)->where('active',1)->union($user)->get();

        return $card;
    }

    public function type($id){
        $user = Card::where('user_id',Auth::id());
        $card = Card::where('type_id','=',$id)->where('active',1)->union($user)->get();

        return $card;
    }

    public function rarity($id){

        $user = Card::where('user_id',Auth::id());
        $card = Card::where('rarity_id','=',$id)->where('active',1)->union($user)->get();

        return $card;
    }
}
