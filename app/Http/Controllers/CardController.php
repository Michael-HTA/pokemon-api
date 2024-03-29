<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Rarity;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Card::latest()->filter()->where('user_id',Auth::id());
        $card = Card::latest()->filter()->where('active', 1)->union($user)->get();
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

    private function infoValidation()
    {
        return request()->validate([
            'name' => 'required|string',
            'price' => 'required',
            'card_count' => 'required|integer',
            'type_id' => 'required|integer',
            'set_id' => 'required|integer',
            'image' => 'image',
            'active' => Rule::in([0, 1]),
            'rarity_id' => 'required|integer',
        ]);
    }

    private function infoSaving(Request $request, $card)
    {
        if ($request->hasFile('image')) {
            if ($card->image) {
                Storage::delete($card->image);
            }
            $card->image = $request->file('image')->store();
        }

        if ($request->has('active')) {
            $card->active = $request->active;
        } else {
            $card->active = $card->getActive();
        }

        $card->name = $request->name;
        $card->price = $request->price;
        $card->card_count = $request->card_count;
        $card->type_id = $request->type_id;
        $card->set_id = $request->set_id;
        $card->rarity_id = $request->rarity_id;
        $card->user_id = Auth::id();
        $card->save();

        return $card;
    }



    public function store()
    {
        $request = request();
        $this->infoValidation();
        $card = new Card();
        return $this->infoSaving($request,$card);
    }

    /**
     * Display the specified resource.
     */
    public function show($card)
    {
        return Card::find($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $this->infoValidation();
        $card = Card::find($id);
        $request = request();
        return $this->infoSaving($request,$card);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($card)
    {
        $card = Card::find($card);
        if ($card->user_id === Auth::id()) {
            if($card->image){
                Storage::delete($card->image);
            }
            $card->delete();

            return ['message' => 'Card have been deleted!'];
        }

        return ['message' => "You do not permission to delete this!"];
    }
}
