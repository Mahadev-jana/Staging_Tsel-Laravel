<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;
use DB;
use App\Common\Utility;


class LeagueController extends Controller
{
    public function index()
    {
        $details = League::GetleagueRecord();
        return view('League.index',compact('details'));
    }

    // public function index()
    // {
    //     $utility = new Utility;
    //     $basic=config('global.basic');
    //     $url =$basic.'allLeague';
    //     $from=array('page' => "live");
    //     $responseData=$utility->getResponse($url,$from);

    //     $details = $responseData['data'];
    //     return view('League.index',compact('details'));
    // }

    public function league_detail($id)
    {
        $league_id = $id;
        $details=[];
        // $details = League::GetLeagueDetailsBySportsmonkId($id);
        // $SeasonDetails=[];
        // $PlayerDetails=[];

        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'leagueDetail';
        $from=array('league_id' => $league_id);
        $responseData_1=$utility->getResponse($url,$from);

        if(count($responseData_1['standing'])>0)
        {
            $details = $responseData_1['standing'];
        //     $season_id = $details['id'];
        //     $comp_id = $details['competition_id'];

        //     $url =$basic.'leagueSeasonInfo';
        //     $from=array('league_id' => $league_id,
        //                 'season_id'=>$season_id,
        //                 'comp_id'=>$comp_id,
        //                 );

        //     $responseData_2=$utility->getResponse($url,$from);
        //     $SeasonDetails = $responseData_2['season_info'];

        //     $url =$basic.'leagueTopPlayers';
        //     $from=array('league_id' => $league_id,
        //                 'comp_id'=>$comp_id,
        //                 );

        //     $responseData_3=$utility->getResponse($url,$from);
        //     $PlayerDetails = $responseData_3['stats'];

            // return view('League.league_details',compact('league_id'));
        }

        return view('League.league_details',compact('league_id','details'));
    }

    public function getLeague(Request $request)
    {
        $league_details = League::GetleagueRecord();

        if(!empty($league_details))
        {
            return Response()->json([
                "massage" => "League list.",
                "league" => $league_details,
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

    public function MatchesListByLeague(Request $request)
    {
        $league_id = $request->input('league_id');
        $league = $league_id;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $type = $request->input('type');

        $filter_start_date = date("d-m-Y", strtotime($start_date));
        $filter_end_date = date("d-m-Y", strtotime($end_date));

        $postdata = array('start_date' => $filter_start_date ,'end_date' => $filter_end_date, 'league' => $league);

        $query_url = "http://apigoaly.code-dev.in/api/MatchesListByLeague";
        $result = $this->curlGet($query_url,$postdata);
        $output = json_decode($result);

        if(isset($output) && !empty($output))
        {
            if($output->success == 1)
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
    public function LeagueRound($league_id)
    {
        $round=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'roundByLeague';
        $from=array('league_id' => $league_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $round=$responseData['round_list'];
        }
        return $round;
    }
    public function LeagueMatch($league_id,$round_id)
    {
        $matches=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'LeagueMatches';
        $from=array('league_id' => $league_id, 'round_id' => $round_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $matches=$responseData['matches'];
        }

        return $matches;
    }
    public function LeagueStanding($league_id)
    {
        $standing=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'LeagueStanding';
        $from=array('league_id' => $league_id,);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $standing=$responseData['standing'];
        }

        return $standing;
    }
    public function LeagueTopScores($league_id, $season_id)
    {
        $scores=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'leagueSeasonInfo';
        $from=array('league_id' => $league_id,'season_id' => $season_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $scores=$responseData['season_info'];
        }

        return $scores;
    }
    public function LeagueTopPlayers($league_id, $comp_id)
    {
        $players=[];
        $utility = new Utility;
        $basic=config('global.basic');
        $url =$basic.'leagueTopPlayers';
        $from=array('league_id' => $league_id,'comp_id' => $comp_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $players=$responseData['stats'];
        }
        return $players;
    }
}
