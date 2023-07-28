<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Predictions;
use Modules\Admin\Entities\Leagues;
use App\Common\Utility; 
use Modules\Admin\Http\Controllers\MatchController;
use Redirect;

class PredictionsController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
    */

    public function index()
    {
        // $allCompetitions = Predictions::select('*')->orderBy('created_at', 'DESC')->get()->toarray();
         $allCompetitions = Predictions::fetchallprediction();
        
        return view('admin::predictions.index',compact('allCompetitions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create()
    {
        $league_details = Leagues::getAllLeagues();
        return view('admin::predictions.create',compact('league_details'));
    }

    public function sumbitprediction(Request $request){

        $data = $request->all();
       
       
        if(!empty($data))
        {   

            $predictionObj = new Predictions();

            $start=$data['prediction_start'];
            $date = strtotime($start); 
            $start_date=date('y-m-d h:i:s' ,$date);

            $last=$data['prediction_end'];
            $date1 = strtotime($last);
            $end_date=date ('y-m-d h:i:s' , $date1);

            if(isset($data['match']))
            {
                
            
                
       
                $match_id = $data['match'][0];
                $postdata = array('fixture_id' => $match_id);

                 $basic=config('global.basic');
                $query_url = "http://new-api.goaly.mobi/api/fixtureDetails";

                $result = $this->curlGet($query_url,$postdata);
                $output = json_decode($result);
                $league_id = $data['leagues'];

                $league_details=Leagues::getLeagueData($league_id);

                $predictionObj['match_id']=$match_id;
                $predictionObj['league_id']=$league_id;
                $predictionObj['league_name']=$league_details->competition_name;
                $predictionObj['league_logo']=$league_details->old_logo;

                $predictionObj['home_team_id']=$output->match->homeTeam->id;
                $predictionObj['home_team_name']=$output->match->homeTeam->name;
                $predictionObj['home_team_logo']=$output->match->homeTeam->logo_path;
                $predictionObj['score_home']=$output->match->homeTeam->score;

                $predictionObj['away_team_id']=$output->match->awayTeam->id;

                $predictionObj['away_team_name']=$output->match->awayTeam->name;
                $predictionObj['away_team_logo']=$output->match->awayTeam->logo_path;
                $predictionObj['score_away']=$output->match->awayTeam->score;
        
                $predictionObj['match_start_time']=$output->match->date_time;
                $predictionObj['status']=$output->match->status;
                $predictionObj['venue']=$output->match->venue->name;
                $predictionObj['venue_image']=$output->match->venue->image_path;

                $predictionObj['group_name'] = $data['group_name'];
                $predictionObj['prediction_type'] = $data['prediction_type'];
                $predictionObj['prediction_start_time']=$start_date ;
                $predictionObj['prediction_end_time']= $end_date;
                $predictionObj['is_active']= 1;
                $predictionObj['is_end']= 0;
                $predictionObj['winner_status']= 0;
                $predictionObj['created_at']= date('Y-m-d H:i:s');
                $predictionObj['updated_at']= date('Y-m-d H:i:s');

                $result = $predictionObj->save();
               
                if($result){
                    return Redirect::to('/admin/prediction');
                }else{
                    return Redirect::to('/test');
                }

            }
        }
    }


    public function editprediction(Request $request){

        $predictionDetails = Predictions::fetchPredictionById($request['id']);

        $league_details = Leagues::getAllLeagues();

        $leagie_id = $predictionDetails->league_id;

        $url = "http://new-api.goaly.mobi/api/getMatches";

        $from = array('league_id' => $leagie_id);
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        $response=$responseData['matches'];

        return view('admin::predictions.edit',compact('predictionDetails','league_details','response'));
    }

    public function delete(Request $request)
    {   

         $delete= Predictions ::deletePredictionById($request['id']);

        // if($delete){
            
        //     return Redirect::to('/admin/prediction');
        // }else{
        //     $res['status'] = false;
        //     echo json_encode($res);
        // }
       if($delete){
         $res['status'] = true;
        }else {
            $res['status'] = false;          
        }
        echo json_encode($res);
    }

 public function update_status(Request $request)
    {
        $res = [];
        $id = $request->id;
        
        $status = $request->status;
        
        if ($status) {
            $msg = 'Prediction is active';
        }else {
            $msg = 'Prediction is inactive';
        }

       
        $dt = Predictions::find($id);
        
        $dt->is_active = $status;


        if ($dt->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
    }


   

    public function updateprediction(Request $request){

            $data=$request->all();

            $start=$data['prediction_start'];
            $date = strtotime($start); 
            $start_date=date('y-m-d h:i:s' ,$date);

            $last=$data['prediction_end'];
            $date1 = strtotime($last);
            $end_date=date ('y-m-d h:i:s', $date1);

            if(isset($data['match'])){

               $data['id']= $data['prediction_tableId'];
               $prediction = Predictions ::predictionExits($data['prediction_tableId']);

               if($prediction){

                $match_id = $data['match'][0];
                $postdata = array('fixture_id' => $match_id);
        

                $query_url = "http://new-api.goaly.mobi/api/fixtureDetails";

                $result = $this->curlGet($query_url,$postdata);
                $output = json_decode($result);
                $league_id = $data['leagues'];
                $league_details=Leagues::getLeagueData($league_id);

                $prediction= array();

                $prediction['id']= $data['prediction_tableId'];
                $prediction['match_id']=$match_id;
                $prediction['league_id']=$league_id;
                $prediction['league_name']=$league_details->competition_name;
                $prediction['league_logo']=$league_details->old_logo;

                $prediction['home_team_id']=$output->match->homeTeam->id;
                $prediction['home_team_name']=$output->match->homeTeam->name;
                $prediction['home_team_logo']=$output->match->homeTeam->logo_path;
                $prediction['score_home']=$output->match->homeTeam->score;

                $prediction['away_team_id']=$output->match->awayTeam->id;
                $prediction['away_team_name']=$output->match->awayTeam->name;
                $prediction['away_team_logo']=$output->match->awayTeam->logo_path;
                $prediction['score_away']=$output->match->awayTeam->score;
        
                
                $prediction['match_start_time']=$output->match->date_time;
                $prediction['status']=$output->match->status;
                $prediction['venue']=$output->match->venue->name;
                $prediction['venue_image']=$output->match->venue->image_path;

                $prediction['group_name'] = $data['group_name'];
                $prediction['prediction_type'] = $data['prediction_type'];
                $prediction['prediction_start_time']=$start_date ;
                $prediction['prediction_end_time']= $end_date;
                $prediction['is_active']= 1;
                $prediction['is_end']= 0;
                $prediction['winner_status']= 0;
                $prediction['created_at']= date('Y-m-d H:i:s');
                $prediction['updated_at']= date('Y-m-d H:i:s');

                $result = Predictions :: updatePrediction($prediction);
                // $result=$prediction->update();

            //     print_r($result);
            //     die("checking result");

                if($result){
                    return Redirect::to('/admin/prediction');
                }else{
                    return Redirect::to('/admin/test');
                }
                
               }

            }
        
    }

    public function show($id)
    {
        return view('admin::show');
    }

    public static function getmatches(Request $request){

        $leagie_id = $request->input('id');
        $start_date=$request->input('start_date');
        $from = array('league_id' => $leagie_id,
                      'start_date' =>$start_date);
        
        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');
         $utility = new Utility;
         $responseData=$utility->getResponse($url,$from);
         

        $response['data']=$responseData['matches'];

        return $response;      
    }

    


    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function curlGet($query_url, $data=array())
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
