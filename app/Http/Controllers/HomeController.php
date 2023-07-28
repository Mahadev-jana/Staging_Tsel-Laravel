<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\League;
use Modules\Admin\Entities\Predictions;
use Session;

class HomeController extends Controller
{   

 
   public function index(Request $request)
    {
    
    $start_date=date('Y-m-d');
    $competitions = Predictions::isActive()->OrderByCreated()->get();
        
    $timezone = $request->session()->get('local_timezone',"Asia/Jakarta");

    $competitions = $competitions->map(function($items) use ($timezone){


    $data['id'] = isset($items->id) ? $items->id : null;
    $data['league_id'] = isset($items->league_id) ? $items->league_id : null;
    $data['league_name'] = isset($items->league_name) ? $items->league_name : null;
    $data['league_logo'] = isset($items->league_logo) ? $items->league_logo : null;
    $data['home_team_id'] = isset($items->home_team_id) ? $items->home_team_id : null;
    $data['home_team_name'] = isset($items->home_team_name) ? $items->home_team_name : null;
    $data['home_team_logo'] = isset($items->home_team_logo) ? $items->home_team_logo : null;
    $data['score_home'] = isset($items->score_home) ? $items->score_home : '-';
    $data['away_team_id'] = isset($items->away_team_id) ? $items->away_team_id : null;
    $data['away_team_name'] = isset($items->away_team_name) ? $items->away_team_name : null;
    $data['away_team_logo'] = isset($items->away_team_logo) ? $items->away_team_logo : null;
    $data['score_away'] = isset($items->score_away) ? $items->score_away : '-';

    $data['match_start_time'] = isset($items->match_start_time) ? $items->match_start_time : null;
    $data['status'] = isset($items->status) ? $items->status : null;
    $data['venue'] = isset($items->venue) ? $items->venue : null;
    $data['venue_image'] = isset($items->venue_image) ? $items->venue_image : null;
    $data['group_name'] = isset($items->group_name) ? $items->group_name : null;

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

    $from = array('start_date' =>$start_date);
        
        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');
        $utility = new Utility;
        $response=$utility->getResponse($url,$from);
        
       

    $details = League::GetleagueRecord()->toArray();
    $link = "http://api.goaly.mobi/assets/uploads/leagues/";
        
    // return view('home.index',compact('competitions','details','link'));
    return view('home.index',compact('competitions','details','link','response'));
        
    }




    public function faq()
    {
        return view('home.faq');
    }
     public function __construct()
    {
       
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }


    public function liveMatch()
    {
        $utility = new Utility;
        $date=[];
        $responseData=$utility->getLiveMatchesData();
        return $responseData['matches'];
    }
    public function finishMatch()
    {
        $utility = new Utility;
        $responseData=$utility->getFinishMatchesData();
        return $responseData['matches'];
    }
    public function comingMatch()
    {
        $utility = new Utility;
        $responseData=$utility->getComingMatchesData();
        return $responseData['matches'];
    }


    public function team_detail()
    {
        return view('home.team_detail');
    }
    public function index_old()
    {
        return view('home.index_OLD');
    }
    
    public function video_more()
    {
        return view('home.video_more');
    }

    public function Settimezone(Request $request)
    {

        $timezone = $request->input('timezone');

        if(isset($timezone))
        {

            $request->session()->put('local_timezone', $timezone );

            date_default_timezone_set($timezone);
        }

        return Response()->json([
                        "massage" => "timezone set ".$timezone,
                        "date" => "timezone set ".date("Y-m-d H:i:s"),
                        "success" => 1,
                        "error" => 0
                    ]);

        
    }

}
