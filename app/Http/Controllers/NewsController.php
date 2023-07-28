<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\Utility;

class NewsController extends Controller
{
    //
    public function index()
    {
        $utility = new Utility;
        $basic="http://api.goaly.mobi/";
        $from="";
        $url =$basic.config('global.hottes');
        $hottestnews=$utility->getResponse($url,$from);
        $url =$basic.config('global.latest');
        $latestnews=$utility->getResponse($url,$from);
        $url =$basic.config('global.transfer');
        $transfernews=$utility->getResponse($url,$from);
        $url =$basic.config('global.videos');
        $videos=$utility->getResponse($url,$from);
        //$newss=$news;
        // foreach($newss as $news)
        //dd($transfernews);
        return view('news.index',compact('hottestnews','latestnews','transfernews','videos'));
    }
    public function news_detail()
    {
        return view('news.news_detail');
    }
    public function news_latest()
    {
        return view('news.news_latest');
    }
    public function news_transfer()
    {
        return view('news.news_transfer');
    }
}
