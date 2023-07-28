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

// Route::get('/', function () {
//     return view('welcome');
// });




 Auth::routes();


//contest

// Route::get('/contest22', 'ContestController@index');
Route::get('/contest-history', 'ContestController@contest_history')->name('contest_history');
Route::get('/contest-detail', 'ContestController@contest_detail')->name('contest_detail');
Route::get('/new-contest-detail', 'ContestController@new_contest_detail')->name('contest_detail_2');
Route::get('/contest-detail-result', 'ContestController@contest_detail_result')->name('contest_detail_result');
Route::get('/contest-viewtip', 'ContestController@contest_viewtip')->name('contest_viewtip');
//matches
Route::get('/matches', 'MatchesController@index')->name('matches');
Route::get('/matches-standing', 'MatchesController@matches_standing')->name('matches_standing');
Route::get('/match/details/{id}', 'MatchesController@match_details')->name('matchDetails');
Route::get('/HandToHand/{homeTeamId}/{awayTeamId}', 'MatchesController@HandToHand')->name('HandToHand');
Route::get('/matchTimeline/{id}', 'MatchesController@matchTimeline')->name('matchTimeline');
Route::get('/players/{id}', 'MatchesController@matchplayers')->name('matchplayers');

// Route::get('/matches/{id}', 'MatchesController@matches_details')->name('matches_details');
Route::get('/team/{id}', 'MatchesController@teamDetail')->name('teamDetail');
Route::get('/player/{id}/{pid}', 'MatchesController@playerDetails')->name('playerDetails');
Route::get('/matches-timeline', 'MatchesController@matches_timeline')->name('matches_timeline');
Route::get('/matches-lineup/{id}', 'MatchesController@matches_lineup')->name('lineup');
Route::get('/matches-lineup', 'MatchesController@matches_lineup')->name('matches_lineup');
Route::get('/matches-stat/{id}', 'MatchesController@matches_stat')->name('matches_stat');
Route::get('/matches-comment/{id}', 'MatchesController@matches_comment')->name('matches_comment');
Route::get('/matches-comment', 'MatchesController@matches_comment')->name('matches_comment');
Route::get('/getleagues', 'MatchesController@getleagues')->name('getleagues');
Route::get('/matchByLeague/{id}/{day}', 'MatchesController@matchByLeague')->name('matchByLeague');
// Route::get('/matchByStanding/{id}', 'MatchesController@matchByStanding')->name('matchByStanding');
Route::get('/advancestats', 'MatchesController@advanceStats')->name('advancestats');
Route::post('/comment', 'MatchesController@comment')->name('comment');

//team Route
Route::get('/team/details/{id}', 'MatchesController@team_details')->name('team');
Route::get('/teamBasicInfo/{id}', 'MatchesController@teamBasicInfo')->name('teamBasicInfo');
Route::get('/teamTeamScorer/{id}', 'MatchesController@teamTeamScorer')->name('teamTeamScorer');
Route::get('/teamMatches/{id}', 'MatchesController@teamMatches')->name('teamMatches');
Route::get('/MatchesByRound/{id}', 'MatchesController@teamMatchesByRound')->name('MatchesByRound');
Route::get('/TeamPlayers/{teamId}', 'MatchesController@TeamPlayers')->name('TeamPlayers');
Route::get('/teamYellowAndRedcard/{id}', 'MatchesController@teamYellowAndRedcard')->name('teamYellowAndRedcard');
Route::get('/TeamByStanding/{id}', 'MatchesController@TeamByStanding')->name('TeamByStanding');
Route::get('/Stats/{id}', 'MatchesController@TeamByStats')->name('Stats');

Route::post('/getmatches', 'MatchesController@getmatches'); //06.05.2022
Route::post('/matchDetails', 'MatchesController@matchDetails'); //17.05.2022

 //12.05.2022 //12.05.2022

Route::post('/getLeague', 'LeagueController@getLeague'); //19.05.2022
Route::post('/MatchesListByLeague', 'LeagueController@MatchesListByLeague'); //24.05.2022



//news
Route::get('/news', 'NewsController@index')->name('newss');
Route::get('/news-detail', 'NewsController@news_detail')->name('news_detail');
Route::get('/news-latest', 'NewsController@news_latest')->name('news_latest');
Route::get('/news-transfer', 'NewsController@news_transfer')->name('news_transfer');

//profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile-contest-history', 'ProfileController@profile_contest_history')->name('profile_contest_history');
//search
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/search-result', 'SearchController@search_result')->name('search_result');
//leaderboard
Route::get('/leaderboard', 'LeaderboardController@index')->name('leaderboard');
Route::get('/leaderboard-detail', 'LeaderboardController@leaderboard_detail')->name('leaderboard_detail');
//login
Route::get('/login', 'UserController@login')->name('logined');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/register-submit', 'UserController@store')->name('submit');
Route::post('/userSubmit', 'UserController@userSubmit'); //10.06.2022
Route::get('/logout', 'UserController@logout'); //10.06.2022

//Register
Route::post('/otpgenerate', 'UserRegisterController@otpgenerate'); //13.06.2022
Route::get('/otpSubmit', 'UserRegisterController@otpSubmit'); //13.06.2022
Route::post('/otpVerify', 'UserRegisterController@otpVerify'); //13.06.2022

//League===============================>
Route::get('/league', 'LeagueController@index')->name('league');
Route::get('/league/details/{id}', 'LeagueController@league_detail'); //24.05.2022
Route::get('/LeagueRound/{id}', 'LeagueController@LeagueRound')->name('LeagueRound');
Route::get('/LeagueMatch/{league_id}/{round_id}', 'LeagueController@LeagueMatch')->name('LeagueMatch');
Route::get('/LeagueStanding/{league_id}', 'LeagueController@LeagueStanding')->name('LeagueStanding');
Route::get('/TopScores/{league_id}/{season_id}', 'LeagueController@LeagueTopScores')->name('LeagueTopScores');
Route::get('/TopPlayers/{league_id}/{comp_id}', 'LeagueController@LeagueTopPlayers')->name('LeagueTopPlayers');
Route::get('/Leaguebyteam/{userId}', 'PredictionController@Leaguebyteam')->name('Leaguebyteam');

//home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/leaderboardPost', 'LeaderboardController@leaderboardPost')->name('leaderboardPost');
Route::get('/contest', 'PredictionController@Contest')->name('contest');
Route::post('/UpdateTeam', 'PredictionController@UpdateTeam')->name('UpdateTeam');
Route::get('/UserFavourite', 'PredictionController@UserFavourite')->name('UserFavourite');
Route::get('/getUser', 'PredictionController@getUser')->name('getUser');

Route::get('/finish', 'HomeController@finishMatch');
Route::get('/live', 'HomeController@liveMatch');
Route::get('/coming', 'HomeController@comingMatch');
Route::get('/detail', 'HomeController@detail')->name('detail');
Route::get('/team-detail', 'HomeController@team_detail')->name('team_detail');
Route::get('/index-old', 'HomeController@index_old')->name('index_old');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/video-more', 'HomeController@video_more')->name('video_more');
// Route::get('/logout', function(){
//     Auth::logout();
//     return Redirect::to('/');
// });


// set time zone from custom JS

Route::get('/set-timezone', 'HomeController@Settimezone')->name('settimezone');




