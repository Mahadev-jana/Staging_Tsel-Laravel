<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayedPrediction extends Model
{
    protected $table = 'user_played_prediction';
    //
    public function scopeFirstPredDate($query,$user_id)
    {
        return $query->where('user_id', '=', $user_id);

    }
    // public function firstPredDate($user_id)
	// {

	// 	$this->db->select('created_at');

	// 	// $this->db->where('pred_id',$pred_id);
	// 	// $this->db->limit(1);
	// 	$q = $this->db->get();
	// 	return $q->num_rows() > 0 ? $q->row() : array();
	// }
}
