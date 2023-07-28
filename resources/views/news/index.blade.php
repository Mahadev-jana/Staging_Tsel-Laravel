@include('partials.headernew')
<title>Goaly</title>
</head>

<body>
    <div class="wrapper">
        <!-- header image -->
        <img src="./assets/img/header.png" class="img-fluid" alt="">
        <!-- header image -->

        <div class="block bg-grey">
            <!-- menu -->
            @include('partials.topmenu_portal')
            <!-- menu -->
        </div>


        <div class="block">
            <div class="d-flex" style="margin-top: -2.75em;">
                <a href="#" class="btn btn-lg border btn-white w-50 mr-1">My Team</a>
                <a href="#" class="btn btn-lg border btn-purple text-white w-50 ml-1">All Team</a>
            </div>

            <!-- filter days -->
            <ul class="filter-days">

                <a class="nav-link" id="hottest-tab" onclick="myFunction(1)" data-toggle="tab" href="#hottest" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1 " id="hottest1">Hottest</li>
                    </a>
                <a class="nav-link" id="latest-tab" onclick="myFunction(2)" data-toggle="tab" href="#latest" role="tab" aria-controls="" aria-selected="true">
                <li class="btn border radius-1 activ" id="latest2">Latest</li>
                    </a>
                <a class="nav-link" id="transfer-tab" onclick="myFunction(3)" data-toggle="tab" href="#transfer" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1" id="transfer3">Transfer</li></a>
                <a class="nav-link" id="video-tab" onclick="myFunction(4)" data-toggle="tab" href="#video" role="tab" aria-controls="" aria-selected="false"><li class="btn border radius-1 filter-days-active" id="video4">Video</li></a>
                <li class="btn border radius-1">Others</li>
            </ul>
            <!-- filter days -->
        </div>

        <!-- videos -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade p-3 active in" id="latest" aria-labelledby="latest-tab">
                <div class="team col-xs-12 ct">
                    <div class="mt-15">
                        @foreach ($latestnews as $key=>$news)
                        @if($key<=5)
                        <div class="post post-widget listing">
                            <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt="" style="max-width: 100%;height: auto;"></a>
                            <div class="post-body">
                                <p class="title-cat">{{$news['title']}}</p>
                                <h3 class="post-title">
                                    <a href="">
                                    {{$news['title']}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        @else
                        @break
                        @endif
                        @endforeach
                        <a class="btn btn-lg btn-dark w-100" id="load_more" style="color: white;">SHOW MORE</a>
                        <!-- <div class="clearfix"></div>
                        <div class="text-center" > <p id="load_more"> --- loading more contents --- </p></div> -->
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-3 in" id="hottest" aria-labelledby="hottest-tab">
                <div class="team col-xs-12 ct">
                    <div class="mt-15">
                        @foreach ($hottestnews as $key=>$news)
                        @if($key<=5)
                        <div class="post post-widget hottest_listing">
                            <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt="" style="max-width: 100%;height: auto;"></a>
                            <div class="post-body">
                                <p class="title-cat">{{$news['title']}}</p>
                                <h3 class="post-title">
                                    <a href="">
                                    {{$news['title']}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        @else
                        @break
                        @endif
                        @endforeach
                        <a class="btn btn-lg btn-dark w-100" id="hottest_load_more" style="color: white;">SHOW MORE</a>
                        <!-- <div class="clearfix"></div>
                        <div class="text-center" > <p id="hottest_load_more"> --- loading more contents --- </p></div> -->
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-3 active in" id="transfer" aria-labelledby="transfer-tab">
            <div class="team col-xs-12 ct">
                        <div class="mt-15">
                            @foreach ($transfernews as $key=>$news)
                            @if($key<=30)
                            <div class="post post-widget transfer_listing">
                                <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt="" style="max-width: 100%;height: auto;"></a>
                                <div class="post-body">
                                    <p class="title-cat">{{$news['title']}}</p>
                                    <h3 class="post-title">
                                        <a href="">
                                        {{$news['title']}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @else
                            @break
                            @endif
                            @endforeach
                            <a class="btn btn-lg btn-dark w-100" id="transfer_load_more" style="color: white;">SHOW MORE</a>
                            <!-- <div class="clearfix"></div>
                            <div class="text-center" > <p id="transfer_load_more"> --- loading more contents --- </p></div> -->
                        </div>

                    </div>
            </div>
            <div class="tab-pane fade p-3 in" id="video" aria-labelledby="video-tab">
                <div class="container-videos">
                    @foreach ($videos as $key=>$video)
                    @if ($key<=7)
                    <div class="video-box premium embed-responsive embed-responsive-16by9 video-listing">
                        <h3>{{$video['desc']}}</h3>
                        <div class="video-box-alert">
                            <img src="{{$video['image']}}" class="mb-1" alt="Icon" width="25" style="max-width: 25px;">
                            <p>Unlock this video <br> by subscribe Goaly Premium</p>
                            <a href="#" class="btn btn-pill btn-default">Subscribe</a>
                        </div>
                        <iframe width="560" height="315" src="{{$video['url']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @else
                    @break
                    @endif
                    @endforeach

                    <!-- <div class="video-box premium embed-responsive embed-responsive-16by9">
                        <h3>Ronaldo Incredible Goals</h3>
                        <div class="video-box-alert">
                            <img src="assets/img/icon-lock-premium-white.png" class="mb-1" alt="Icon" width="25" style="max-width: 25px;">
                            <p>Unlock this video <br> by subscribe Goaly Premium</p>
                            <a href="#" class="btn btn-pill btn-default">Subscribe</a>
                        </div>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OUKGsb8CpF8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> -->

                    <a class="btn btn-lg btn-dark w-100" id="video_load_more" style="color: white;">SHOW MORE</a>
                </div>
            </div>
        </div>


    </div>



</body>
</html>
