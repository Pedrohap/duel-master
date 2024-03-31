<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    /**
        * Deck Routes Routes
    */
    Route::get('/deck/{id}','DeckController@show')->name('deck.show');

    /**
     * Player Finder Routes
     */
    Route::get('/player','PlayerController@playerFilter')->name('player.filter');
    Route::post('/player','PlayerController@playerSearch')->name('player.search');
    Route::get('/player/{id}','PlayerController@playerShow')->name('player.show');

    /**
     * Tournament Routes
     */
    Route::get('/tournaments','TournamentController@index')->name('tournaments.index');
    Route::get('/tournaments/{id}','TournamentController@show')->name('tournaments.show');
    Route::post('/tournaments','TournamentController@filter')->name('tournaments.filter');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /**
         * Recover Routes
         */
        Route::get('/recover','LoginController@recoverPassword')->name('login.recoverPassword');
        Route::put('/recover','LoginController@changePassword')->name('login.changePassword');

        

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Profile Routes
         */
        Route::get('/profile','ProfileController@show')->name('user.profile.show');
        Route::get('/profile/new','ProfileController@addProfile')->name('user.profile.new');
        Route::post('/profile/save','ProfileController@store')->name('user.profile.store');
        Route::get('/profile/edit','ProfileController@edit')->name('user.profile.edit');
        Route::put('/profile/update','ProfileController@update')->name('user.profile.update');

        /**
         * Deck User Routes Routes
         */
        Route::get('/profile/deck/new','DeckController@addDeck')->name('user.deck.new');
        Route::post('/profile/deck/save','DeckController@store')->name('user.deck.store');
        Route::post('/profile/deck/update/{id}','DeckController@update')->name('user.deck.update');
        Route::get('/profile/deck/edit/{id}','DeckController@edit')->name('user.deck.edit');
        Route::delete('/profile/deck/delete/{id}','DeckController@destroy')->name('user.deck.delete');

        /**
         * Casual Matches User Routes Routes
         */
        Route::get('/profile/casual/matches','CasualMatchController@show')->name('user.casualMatches.show');
        Route::get('/profile/casual/matches/ongoing','CasualMatchController@ongoingMatches')->name('user.casualMatches.ongoingMatches');
        Route::get('/profile/casual/matches/new','CasualMatchController@createMatch')->name('user.casualMatches.new');
        Route::post('/profile/casual/matches/new','CasualMatchController@store')->name('user.casualMatches.store');
        Route::get('/profile/casual/matches/request','CasualMatchController@showRequest')->name('user.casualMatches.request');
        Route::get('/profile/casual/matches/request/accept/{id}','CasualMatchController@acceptRequest')->name('user.casualMatches.accept');
        Route::get('/profile/casual/matches/request/refuse/{id}','CasualMatchController@destroy')->name('user.casualMatches.refuse');
        Route::get('/profile/casual/matches/finish/{id},{conclusion}','CasualMatchController@finishMatch')->name('user.casualMatches.finishMatch');

        /**
         * Tournament User Routes
         */
        Route::get('/tournaments/new/create','TournamentController@new')->name('user.tournaments.new');
        Route::post('/tournaments/store','TournamentController@store')->name('user.tournaments.store');
        Route::get('/tournaments/edit/{id}','TournamentController@edit')->name('user.tournaments.edit');
        Route::put('/tournaments/update/{id}','TournamentController@update')->name('user.tournaments.update');
        Route::delete('/tournaments/delete/{id}','TournamentController@delete')->name('user.tournaments.delete');


        /**
         * Tournament_Player User Routes
         */

        Route::get('/tournaments/apply/{id}','TournamentsPlayerController@apply')->name('user.tournaments.apply');
        Route::get('/tournaments/removeapply/{id}','TournamentsPlayerController@removeApply')->name('user.tournaments.removeApply');
        Route::get('/tournaments/removeapply/{tournament_id},{player_id}','TournamentsPlayerController@removeApplyPlayer')->name('user.tournaments.removeApplyPlayer');

    });
});