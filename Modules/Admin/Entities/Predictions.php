<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class Predictions extends Model
{
   
    protected $table = 'predictions';
    
    // protected $fillable = ['order','competition_name','competition_id','old_logo','white_logo','pos','sportsmonks_id','created_at'];
    protected $fillable = ['match_id','league_id','league_name','league_logo','home_team_id','home_team_name','home_team_logo',
                            'score_home','away_team_id','away_team_name','away_team_logo','score_away','match_start_time',
                            'status','venue','venue_image','group_name','prediction_type','prediction_start_time','prediction_end_time',
                            'is_active','is_end','winner_status','created_at','updated_at'];
    public function scopeAll($query)
    {
        return $query->get();
    }

    public static function fetchPredictionById($id){

      return $quary = DB::table('predictions')->select('*')->where('id',$id)->first();
    }
    
    public static function fetchallprediction(){

       return $quary = DB::table('predictions')->select('*')->orderBy('created_at','DESC')->get()->toarray();

    }

    public static function deletePredictionById($id){

      return $quary = DB::table('predictions')->where('id', $id)->delete();
    }


    public static function predictionExits($id){

      return $quary = DB::table('predictions')->where('id', $id)->get();

    }

    public static function updatePrediction($value){

     

      $values = DB::table('predictions')->where('id',$value['id'])->update($value);

      return $values;
    
    }
    //   print_r($value);
    //   die("hjlj");

    //   return $quary = DB::table('predictions')
    //   ->where('id','=',$value['prediction_tableId'])
    //   ->update([
    //       'group_name' => $value['group_name'],
    //       'prediction_type'=>$value['prediction_type'],
    //       'prediction_start_time'=>$value['prediction_start'],
    //       'prediction_end_time'=>$value['prediction_end'],
    //       'league_name'=>$value['support_provided'],
    //       'match_id'=>$value['match_id'],
    //       'updated_at'=>date('Y-m-d H:i:s')]);
    // }

   public static function scopeisActive($query)
   {

     return $query->where('is_active', 1);

   }

   public function scopeisEnd($query)
   {
       return $query->where('is_end', 1);
   }

    public function scopeOrderByCreated($query)
   {
       return $query->orderBy('created_at','DESC');
   }


    

}
