<?php

namespace App\Http\Controllers;

use App\Models\TournamentsPlayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TournamentsPlayerController extends Controller
{
    //
    public function apply($id){
        $player_tournament= new TournamentsPlayer();
        $player_tournament->tournament=$id;
        $player_tournament->player=auth()->user()->id;
        $player_tournament->save();

        return redirect()->route('tournaments.index');
    }

    public function removeApply($id){
        $deleted = DB::table('tournaments_players')
                        ->where('player', auth()->user()->id)
                        ->where('tournament',$id)
                        ->delete();

        return redirect()->route('tournaments.index');
    }

    public function removeApplyPlayer($tournament_id,$player_id){
        $deleted = DB::table('tournaments_players')
                        ->where('player', $player_id)
                        ->where('tournament',$tournament_id)
                        ->delete();

        return redirect()->route('tournaments.show')->with('id',$tournament_id);
    }

    public function showPlayers($id){
        $players = DB::table('tournaments_players')
                        ->join('profiles','profiles.user_id','=','tournament.players')
                        ->where('tournament',$id)
                        ->get();
        
        return redirect()->route('');
    }
}
