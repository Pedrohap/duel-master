<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\CasualMatch;
use App\Models\Deck;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
    public function playerFilter(){
        $cities = DB::table('profiles')
                        ->select('city')
                        ->groupBy('city')
                        ->get();

        $states = DB::table('profiles')
                        ->select('state')
                        ->groupBy('state')
                        ->get();

        $countries = DB::table('profiles')
                        ->select('country')
                        ->groupBy('country')
                        ->get();

        $profiles = Profile::all();
        
        return view ('home.players')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('profiles',$profiles);
    }

    public function playerSearch(Request $request){
        $cities = DB::table('profiles')
                ->select('city')
                ->groupBy('city')
                ->get();

        $states = DB::table('profiles')
                ->select('state')
                ->groupBy('state')
                ->get();

        $countries = DB::table('profiles')
                ->select('country')
                ->groupBy('country')
                ->get();

        $sql = 'SELECT *FROM profiles ';
        $first = true;

        if (isset($request->country)){
            if($first===true){
                $sql = $sql . 'WHERE profiles.country = ' . '"' .$request->country .'"';
                $first = false;
            } else {
                $sql = $sql . ' AND profiles.country = ' . '"' .$request->country .'"';
            }
        }

        if (isset($request->state)){
            if($first===true){
                $sql = $sql . 'WHERE profiles.state = ' . '"' .$request->state .'"';
                $first = false;
            } else {
                $sql = $sql . ' AND profiles.state = ' . '"' .$request->state .'"';
            }
        }

        if (isset($request->city)){
            if($first===true){
                $sql = $sql . 'WHERE profiles.city = ' . '"' .$request->city .'"';
                $first = false;
            } else {
                $sql = $sql . ' AND profiles.city = ' . '"' .$request->city .'"';
            }
        }

        $profiles = DB::select($sql);

        return view ('home.players')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('profiles',$profiles);
    }

    public function playerShow($id){
        $profile = Profile::findOrFail($id);
        $user = DB::table('users')
                ->select('name')
                ->where('id',$profile->user_id)
                ->get();

        $user=$user[0];
        
        $decks = Deck::where('user_id',$profile->user_id)->get();
        $casual_matches = CasualMatch::where('challenger',$profile->user_id)->orWhere('challengee',$profile->user_id)->get();
        $profiles = Profile::all();
        $ownerId = $profile->user_id;


        return view ('home.showPlayers')->with('profile',$profile)->with('user',$user)->with('decks',$decks)->with('casual_matches',$casual_matches)->with('profiles',$profiles)->with('ownerId',$ownerId);
    }

}
