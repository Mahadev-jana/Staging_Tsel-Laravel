<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContestController extends Controller
{
    //
    public function index()
    {
        return view('contest.index');
    }
    public function contest_detail()
    {
        return view('contest.contest_detail');
    }
    public function new_contest_detail()
    {
        return view('contest.new_contest_detail');
    }
    public function contest_detail_result()
    {
        return view('contest.contest_detail_result');
    }
    public function contest_viewtip()
    {
        return view('contest.contest_viewtip');
    }
    public function profile_contest_history()
    {
        return view('contest.profile_contest_history');
    }
    public function contest_history()
    {
        return view('contest.contest_history');
    }
}
