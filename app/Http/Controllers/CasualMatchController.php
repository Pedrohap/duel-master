<?php

namespace App\Http\Controllers;

use App\Models\CasualMatch;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CasualMatchController extends Controller
{
    public function createMatch(){
        $profiles = Profile::all();
        

        return view('auth.newCasualMatch')->with('profiles',$profiles);
    }

    public function store(Request $request){
        $casual_match = new CasualMatch();
        $casual_match->challenger = auth()->user()->id;
        $casual_match->challengee = $request->challengee;
        $casual_match->save();

        return redirect()->route('user.profile.show');
    }

    public function showRequest(){
        $casual_matches = DB::table('casual_matches')
                        ->where('is_accepted',false)
                        ->where('challengee',auth()->user()->id)
                        ->get();

        $profiles = Profile::all();

        return view('auth.requestCasualMatch')->with('casual_matches',$casual_matches)->with('profiles',$profiles); 
    }

    public function acceptRequest($id){
        $casual_match = CasualMatch::findOrFail($id);
        $casual_match->is_accepted = true;
        $casual_match->save();

        return redirect()->route('user.casualMatches.request');
    }

    public function ongoingMatches(){
        $casual_matches = DB::table('casual_matches')
                        ->where('is_accepted',true)
                        ->where('challengee',auth()->user()->id)
                        ->where('winner',null)
                        ->where('is_drawn',null)
                        ->get();

        $profiles = Profile::all();


        return view('auth.ongoingCasualMatches')->with('casual_matches',$casual_matches)->with('profiles',$profiles);
    }

    public function finishMatch($id,$conclusion){
        $casual_match = CasualMatch::findOrFail($id);
        if ($conclusion == "loss"){
            $casual_match->winner = $casual_match->challenger;
        }
        if ($conclusion == "win"){

            $casual_match->winner = $casual_match->challengee;
        }
        if ($conclusion == "drawn"){
            $casual_match->is_drawn = true;
        }
        
        $casual_match->save();

        return $this->ongoingMatches();
    }

    public function destroy($id){
        $casual_match = CasualMatch::findOrFail($id)->delete();

        return redirect()->route('user.casualMatches.request');
    }
}
