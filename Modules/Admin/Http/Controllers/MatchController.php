<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Common\Utility;
use Illuminate\Routing\Controller;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    public function store(Request $request)
    {
        
    }

    public static function getmatches(Request $request){

        $leagie_id = $request->input('id');
        $url = "http://apigoaly.code-dev.in/api/getMatches";

        $from = array('league_id' => $leagie_id);
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        $response['data']=$responseData['matches'];
        return $response;      
    }

    public function matchDetails(Request $request){

        $fixture_id = $request->input('fixture_id');
        $postdata = array('fixture_id' => $fixture_id);

        $query_url = "http://apigoaly.code-dev.in/api/getMatchDetails";
        $result = $this->curlGet($query_url,$postdata);
        $output = json_decode($result);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

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

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function destroy($id)
    {
        //
    }
}
