<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PredictionPrize extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(UserList::class, 'user_id', 'id');
    }
    public function scopeWin($query)
    {
        return $query->where('coin_won', '!=', 0);

    }
    public function scopePredHistory($query,$id)
	{
        return $query->where('user_id','=', $id)
                     ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                     ;

	}
    public function scopeWeeklyleaderboardscore($query,$last1, $next1)
	{
        // return DB::raw("SELECT (select COUNT(*) FROM goaly_prediction_prize_history where goaly_prediction_prize_history.user_id=user_list.id AND coin_won !=0 AND (DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') >= '2019-10-20' AND DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') <= '2021-10-23') AND pred_type = 'weekly') wins FROM 'goaly_prediction_prize_history' LEFT JOIN 'user_list' ON 'goaly_prediction_prize_history'.'user_id' = 'user_list'.'id' WHERE 'pred_type' = 'weekly'");
        return $query


                        ->where('match_start_time', '>=' , $last1)
                        ->where('match_start_time', '<=', $next1)
                        // ->where('pred_type','=', 'weekly')
                        ->join('user_list', 'prediction_prizes.user_id', '=', 'user_list.id')
                        ->orderBy('coins', 'desc')
                        ;

	}public function scopeget_weekly_pred_history($query, $id, $last, $next)
	{
		//echo $id;die("in model");
        return $query
                     ->where('user_id','=', $id)
                     ->where('prediction_games.match_start_time', '>=' , $last)
                     ->where('prediction_games.match_start_time', '<=', $next)
                     ->where('pred_type','=', 'weekly')
                     ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                     ;

	}
    public function scopemonthlyleaderboardscore($query, $firstday, $lastday)
	{ // 28 jan 2020

		return $query
                        ->where('prediction_prizes.match_start_time','>=', $firstday)
                        ->where('prediction_prizes.match_start_time','<=', $lastday)
                        ->where('pred_type', '=' ,'monthly')
                        ->join('user_list', 'prediction_prizes.user_id', '=', 'user_list.id')
                        // ->groupBy('user_list.id')
                        ->orderBy('coins', 'desc')
                        ;

		$this->db->select("user_list.phone_no,CONCAT(user_list.first_name,' ',user_list.last_name) name,case when user_list.img=''
	 								then '$no_img'
	       							else CONCAT('$lnk',user_list.img)
	 							end as image,(select COUNT(*)
 FROM goaly_prediction_prize_history where goaly_prediction_prize_history.user_id=user_list.id AND coin_won !=0 AND pred_type = 'monthly' ) wins,(select sum(coin_won) from goaly_prediction_prize_history where user_id=user_list.id AND pred_type = 'monthly'  AND (DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') >= '$firstday' AND DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') <= '$lastday'))as coins,user_list.id");
		$this->db->from("goaly_prediction_prize_history");
		$this->db->where("DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') >=", $firstday);
		$this->db->where("DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') <=", $lastday);
		$this->db->where("pred_type", 'monthly');
		$this->db->join("user_list", "goaly_prediction_prize_history.user_id = user_list.id", 'LEFT');
		$this->db->group_by('user_list.id');
		$this->db->order_by('coins', 'desc');
		$q = $this->db->get();
		// echo $this->db->last_query();
		// die("die");
		return $q->num_rows() > 0 ? $q->result_array() : array();
	}
    public function scopeMonthlyPredHistory($query, $id, $firstday, $lastday)
	{
        // $id= 316;
        return $query
                        ->where('prediction_prizes.user_id','=', $id)
                        ->where('prediction_games.match_start_time', '>=' , $firstday)
                        ->where('prediction_games.match_start_time', '<=', $lastday)
                        ->where('pred_type', '=' ,'monthly')
                        ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                        ;
		$this->db->select("$id as user_id,goaly_prediction_game.id,
							goaly_prediction_game.match_start_time,
							goaly_prediction_game.home_team_name as homeTeamName,
							goaly_prediction_game.home_team_logo as homeTeamLogo,
							goaly_prediction_game.away_team_name as awayTeamName,
				 			goaly_prediction_game.away_team_logo as awayTeamLogo,
				 			goaly_prediction_game.score_away as awayTeamScore,
							goaly_prediction_game.score_home as homeTeamScore,
							goaly_prediction_prize_history.coin_won,
				 			goaly_prediction_prize_history.created_at as history_createdAt");
		$this->db->from("goaly_prediction_prize_history");
		$this->db->where('goaly_prediction_prize_history.user_id', $id);
		$this->db->where("DATE_FORMAT(goaly_prediction_game.match_start_time, '%Y-%m-%d') >=", $firstday);
		$this->db->where("DATE_FORMAT(goaly_prediction_game.match_start_time, '%Y-%m-%d') <=", $lastday);
		$this->db->where("pred_type", 'monthly');
		$this->db->join('goaly_prediction_game', 'goaly_prediction_prize_history.pred_id=goaly_prediction_game.id', 'LEFT');
		$q = $this->db->get();
		return $q->num_rows() > 0 ? $q->result_array() : array();
	}
}
