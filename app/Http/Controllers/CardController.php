<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Rarity;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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

    private function infoValidation(){
        return request()->validate([
            'name' => 'required|string',
            'price' => 'required|decimal:2',
            'card_count' => 'required|integer',
            'type_id' => 'required|integer',
            'set_id' => 'required|integer',
            'image' => 'image',
            'active' =>Rule::in([0,1]),
            'rarity_id' => 'required|integer',
        ]);
    }

    private function infoSaving($card){

        if(request()->hasFile('image')){
            if($card->image){
                Storage::delete($card->image);
            }
            $card->image = request()->file('image')->store();
        }

        if(request()->has('active')){
            $card->active = request()->active;
        }else{
            $card->active = 1;
        }
        $card->name = request()->name;
        $card->price = request()->price;
        $card->card_count = request()->card_count;
        $card->type_id = request()->type_id;
        $card->set_id = request()->set_id;
        $card->rarity_id = request()->rarity_id;
        $card->user_id = request()->user_id;
        $card->save();

        return $card;
    }


    public function store()
    {
        $this->infoValidation();
        $card = new Card();
        return $this->infoSaving($card);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $card)
    {
        return Card::find($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $this->infoValidation();
        $card = Card::find($card);
        return $this->infoSaving($card);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card = Card::find($card);
        Storage::delete($card->image);
        $card->delete();
    }
}
