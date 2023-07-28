<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\League;
use App\userMatchComment;
use App\Http\Requests\commentRequest;
use DateTime;
use DateTimeZone;

use DB;


class MatchesController extends Controller
{
    
    public function index_old()
    {
        $basic=config('global.basic');
        $url =config('global.LeaguesDetails');
        $from=array('page' => 'live');
        // $url='http://smartcms.goaly.mobi/api/addusercomment';
        // $from=array('user_id'=>63607, 'match_id'=>18452084, 'comment'=>'hello');
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        //dd($responseData);
        $response= $responseData['leagues'];
        //dd($response);
        return view('matches.index',compact('response'));

    }

    //10.05.2022
    public function index()
    {
        $time_zone = "asia/kolkata";//$_COOKIE["fcookie"];

        $matches = [];

        $league_details = League::GetleagueRecord();
        // return view('matches.index',compact('matches'));
        return view('matches.index',compact('matches','time_zone','league_details'));
    }

    public function matches_standing()
    {
        $url =config('global.LeaguesDetails');
        $from=array('page' => 'live');
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        $response= $responseData['leagues'];
        return view('matches.matches_standing',compact('response'));
        //return view('matches.matches_standing');
    }

    public function matches_details_old($id)
    {
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.config('global.match_detail_url');
        $from=array('id'=>$id);
        $responseData=$utility->getResponse($url,$from);
        if(count($responseData)>0){
        $details=$responseData['match_details'][0];
        $basic=config('global.basic');
        $url =$basic.config('global.handTwoHand');
        $from=array('homeTeam' => $details['homeTeam']['id'],'awayTeam' => $details['awayTeam']['id']);
        $handToHand=$utility->getResponse($url,$from);
        }
        else
        {
            $details="";
            $comments="";
            $lineups="";
            $awaylineups="";
            return view('matches.matches_details',compact('details','comments','lineups','awaylineups'));
        }

        //comments session
        $order = array();
        foreach ($details['comments'] as $key => $row)
        {
            $order[$key] = $row['order'];
        }
        array_multisort($order, SORT_DESC, $details['comments']);
        $comments=$details['comments'];
        //dd($details['comments']);
        //lineup session
        $position = array();
        
        foreach ($details['lineup'] as $key => $row)
        {
            $position[$key] = $row['formation_position'];
        }

        array_multisort($position, SORT_ASC, $details['lineup']);
        $lineups = $details['lineup'];
        foreach ($details['lineup'] as $key => $row)
        {
            $position[$key] = $row['formation_position'];
        }
        array_multisort($position, SORT_DESC, $details['lineup']);
        $awaylineups=$details['lineup'];
        //dd($details);
        return view('matches.matches_details',compact('details','comments','lineups','awaylineups','handToHand'));
    }

    //10.05.2022
    public function team_details($id)
    {
        $team_id = $id;
        return view('matches.club_details',compact('team_id'));
    }
    
    public function teamMatches($id)
    {
        $team_id = $id;
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'TeamLastAndPreMatch';
        $from=array('team_id' => $team_id,
                    );
        $responseData=$utility->getResponse($url,$from);
        $pastMatches=$responseData['past_matches'];
        $futureMatches=$responseData['future_matches'];
        return compact('pastMatches','futureMatches');
    }

    public function teamBasicInfo($team_id)
    {
        $details=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'getTeamDetails';
        $from=array('team_id' => $team_id);
        $responseData=$utility->getResponse($url,$from);
        if(count($responseData['details'])>0){
            $details=$responseData['details'][0];
        }
        return $details;
    }

    public function teamTeamScorer($team_id)
    {
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'TeamScorer';
        $from=array('team_id' => $team_id);
        $details=$utility->getResponse($url,$from);
        if($details['success']==0){
            $details=[];
        }
        return $details;
    }

    public function teamMatchesByRound($team_id)
    {
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'MatchesByRound';
        $from=array('team_id' => $team_id);
        $details=$utility->getResponse($url,$from);
        if($details['success']==0){
            $details=[];
        }
        return $details;
    }
    public function teamYellowAndRedcard($team_id)
    {
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'YellowAndRedcard';
        $from=array('team_id' => $team_id);
        $details=$utility->getResponse($url,$from);
        if($details['success']==0){
            $details=[];
        }
        return $details;
    }
    public function TeamPlayers($team_id)
    {
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'TeamPlayers';
        $from=array('team_id' => $team_id);
        $details=$utility->getResponse($url,$from);
        if($details['success']==0){
            $details=[];
        }
        return $details;
    }
    public function TeamByStanding($team_id)
    {
        $detailsl=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'standing';
        $from=array('team_id' => $team_id);
        $responseData=$utility->getResponse($url,$from);
        if(isset($responseData['standing'])){
            if(isset($responseData['standing'][0]['data']))
            $detailsl=$responseData['standing'][0]['data'];
        }

        return $detailsl;
    }
    public function TeamByStats($team_id)
    {
        $detailsl=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'TeamStats';
        $from=array('team_id' => $team_id);
        $responseData=$utility->getResponse($url,$from);
        // if(isset($responseData['standing'])){
        //     if(isset($responseData['standing'][0]['data']))
        //     $detailsl=$responseData['standing'][0]['data'];
        // }

        return $responseData['total'];
    }
    //12.05.2022
    public function match_details(Request $request,$id)
    {

        $details=[];
        $basic=config('global.basic');
        $utility = new Utility;
        $url =$basic."fixtureDetails";
        $from=array('fixture_id'=>$id);
        $response=$utility->getResponse($url,$from);
        if(isset($response)){
        $details=$response['match'];
        }
        if(isset($response['message'])){
            return redirect()->back();
        }

        $lineups=[];
        $awaylineups=[];
            if(isset($details['lineup'])){
                $position = array();
                foreach ($details['lineup'] as $key => $row)
                {
                    $position[$key] = $row['formation_position'];
                }
                array_multisort($position, SORT_ASC, $details['lineup']);
                $lineups=$details['lineup'];
                array_multisort($position, SORT_DESC, $details['lineup']);
                $awaylineups=$details['lineup'];
            }
 $timezone = $request->session()->get('local_timezone',"Asia/ Jakarta");



 $match_time = Utility::getUtcToLocal($details['date_time'],$timezone,"Y-m-d H:i");

$details['date_time'] = $match_time;

        // stats
        $Shot=$Shots=$ShotOnTarget=$ShotOnTargets=$Possession=$Possessions=$Passe=$Passes=$PassAccuracy=$PassAccuracys=$Foul=$Fouls=$Corner=$Corners='';

       if (isset($details['stats'][0]['shots']['total'])){
            $totals=$details['stats'][0]['shots']['total']+$details['stats'][1]['shots']['total'];
            $Shot=(100*$details['stats'][0]['shots']['total'])/$totals;
            $Shots=(100*$details['stats'][1]['shots']['total'])/$totals;
       }
       if (isset($details['stats'][0]['shots']['ongoal'])){
           $totals=$details['stats'][0]['shots']['ongoal']+$details['stats'][1]['shots']['ongoal'];
           $ShotOnTarget=(100*$details['stats'][0]['shots']['ongoal'])/$totals;
           $ShotOnTargets=(100*$details['stats'][1]['shots']['ongoal'])/$totals;
        }
        if (isset($details['stats'][0]['possessiontime']))
        {
            $totals=$details['stats'][0]['possessiontime']+$details['stats'][1]['possessiontime'];
            $Possession=(100*$details['stats'][0]['possessiontime'])/$totals;
            $Possessions=(100*$details['stats'][1]['possessiontime'])/$totals;
        }
        if (isset($details['stats'][0]['passes']['total']))
        {
            $totals=$details['stats'][0]['passes']['total']+$details['stats'][1]['passes']['total'];
            $Passe=(100*$details['stats'][0]['passes']['total'])/$totals;
            $Passes=(100*$details['stats'][1]['passes']['total'])/$totals;
        }
        if (isset($details['stats'][0]['passes']['accurate']))
        {
            $totals=$details['stats'][0]['passes']['accurate']+$details['stats'][1]['passes']['accurate'];
            $PassAccuracy=(100*$details['stats'][0]['passes']['accurate'])/$totals;
            $PassAccuracys=(100*$details['stats'][1]['passes']['accurate'])/$totals;
        }
        if (isset($details['stats'][0]['fouls']))
        {
            $totals=$details['stats'][0]['fouls']+$details['stats'][1]['fouls'];
            $Foul=(100*$details['stats'][0]['fouls'])/$totals;
            $Fouls=(100*$details['stats'][1]['fouls'])/$totals;
        }
        if (isset($details['stats'][0]['corners'])){
            $totals=$details['stats'][0]['corners']+$details['stats'][1]['corners'];
            $Corner=(100*$details['stats'][0]['corners'])/$totals;
            $Corners=(100*$details['stats'][1]['corners'])/$totals;
        }

        return view('matches.matches_details',compact('details','lineups','awaylineups','Shot','Shots','ShotOnTarget','ShotOnTargets','Possession','Possessions','Passe','Passes','PassAccuracy','PassAccuracys','Foul','Fouls','Corner','Corners'));
    }
    
    public function matchTimeline($id)
    {
        $details=[];
        $basic=config('global.basic');
        $utility = new Utility;
        $url =$basic."comments";
        $from=array('fixture_id'=>$id);
        $response=$utility->getResponse($url,$from);
        if(isset($response)){
        $details=$response['match'];
        $order = array();
        foreach ($details['comments'] as $key => $row)
        {
            $order[$key] = $row['order'];
        }
        array_multisort($order, SORT_DESC, $details['comments']);
        $comments=$details['comments'];
        }
        $status =$details['status'];
        return compact('comments','status');

    }
    public function HandToHand($homeTeamId, $awayTeamId)
    {
        $details=[];
        $basic=config('global.basic');
        $utility = new Utility;
        $url =$basic."HeadToHead";
        $from=array('homeTeamId'=>$homeTeamId,
                    'awayTeamId'=>$awayTeamId,
                    );
        $response=$utility->getResponse($url,$from);
        if(isset($response['HeadToHead'])){
        $details=$response['HeadToHead'];
        }
        return $details;
    }
    public function matchplayers($fixture_id)
    {
        $details=[];
        $basic=config('global.basic');
        $utility = new Utility;
        $url =$basic."players";
        $from=array('fixture_id' =>$fixture_id);
        $response=$utility->getResponse($url,$from);
        if(isset($response['players'])){
        $details=$response['players'];
        }
        return $details;
    }
    //17.05.2022
    public function matchDetails(Request $request)
    {
        $fixture_id = $request->input('fixture_id');
        $postdata = array('fixture_id' => $fixture_id);

        $query_url = "http://apigoaly.code-dev.in/api/getMatchDetails";
        $result = $this->curlGet($query_url,$postdata);
        $output = json_decode($result);

        if($output->success == 1)
        {
            $date_time = $output->details[0]->date_time;
            if(!empty($date_time))
            {
                $date_time_split = explode(" ", $date_time);
                $date = $date_time_split[0];
                $time = $date_time_split[1];

                return Response()->json([
                    "massage" => "Match info.",
                    "date_time" => $date_time,
                    "date" => $date,
                    "time" => $time,
                    "success" => 1,
                    "error" => 0
                ]);
            }
            else
            {
                return Response()->json([
                        "massage" => "No data found",
                        "success" => 0,
                        "error" => 1
                    ]);
            }
        }
        else
        {
            return Response()->json([
                "massage" => "No data found",
                "success" => 0,
                "error" => 1
            ]);
        }
    }

    public function matches_lineup($id)
    {
        $utility = new Utility;
        $responseData=$utility->matchDetails($id);
        $details=$responseData['match_details'][0];
        $position = array();
        
        foreach ($details['lineup'] as $key => $row)
        {
            $position[$key] = $row['formation_position'];
        }

        array_multisort($position, SORT_ASC, $details['lineup']);
        $lineups=$details['lineup'];
        foreach ($details['lineup'] as $key => $row)
        {
            $position[$key] = $row['formation_position'];
        }
        array_multisort($position, SORT_DESC, $details['lineup']);
        $awaylineups=$details['lineup'];
        //dd($lineups);
        return view('matches.matches_lineup',compact('details','lineups','awaylineups'));
    }

    public function matches_stat()
    {
        return view('matches.matches_stat');
    }


    public function matches_comment($id)
    {
        $utility = new Utility;
        $responseData=$utility->matchDetails($id);
        $details=$responseData['match_details'][0];
        $order = array();
        foreach ($details['comments'] as $key => $row)
        {
            $order[$key] = $row['order'];
        }
        array_multisort($order, SORT_DESC, $details['comments']);
        $comments=$details['comments'];
        //dd($details['comments']);
        return view('matches.matches_comment',compact('details','comments'));
    }

    public function getleagues()
    {
        $url =config('global.LeaguesDetails');
        $from=array('page' => 'live');
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        return $responseData['leagues'];
        //dd($responseData['leagues']);

    }

    public function matchByLeague($id,$day)
    {
      //dd($day);
    $match= League::findSportsmonksId($id)->first();
    $league_id=$match->sportsmonks_id;
    //$league_id=301;
    if($day==1)
      $type='yesterday';
    elseif($day==2)
        $type='today';
    elseif($day==3)
        $type='tomorrow';
    if($day==4)
    $from=array('league_id'=>$league_id);
    else
    $from=array('league_id'=>$league_id,'type' => $type);
    //dd($from);


    $basic=config('global.basic');
    $url =$basic.config('global.liveMatchDetailsUrl');
    //dd($url);
    //$url='http://api.goaly.mobi/SportsMonks/liveMatches_sportsmonks';
    //$from=array('league_id'=>$league_id);
    $utility = new Utility;
    $responseData=$utility->getResponse($url,$from);
    //$responseData=$utility->matchDetailsByLeague($league_id,$day);
    //dd($responseData[0]['homeTeam']);
        $responseMatch = array();
        foreach ($responseData as $x =>$value) {
            //dd($value);
            $responseHomeTeam = json_decode($value['homeTeam'], TRUE);

            $responseAwayTeam = json_decode($value['awayTeam'], TRUE);
            array_push($responseMatch, [$responseHomeTeam,$responseAwayTeam,$value['status'],$value['date_time'],$value['season_id'],$value['league_id'],$value['id']]);

          }
          //dd($responseMatch);
        //dd($responseMatch);
        return $responseMatch;
    }

    // public function matchByStanding($id)
    // {
    // $utility = new Utility;
    // $responseData=$utility->matchesStanding($id);
    // return $responseData;
    // }
    public function advanceStats()
    {
        return view('matches.detail_match_stats_advance');
    }
    public function comment(commentRequest $request)
    {
        $data = $request->all();
        #create or update your data here
        $dataArr=array();
        $dataArr['comment']=$data['comment'];
        $dataArr['match_id']=$data['match_id'];
        $dataArr['user_id']=234;
        $dataArr['created_at'] = date("Y-m-d H:i:s");
        $result = userMatchComment::create($dataArr);
        $result = userMatchComment::findCommentById($dataArr['user_id'])->get();
        return $result;

    }

    public function teamDetail($id)
    {
        $basic="http://api.goaly.mobi/";
        $url =$basic.config('global.teamDetail');
        $from=array('id' =>$id);
        $utility = new Utility;
        $matches=$utility->getResponse($url,$from);
        $url =$basic.config('global.newsForTeam');
        $news=$utility->getResponse($url,$from);
        $url =$basic.config('global.teamStanding');
        $standing=$utility->getResponse($url,$from);
        $url =$basic.config('global.etteamplayers');
        $players=$utility->getResponse($url,$from);

        return view('matches.team_detail',compact('matches','news','standing','players'));
    }


    public function playerDetails($id, $pid)
    {
        $basic=config('global.basic');
        $from=array('id' =>$id);
        $utility = new Utility;
        $url =$basic.config('global.etteamplayers');
        $players=$utility->getResponse($url,$from);
        $playerId=$pid;
        foreach ($players['players'] as $key => $value)
        {
            if($value['player_id']==$playerId)
            {
            $player=$value;
            break;
            }
        }
        //dd($player);
        //dd($players);
        // $matches=$responseData['matches'];
        // $fixturesmatches=$responseData['matches'];
        // $url ='http://smartcms.goaly.mobi/api/teamStanding';
        // $from=array('id' => '$id');
        // $responseData=$utility->getResponse($url,$from);
        //dd($responseData);
        return view('matches.player_details',compact('player'));
    }


    public function allTeamMatches(Request $request)
    {
        $date = $request->input('date');
        $type = $request->input('type');

        $filter_date = date("d-m-Y", strtotime($date));

        if($type == "yesterday"){
            $data = array('end_date' => $filter_date);
        }
        elseif ($type == "today") {

            $data = array('start_date' => $filter_date , 'end_date' => $filter_date);
        }

        elseif ($type == "tomorrow") {
            $data = array('start_date' => $filter_date);
        }

        else
        {
            $data = '';
        }


        $client = new GuzzleClient();
        $URI = 'http://apigoaly.code-dev.in/api/getMatches';
        $params['headers'] = ['Content-Type' => 'multipart/form-data'];
        $params['form_params'] = array('start_date' => $filter_date);
        $response = $client->post($URI, $params);
        $result = $response->getBody();

        $output = json_decode($result);

        print_r($output);die("+++");

        if(isset($output) && !empty($output))
        {
            $matches = $output->matches;

            return Response()->json([
                    "massage" => "Matches list.",
                    "matches" => $matches,
                    "success" => 1,
                    "error" => 0
                ]);
        }
        else
        {
            return Response()->json([
                    "massage" => "No data found",
                    "success" => 0,
                    "error" => 1
                ]);
        }
    }

    public function getmatches(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $type = $request->input('type');
        $team_type = $request->input('team_type');
        $league_id = $request->input('league');
        $leagues[] =$league_id;

        $fav_teams=array();



        $filter_start_date = date("d-m-Y", strtotime($start_date));
        $filter_end_date = date("d-m-Y", strtotime($end_date));

       $postdata = array(
                          'start_date' => $filter_start_date ,
                          'end_date' => $filter_end_date,
                           'fav_teams' =>$fav_teams,
                           'league_id' => $league_id,

                           'type' => $type

                      );





        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');


        $utility = new Utility;
        $responseData=$utility->getResponse($url,$postdata);

        $response= $responseData;

 return Response()->json($response);


    }

    public function curlGet($query_url, $data)
    {
        $ch = curl_init($query_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: multipart/form-data'
        ));

        $response = curl_exec ($ch);
        $err = curl_error($ch); //if you need
        curl_close ($ch);
        return $response;
    }
}
