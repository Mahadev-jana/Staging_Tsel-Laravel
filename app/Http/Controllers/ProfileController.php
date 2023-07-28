<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\UserModel;

class ProfileController extends Controller
{
    public function index()
    {
    	$UserId = Session::get('UserId');
    	
    	if ($UserId) {
            $user_details = UserModel::whereId($UserId)->first();
        } 
        return view('profile.index',compact('user_details'));
    }
    public function profile_contest_history()
    {
        return view('profile.profile_contest_history');
    }
}
