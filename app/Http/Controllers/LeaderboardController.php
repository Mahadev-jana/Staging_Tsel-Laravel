<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prediction;
use App\UserList;
use App\PredictionPrize;
use App\PlayedPrediction;
use App\PredictionGame;
use Illuminate\Support\Facades\DB;
class LeaderboardController extends Controller
{
    //
    // public function index()
    // {
    //     return view('leaderboard.index');
    // }
    public function leaderboard_detail()
    {
        return view('leaderboard.leaderboard_detail');
    }
    public function index()
    {

        $leaderboard = [];
        $general = [];
        $weekly = [];
        $monthly = [];
        $quarterly = [];


        $last = date("Y-m-d", strtotime('monday this week'));
        $next = date("Y-m-d", strtotime('sunday this week'));
        $last ='2021-10-02';
        $first_day = date("Y-m-d", strtotime('first day of this month'));
        $last_day = date("Y-m-d", strtotime('last day of this month'));
        $first_day='2019-10-20';
        $lnk = "http://" . $_SERVER['HTTP_HOST'] . "/assets/uploads/profiles/";
		$no_img = "http://" . $_SERVER['HTTP_HOST'] . "/assets/uploads/profiles/user_no_image.png";

        // general leaderboard data

        $get_first_week_pred = Prediction::select("id")->First_week_pred($last,$next)->first()->toArray();

        $get_first_week_pred_id = isset($get_first_week_pred->id) ? $get_first_week_pred->id : '';

        $g_list = UserList::select('user_list.id','user_list.phone_no','first_name','last_name','img','coins','prediction_prizes.coin_won')->Generalleaderboardscore()->get()->toArray();
        // return $g_list;
        foreach ($g_list as $key => $user) {
            $pred_his=[];
            $pred_his =PredictionPrize::select('prediction_games.id','prediction_games.match_start_time','prediction_games.home_team_name as homeTeamName','prediction_games.home_team_logo as homeTeamLogo','prediction_games.away_team_name as awayTeamName','prediction_games.away_team_logo as awayTeamLogo','prediction_games.score_away as awayTeamScore','prediction_games.score_home as homeTeamScore','prediction_prizes.coin_won','prediction_prizes.created_at as history_createdAt')->PredHistory($user['id'])->first();
            if(isset($pred_his)){
                $pred_his=$pred_his->toArray();
            }

            if ($get_first_week_pred_id != '')
                $first_pred_date = PlayedPrediction::select('created_at')->FirstPredDate($user['id'])->first();
                // if()
                $name= $user['first_name'].' '.$user['last_name'];
            $general[] = array(
                'user_id' => $user['id'],
                'name' => $name,
                'image' => ($user['img']!=null)?($lnk.$user['img']): $no_img,
                'coins' => $user['coins'],
                'wins' => $user['coin_won'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'history' => $pred_his
            );
        }

        // weekly leaderboard data
        $last1  = date("Y-m-d", strtotime('monday this week'));
        $next1  = date("Y-m-d", strtotime('sunday this week'));
        $last1  ='2019-10-20';
         $next1='2021-10-23';
        $get_first_week_pred = PredictionGame::select('id')->PreWeekPred($last1, $next1)->get()->toArray();
        // return $get_first_week_pred;
        //  print_r($get_first_week_pred);die;
        // $get__week_pred_id = isset($get_first_week_pred->id) ? $get_first_week_pred->id : '';
        $w_list = PredictionPrize::select('user_list.id','user_list.phone_no','first_name','last_name','img','coins','prediction_prizes.coin_won',

        )->Weeklyleaderboardscore($last1, $next1)->get()->toArray();
        foreach ($w_list as $user) {
            $pred_his = PredictionPrize::select('prediction_games.id','prediction_games.match_start_time','prediction_games.home_team_name as homeTeamName','prediction_games.home_team_logo as homeTeamLogo','prediction_games.away_team_name as awayTeamName','prediction_games.away_team_logo as awayTeamLogo','prediction_games.score_away as awayTeamScore','prediction_games.score_home as homeTeamScore','prediction_prizes.coin_won','prediction_prizes.created_at as history_createdAt')->get_weekly_pred_history($user['id'], $last, $next)->first();
            if(isset($pred_his)){
                $pred_his=$pred_his->toArray();
            }
            // return $pred_his;
            if ($get_first_week_pred_id != '')
                $first_pred_date = PlayedPrediction::select('created_at')->FirstPredDate($user['id'])->first()->toArray();
                $name= $user['first_name'].' '.$user['last_name'];
            $weekly[] = array(
                'user_id' => $user['id'],
                'name' => $name,
                'image' => ($user['img']!=null)?($lnk.$user['img']): $no_img,
                'coins' => $user['coins'],
                'wins' => $user['coin_won'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'history' => $pred_his
            );
        }
        // return $weekly;
        // monthly leaderboard data
        // $get_first_month_pred = $this->stageGoalyApi_model->get_first_month_pred($first_day, $last_day);
        $get_first_month_pred_id = isset($get_first_week_pred->id) ? $get_first_week_pred->id : '';

        $m_list = PredictionPrize::monthlyleaderboardscore($first_day, $last_day)->get()
        // ->groupBy('user_list.id')
        ;

        foreach ($m_list as $user) {

            $pred_his = PredictionPrize::select('user_id','prediction_games.id',
            'prediction_games.match_start_time',
            'prediction_games.home_team_name as homeTeamName',
            'prediction_games.home_team_logo as homeTeamLogo',
            'prediction_games.away_team_name as awayTeamName',
             'prediction_games.away_team_logo as awayTeamLogo',
             'prediction_games.score_away as awayTeamScore',
            'prediction_games.score_home as homeTeamScore',
            'prediction_prizes.coin_won',
             'prediction_prizes.created_at as history_createdAt')->MonthlyPredHistory($user['id'], $first_day, $last_day)->first();

            if ($get_first_month_pred_id != '')
            $first_pred_date = PlayedPrediction::select('created_at')->FirstPredDate($user['id'])->first();
                // $first_pred_date = $this->stageGoalyApi_model->first_pred_date($user['id'], $get_first_month_pred_id);

            $monthly[] = array(
                'user_id' => $user['id'],
                'name' => $name,
                'image' => ($user['img']!=null)?($lnk.$user['img']): $no_img,
                'coins' => $user['coins'],
                'wins' => $user['coin_won'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'history' => $pred_his,

            );
        }
        //quarterly leader board data
        //dd(compact('general','weekly','monthly'));
       return view('leaderboard.index',compact('general','weekly','monthly'));
         return compact('general','weekly','monthly');
        $current_quarter = ceil(date("m") / 3);
        $quarterly_first_date = date('Y-m-d', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1'));
        $quarterly_last_date = date('Y-m-t', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));


        $get_first_quarterly_pred = PredictionGame::FirstQuarterlyPred($quarterly_first_date, $quarterly_last_date)->first();

        $get_first_quarterly_pred_id = isset($get_first_quarterly_pred->id) ? $get_first_quarterly_pred->id : '';
        return $get_first_quarterly_pred_id;
        $q_list = $this->stageGoalyApi_model->getquarterlyleaderboardscore($quarterly_first_date, $quarterly_last_date);
        foreach ($q_list as $user) {
            $flag = 0;
            $pred_his = $this->stageGoalyApi_model->get_quarterly_pred_history($user['id'], $quarterly_first_date, $quarterly_last_date);

            if ($get_first_quarterly_pred_id != '') {
                $first_pred_date = $this->stageGoalyApi_model->first_pred_date($user['id'], $get_first_quarterly_pred_id);
            }
            if (!empty($first_pred_date)) {
                $flag++;
            }
            $quarterly[] = array(
                'user_id' => $user['id'],
                'name' => $user['name'],
                'image' => $user['image'],
                'coins' => $user['coins'],
                'wins' => $user['wins'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'flag' => $flag,
                'history' => $pred_his
            );
        }

        $leaderboard['general'] = isset($general) ? $general : array();
        $leaderboard['weekly'] = isset($weekly) ? $weekly : array();
        $leaderboard['monthly'] = isset($monthly) ? $monthly : array();
        $leaderboard['quarterly'] = isset($quarterly) ? $quarterly : array();

        if ($leaderboard) {
            $this->response([
                'score_list' => $leaderboard,
                'success' => 1,
                'error' => 0,
                'status' => 200
            ], REST_Controller::HTTP_OK);
        } else
            $this->response([
                'score_list' => $leaderboard,
                'success' => 1,
                'error' => 0,
                'status' => 200,
                'message' => 'No data found.'
            ], REST_Controller::HTTP_OK);
    }

}
