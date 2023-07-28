<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Common\Utility;

use Modules\Admin\Entities\Predictions;
use App\League;
use App\UserFavouriteTeam;
use Session;
class PredictionController extends Controller
{
    //


     public function Contest(Request $request)
     {

        $competitions = Predictions::isActive()->OrderByCreated()->get();
    

    //    dd($UserId);
/*

"id" => 536
    "match_id" => 18138970
    "league_id" => 8
    "league_name" => "Premier League"
    "league_logo" => "https://cdn.sportmonks.com/images/soccer/leagues/8/8.png"
    "home_team_id" => 13
    "home_team_name" => "Everton"
    "home_team_logo" => "https://cdn.sportmonks.com/images/soccer/teams/13/13.png"
    "score_home" => 0
    "away_team_id" => 42
    "away_team_name" => "Leicester City"
    "away_team_logo" => "https://cdn.sportmonks.com/images/soccer/teams/10/42.png"
    "score_away" => 0
    "match_start_time" => "2022-04-20 18:45:00"
    "status" => "NS"
    "venue" => "Goodison Park"
    "venue_image" => null
    "group_name" => "Weekly Apr 3"
    "prediction_type" => "weekly"
    "prediction_start_time" => "2022-04-18 16:43:52"
    "prediction_end_time" => "2022-04-21 00:45:54"
    "is_active" => 1
    "is_end" => 0
    "winner_status" => 0
    "created_at" => "2022-04-18 17:44:26"
    */

       $timezone = $request->session()->get('local_timezone',"Asia/Jakarta");

        $competitions = $competitions->map(function($items) use ($timezone){


         $data['id'] = $items->id;
         $data['league_id'] = $items->league_id;
         $data['league_name'] = $items->league_name;
         $data['league_id'] = $items->league_id;
         $data['league_logo'] = $items->league_logo;
         $data['home_team_id'] = $items->home_team_id;
         $data['home_team_name'] = $items->home_team_name;
         $data['home_team_logo'] = $items->home_team_logo;
         $data['score_home'] = $items->score_home;
         $data['away_team_id'] = $items->away_team_id;
         $data['away_team_name'] = $items->away_team_name;
         $data['away_team_logo'] = $items->away_team_logo;
         $data['match_start_time'] = $items->match_start_time;
         $data['status'] = $items->status;
         $data['venue'] = $items->venue;
         $data['venue_image'] = $items->venue_image;
         $data['group_name'] = $items->group_name;
         $data['prediction_start_time'] = $items->prediction_start_time;
         $data['prediction_end_time'] = $items->prediction_end_time;
         $data['is_active'] = $items->is_active;
         $data['winner_status'] = $items->winner_status;

         
         $match_time = Utility::getUtcToLocal($data['match_start_time'],$timezone,"Y-m-d");

          $match_time_bar = Utility::getUtcToLocal($data['match_start_time'],$timezone,"w");
          $bar = "NA";

          /*0 for Sunday, 6 for Saturday*/
          if(isset($match_time_bar))
          {
             if($match_time_bar == 0)
                $bar = "Sunday";
            else if($match_time_bar == 1)
                $bar = "Monday";
                 else if($match_time_bar == 2)
                $bar = "Tuesday";
                else if($match_time_bar == 3)
                $bar = "Wednesday";
                 else if($match_time_bar == 4)
                $bar = "Thursday";
                else if($match_time_bar == 5)
                $bar = "Friday";
                else if($match_time_bar == 6)
                $bar = "Saturday";
          }


         $data['match_time'] = $match_time;
         $data['match_time_bar'] =  $bar;

          return $data;


       });

        $details = League::GetleagueRecord()->toArray();
        $link = "http://" . $_SERVER['HTTP_HOST']."/assets/uploads/leagues/";
        $link = "http://api.goaly.mobi/assets/uploads/leagues/";
       return view('prediction.index',compact('competitions','details','link'));

     }

     public function Leaguebyteam($userId)
     {
         $details=[];
         $utility = new Utility;
         $basic=config('global.basic');
         $url =$basic.'teamsByLeagues';
         $from=array();
         $responseData=$utility->getResponse($url,$from);
        //  if(count($responseData['details'])>0){
        //      $details=$responseData['details'][0];
        //  }
         return $responseData;
     }
     public function getUser()
     {
        $UserId= Session::get('UserId');


         return $UserId;
     }
     public function UpdateTeam(Request $request)
     {
        $userFevarates = $request->users;

        foreach ($userFevarates as  $userFevarate)
        {

           if($userFevarate==null){
            continue;
           }
            $userFeb       = new UserFavouriteTeam();

            $userFeb->user_id=Session::get('UserId');
            $userFeb->league_id =isset($userFevarate['league_id'])?$userFevarate['league_id']:'';
            $userFeb->id=isset($userFevarate['id'])?$userFevarate['id']:'';
            $userFeb->league_name=isset($userFevarate['league_name'])?$userFevarate['league_name']:'';
            $userFeb->short_code=isset($userFevarate['short_code'])?$userFevarate['short_code']:'';
            $userFeb->name=isset($userFevarate['name'])?$userFevarate['name']:'';
            $userFeb->badge=isset($userFevarate['logo_path'])?$userFevarate['logo_path']:'';
            $userFeb->status=isset($userFevarate['status'])?$userFevarate['status']:'';
            $userFeb ->save();


    }

           return $userFeb ;

     }
     public function UserFavourite()
     {
        $UserId= Session::get('UserId');

        $userChuch=UserFavouriteTeam::UserFavourite($UserId)->get();
         return $userChuch;
     }
}
