<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Goaly - Lorem Ipsium</title>

        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/swiper.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link href="../assets/css/main.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="../assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/skeleton.css')}}">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
        <link rel="apple-touch-icon-precomposed" href="">
        <link rel="shortcut icon" sizes="196x196" href="">
        <link rel="shortcut icon" href="">
        
        @push('style')
        <style>
            .swiper-pagination-bullet {
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
            color:#000;
            opacity: 1;
            background: rgba(0,0,0,0.2);
            }
            .swiper-pagination-bullet-active {
            color:#fff;
            background: #4D0053;
            }

        </style>
         @endpush
