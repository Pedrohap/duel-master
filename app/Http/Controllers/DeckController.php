<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Profile;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    //
    public function addDeck(){
        return view ('auth.newDeck');
    }

    public function show($id){
        $deck = Deck::findOrFail($id);
        $profile = Profile::findOrFail($deck->user_id);

        $cards = $deck->cards;

        $cards = str_replace(chr( 0x0D ),"",$cards);

        $cards = str_replace(" ","",$cards);

        $cards=explode("\n",$cards);

        return view('home.deck')->with('deck',$deck)->with('nickname',$profile->nickname)->with('cards',$cards);
    }

    public function edit($id){
        $decks = Deck::findOrFail($id);
        return view('auth.updateDeck')->with('decks',$decks);
    }

    public function update(Request $request,$id){
        $deck = Deck::findOrFail($id);
        $deck->deckname = $request->deckname;
        $deck->cards = $request->cards;
        $deck->user_id = auth()->user()->id;
        $deck->save();
        return redirect()->route('user.profile.show');

    }

    public function destroy($id){
        $decks = Deck::findOrFail($id)->delete();
        return redirect()->route('user.profile.show');
    }
    public function store(Request $request){
        $deck = new Deck();
        $deck->deckname = $request->deckname;
        $deck->cards = $request->cards;
        $deck->user_id = auth()->user()->id;
        $deck->save();

        return redirect()->route('user.profile.show');
    }
}
