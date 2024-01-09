<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Rarity;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Models\Type;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $card = Card::latest()->get();
        $type = Type::all();
        $set = Set::all();
        $rarity = Rarity::all();


        return [
            'card' => $card,
            'type' => $type,
            'set' => $set,
            'rarity' => $rarity,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $card)
    {
        return Type::find($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
