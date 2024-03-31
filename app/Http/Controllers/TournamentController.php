<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Models\Tournament;
use App\Models\TournamentsPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    //

    public function index()
    {
        $cities = DB::table('tournaments')
            ->select('city')
            ->groupBy('city')
            ->get();

        $states = DB::table('tournaments')
            ->select('state')
            ->groupBy('state')
            ->get();

        $countries = DB::table('tournaments')
            ->select('country')
            ->groupBy('country')
            ->get();

        $tournaments = Tournament::all();
        $players = TournamentsPlayer::all();


        return view('home.tournaments')->with('tournaments', $tournaments)->with('players', $players)->with('cities', $cities)->with('states', $states)->with('countries', $countries);
    }

    public function filter(Request $request)
    {
        $cities = DB::table('tournaments')
            ->select('city')
            ->groupBy('city')
            ->get();

        $states = DB::table('tournaments')
            ->select('state')
            ->groupBy('state')
            ->get();

        $countries = DB::table('tournaments')
            ->select('country')
            ->groupBy('country')
            ->get();

        $status = DB::table('tournaments')
            ->select('status')
            ->groupBy('status')
            ->get();

            $sql = 'SELECT *FROM tournaments ';
            $first = true;
    
            if (isset($request->country)){
                if($first===true){
                    $sql = $sql . 'WHERE tournaments.country = ' . '"' .$request->country .'"';
                    $first = false;
                } else {
                    $sql = $sql . ' AND tournaments.country = ' . '"' .$request->country .'"';
                }
            }
    
            if (isset($request->state)){
                if($first===true){
                    $sql = $sql . 'WHERE tournaments.state = ' . '"' .$request->state .'"';
                    $first = false;
                } else {
                    $sql = $sql . ' AND tournaments.state = ' . '"' .$request->state .'"';
                }
            }
    
            if (isset($request->city)){
                if($first===true){
                    $sql = $sql . 'WHERE tournaments.city = ' . '"' .$request->city .'"';
                    $first = false;
                } else {
                    $sql = $sql . ' AND tournaments.city = ' . '"' .$request->city .'"';
                }
            }

            if (isset($request->status)){
                if($first===true){
                    $sql = $sql . 'WHERE tournaments.status = ' . '"' .$request->status .'"';
                    $first = false;
                } else {
                    $sql = $sql . ' AND tournaments.status = ' . '"' .$request->status .'"';
                }
            }

        $tournaments = DB::select($sql);


        $players = TournamentsPlayer::all();


        return view('home.tournaments')->with('tournaments', $tournaments)->with('players', $players)->with('cities', $cities)->with('states', $states)->with('countries', $countries);
    }

    public function new()
    {
        return view('auth.newTournament');
    }

    public function update(UpdateTournamentRequest $request, $id)
    {
        $tournament = Tournament::findOrFail($id);
        $data = $request->validated();
        if (array_key_exists('photo', $data)) {
            $photoName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('photos'), $photoName);
            $data['photo'] = $photoName;
            $tournament->photo = $data['photo'];
        }
        $tournament->name = $data['name'];
        $tournament->date = $data['date'];
        $tournament->time = $data['time'];
        $tournament->city = $data['city'];
        $tournament->state = $data['state'];
        $tournament->country = $data['country'];
        $tournament->address = $data['address'];
        $tournament->status = $data['status'];

        if (array_key_exists('firstplace', $data)) {
            $tournament->firstplace = $data['firstplace'];
        }
        if (array_key_exists('secondplace', $data)) {
            $tournament->secondplace = $data['secondplace'];
        }
        if (array_key_exists('thirdplace', $data)) {
            $tournament->thirdplace = $data['thirdplace'];
        }

        $tournament->save();
        return $this->show($id);
    }

    public function delete($id)
    {
        $tournament = Tournament::findOrFail($id)->delete();
        $players = DB::table('tournaments_players')
            ->where('tournaments_players.tournament', $id)
            ->delete();

        return $this->index();
    }

    public function store(TournamentRequest $request)
    {
        $data = $request->validated();
        $data['organizer'] = auth()->user()->id;
        $photoName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('photos'), $photoName);
        $data['photo'] = $photoName;

        $tournament = Tournament::create($data);

        return redirect()->route('tournaments.index');
    }

    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);
        $profiles = DB::table('tournaments_players')
            ->join('profiles', 'profiles.user_id', '=', 'tournaments_players.player')
            ->where('tournament', $id)
            ->get();

        return view('home.showTournament')->with('tournament', $tournament)->with('profiles', $profiles);
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);

        return view('auth.updateTournament')->with('tournament', $tournament);
    }
}
