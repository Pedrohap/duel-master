<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Deck;
use App\Models\Profile;
use App\Models\CasualMatch;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProfile()
    {
        return view('auth.newProfile');
    }

    public function show(){
        $profile = Profile::where('user_id',auth()->user()->id)->get();
        $ownerId = $profile[0]->user_id;
        $profiles = Profile::all();
        $decks = Deck::where('user_id',auth()->user()->id)->get();
        $user = auth()->user();
        $casual_matches = CasualMatch::where('challenger',$profile[0]->user_id)->orWhere('challengee',$profile[0]->user_id)->get();
        
        return view('home.profile')->with('profile',$profile)->with('profiles',$profiles)->with('user',$user)->with('decks',$decks)->with('casual_matches',$casual_matches)->with('ownerId',$ownerId);
    }

    public function edit(){
        $profile = Profile::where('user_id',auth()->user()->id)->get();
        return view('auth.updateProfile',['profile'=>$profile[0]]);
    }

    public function update(UpdateProfileRequest $request){
        $profile = Profile::where('user_id',auth()->user()->id)->get();
        $profile = $profile[0];
        $data = $request->validated();
        if (array_key_exists('avatar',$data)){
            $avatarName = auth()->user()->id.'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
            $profile->avatar = $data['avatar'];
        }
        $user = auth()->user();
        $profile->nickname = $data['nickname'];
        $profile->bio = $data['bio'];
        $profile->city = $data['city'];
        $profile->state = $data['state'];
        $profile->country = $data['country'];

        $profile->save();
        return $this->show();
    }
  
    public function store(ProfileRequest $request)
    {
        $data = $request->validated();
        if (array_key_exists('avatar',$data)){
            $avatarName = auth()->user()->id.'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
        } else {
            $avatarName = 'default.png';
        }
        $data['user_id'] = auth()->user()->id;
        $data['rankpoints'] = 0;
        $data['avatar'] = $avatarName;
        $profile = Profile::create($data);
  
        return redirect('/')->with('success', "Account successfully registered.");
    }
}
