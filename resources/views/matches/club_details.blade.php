@include('partials.header_portal')

</head>


<body>

    <div>
        @include('partials.topmenubar2_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')

        <div id="skloader_club"> @include('club.skloader_club')</div>
        <div class="page-content" id="club_body_content" style="display:none;">

            <!-- league-cover -->
            <div class="club-cover">
                <div class="club-cover-mask">
                    <div class="inner-club-cover">
                        <div class="club-logo" id="venueLogo_path"></div>
                        <div class="line bg-purple text-white">
                            <div class="box">
                                <h5>Venue :</h5>
                                <span id="venueName"></span>
                            </div>
                            <div class="box">
                                <h5>City :</h5>
                                <span id="city"></span>
                            </div>
                        </div>
                        <div class="line bg-white">
                            <div class="box">
                                <h5>League :</h5>
                                <span id="league"></span>
                            </div>
                            <div class="box">
                                <h5>Country :</h5>
                                <span id="country"></span>
                            </div>
                        </div>
                        <button class="btn btn-lg">Follow</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="TeamId" value="{{$team_id}}">
            <!-- league menu -->
            <ul class="club-menu bg-purple" id="team_details" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">Match</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Player</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">Standings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false" aria-expanded="false">Stats</a>
                </li>
            <!-- <ul class="club-menu bg-purple"> -->
                <!-- <li class="active"><a href="17.html">Info</a></li>
                <li><a href="18.html">Match</a></li>
                <li><a href="19.html">Player</a></li> -->
                <!-- <li><a href="#">Standings</a></li> -->
            </ul>

            <!-- tabs content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
                    <div class="tab-content">
                        <!-- club highlight -->
                        <div class="club-highlight block bg-grey">
                            <h5 id="season"></h5>
                            <ul>
                                <li>
                                    <div class="cover-img" id="goals-scorerer-img"></div>
                                    <h5 class="my-1" id="goals-scorerer-name"></h5>
                                    <span><strong>Top Goal Scorers</strong></span><br>
                                    <span class="btn-pill">
                                        Goals <br> <b id="goals"></b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img" id="yellowcards-scorerer-img"></div>
                                    <h5 class="my-1" id="yellowcards-scorerer-name"></h5>
                                    <span><strong>Top Yellowcards</strong></span><br>
                                    <span class="btn-pill">
                                        Yellowcards <br> <b id="yellowcards"></b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img" id="redcards-scorerer-img"></div>
                                    <h5 class="my-1" id="redcards-scorerer-name"></h5>
                                    <span><strong>Top Redcards</strong></span><br>
                                    <span class="btn-pill">
                                        Redcards <br> <b id="redcards"></b>
                                    </span>
                                </li>
                                <li>
                                    <div class="cover-img" id="assists-scorerer-img"></div>
                                    <h5 class="my-1" id="assists-scorerer-name"></h5>
                                    <span><strong>Top Assist</strong></span>
                                    <span class="btn-pill"><br>
                                        Assist <br> <b id="assists"></b>
                                    </span>
                                </li>
                            </ul>
                        </div>

                    <!-- club matches -->
                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto">Next Game</span>
                        <span class="bg-whitepurple" id="load_more">More</span>
                    </div>
                    <div class="container-matches" id="futureMatches">
                        {{-- @if (isset($futureMatches))
                        @foreach ($futureMatches as $futureMatche)

                            <div class="matches listing">

                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <a href="{{route('team',[$futureMatche['homeTeam_id']])}}">
                                        <div class="logo"><img src="{{isset($futureMatche['homeTeam_logo'])?$futureMatche['homeTeam_logo']: ''}}" alt=""></div>
                                        <h5 class="mb-0">{{isset($futureMatche['homeTeam_name'])?$futureMatche['homeTeam_name']: ''}}</h5></a>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>{{isset($futureMatche['homeTeam_score'])?$futureMatche['homeTeam_score']: ''}}</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>{{isset($futureMatche['awayTeam_score'])?$futureMatche['awayTeam_score']: ''}}</span>
                                        </div>
                                        <span class="my-1">{{isset($date_time )?$date_time : ''}}</span>
                                        <a href="{{route('matchDetails',[$futureMatche['match_id']])}}">
                                            <span class="btn-pill" id="matche_status_id" style="padding: 1px 27px;border-radius: 15px;color: white;">Coming Soon</span>
                                        </a>

                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <a href="{{route('team',[$futureMatche['awayTeam_id']])}}">
                                        <div class="logo"><img src="{{isset($futureMatche['awayTeam_logo'])?$futureMatche['awayTeam_logo']: ''}}" alt=""></div>
                                        <h5 class="mb-0">{{isset($futureMatche['awayTeam_name'])?$futureMatche['awayTeam_name']: ''}}</h5></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif --}}
                    </div>
                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto">Previous Game</span>
                        <span class="bg-whitepurple" id="previouslisting_more">More</span>
                    </div>
                    <div class="container-matches" id="pastMatches">
                        {{-- @if (isset($pastMatches))
                        @foreach ($pastMatches as $pastMatche)
                        @php
                           $ip = file_get_contents("http://ipecho.net/plain");
                            $url = 'http://ip-api.com/json/'.$ip;
                            $tz = file_get_contents($url);
                            $time_zone = json_decode($tz,true)['timezone'];
                            $dt = new \DateTime(isset($pastMatche['date_time'])?$pastMatche['date_time']: "0000/00/00");
                            $tz = new \DateTimeZone($time_zone);
                            $set_tz= $dt->setTimezone($tz);
                            $date_time = $dt->format('Y-m-d H:i');
                            $today = new DateTime("now");
                        @endphp
                            <div class="matches previouslisting">
                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <a href="{{route('team',[$pastMatche['homeTeam_id']])}}">
                                        <div class="logo"><img src="{{isset($pastMatche['homeTeam_logo'])?$pastMatche['homeTeam_logo']: ''}}" alt=""></div>
                                        <h5 class="mb-0">{{isset($pastMatche['homeTeam_name'])?$pastMatche['homeTeam_name']: ''}}</h5></a>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>{{isset($pastMatche['homeTeam_score'])?$pastMatche['homeTeam_score']: ''}}</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>{{isset($pastMatche['awayTeam_score'])?$pastMatche['awayTeam_score']: ''}}</span>
                                        </div>
                                        <span class="my-1">{{isset($date_time)?$date_time: ''}}</span>
                                        <a href="{{route('matchDetails',[$pastMatche['match_id']])}}">
                                            <span class="btn-pill bg-red" style="padding: 1px 27px;
                                            border-radius: 15px;color: white;">Finished</span>
                                        </a>

                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <a href="{{route('team',[$pastMatche['awayTeam_id']])}}">
                                        <div class="logo"><img src="{{isset($pastMatche['awayTeam_logo'])?$pastMatche['awayTeam_logo']: ''}}" alt=""></div>
                                        <h5 class="mb-0">{{isset($pastMatche['awayTeam_name'])?$pastMatche['awayTeam_name']: ''}}</h5></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif --}}
                    </div>

                        <!-- competion history -->
                        <div class="tag bg-green d-flex text-white">
                            <span class="mx-auto">Thropy</span>
                        </div>
                        <div class="competion-hstr">
                            <ul>
                                <li>
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/img/league/Image 22@3x.png') }}" alt="">
                                    </div>
                                    <h3><strong>7</strong></h3>
                                    <span>Bundesliga</span>
                                </li>
                                <li>
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/img/league/Image 23@3x.png') }}" alt="">
                                    </div>
                                    <h3><strong>10</strong></h3>
                                    <span>Ligue 1</span>
                                </li>
                                <li>
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/img/league/Image 24@3x.png') }}" alt="">
                                    </div>
                                    <h3><strong>12</strong></h3>
                                    <span>La Liga</span>
                                </li>
                                <li>
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/img/league/Image 25@3x.png') }}" alt="">
                                    </div>
                                    <h3><strong>2</strong></h3>
                                    <span>Copa Del Rey</span>
                                </li>
                                <li>
                                    <div class="cover-img">
                                        <img src="{{ asset('assets/img/league/Image 26@3x.png') }}" alt="">
                                    </div>
                                    <h3><strong>8</strong></h3>
                                    <span>Champions League</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
                    <div class="tab-content">



                        <!-- league matches -->
                        <div class="tag"><u><b></b></u></div>
                        <div class="container-matches" id="matches">

                        </div>

                    </div>
                </div>
                <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
                  <div class="tab-content">
                    <div class="standings table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <td>No.</td>
                                    <td>Midfilders</td>
                                    <td>Played</td>
                                    <td>Save</td>
                                    <td>Concade</td>
                                    <td>Yellow</td>
                                    <td>Red</td>
                                </tr>
                            </thead>
                            <tbody id="Midfilders">

                            </tbody>
                        </table>
                    </div>
                    <div class="standings table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <td>No.</td>
                                    <td>Goal Keepers</td>
                                    <td>Played</td>
                                    <td>Save</td>
                                    <td>Concade</td>
                                    <td>Yellow</td>
                                    <td>Red</td>
                                </tr>
                            </thead>
                            <tbody id="GoalKeepers">

                            </tbody>
                        </table>
                    </div>
                    <div class="standings table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <td>No.</td>
                                    <td>Defenders</td>
                                    <td>Played</td>
                                    <td>Save</td>
                                    <td>Concade</td>
                                    <td>Yellow</td>
                                    <td>Red</td>
                                </tr>
                            </thead>
                            <tbody id="Defender">

                            </tbody>
                        </table>
                    </div>
                    <div class="standings table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <td>No.</td>
                                    <td>Attackers</td>
                                    <td>Played</td>
                                    <td>Save</td>
                                    <td>Concade</td>
                                    <td>Yellow</td>
                                    <td>Red</td>
                                </tr>
                            </thead>
                            <tbody id="Attackers">

                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
                <div class="tab-pane fade p-3" id="four" aria-labelledby="four-tab">
                     <!-- tabs content -->
                    <div class="tab-content">

                        <div class="block bg-grey">
                            <div class="dropdown">
                                <button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown">
                                <span class="text-grey">Game Week 38</span>
                                <span class="caret ml-auto"></span>
                                </button>
                                <ul class="dropdown-menu w-100">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="standings table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <td colspan="2">Team</td>
                                        <td>Pts</td>
                                        <td>P</td>
                                        <td>W</td>
                                        <td>D</td>
                                        <td>L</td>
                                        <td>F</td>
                                        <td>A</td>
                                        <td>GD</td>
                                    </tr>
                                </thead>
                                <tbody id="standing">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade p-3" id="stats" aria-labelledby="stats-tab">
                    <div class="tab-content premium">
                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-writing"></span> Record</td>
                                        <td>Home</td>
                                        <td>Away</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody id="Record">

                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-ball"></span> Goal & No Goal</td>
                                        <td>Home</td>
                                        <td>Away</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody id="Goals">

                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-average"></span> Average Goals</td>
                                        <td>Home</td>
                                        <td>Away</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody id="Average">

                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-time-left"></span> Scoring Minutes</td>
                                        <td class="text-right">Count</td>
                                    </tr>
                                </thead>
                                <tbody id="Scoring">


                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-time-left"></span> Goals Conceded Minutes</td>
                                        <td class="text-right">Count</td>
                                    </tr>
                                </thead>
                                <tbody id="Conceded">

                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-play"></span> Game Play</td>
                                        <td class="text-right">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Attacks</td>
                                        <td class="text-right" id="attacks"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Dangerous Attacks</td>
                                        <td class="text-right" id="dangerous_attacks"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg Ball Possession Percentage</td>
                                        <td class="text-right" id="avg_ball_possession_percentage"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Shot Blocked</td>
                                        <td class="text-right" id="shots_blocked"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left" >Shot of Target</td>
                                        <td class="text-right"id="shots_off_target"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg. Shots off Target per Game</td>
                                        <td class="text-right" id="avg_shots_off_target_per_game"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Shot on Target</td>
                                        <td class="text-right" id="shots_on_target"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg. Shots on Target per Game</td>
                                        <td class="text-right" id="avg_shots_on_target_per_game"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg. Corners</td>
                                        <td class="text-right" id="avg_corners"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Total Corners</td>
                                        <td class="text-right" id="total_corners"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">BTTS</td>
                                        <td class="text-right" id="btts"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg. Player Ratings</td>
                                        <td class="text-right" id="avg_player_rating"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Avg. Player Ratings per Match</td>
                                        <td class="text-right" id="avg_player_rating_per_match"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Tackles</td>
                                        <td class="text-right" id="tackles"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="club-stats table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-black">
                                        <td class="text-left club-stats-title"><span class="icon icon-flag"></span> Dicipline</td>
                                        <td class="text-right">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">Red Cards</td>
                                        <td class="text-right" id="redcards-stats"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Yellow Cards</td>
                                        <td class="text-right" id="yellowcards-stats"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Fouls</td>
                                        <td class="text-right" id="fouls"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Offsides</td>
                                        <td class="text-right" id="offsides"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="premium-alert">
                        <img src="{{ asset('assets/img/icon-lock-premium.png') }}" class="img-responsive mb-2" style="margin-left: auto; margin-right: auto;" width="30" alt="Lock">
                        <h3>This Is a Part of Goaly Premium</h3>
                        <p class="mb-1">Get full access to all feature by subscribe Goaly</p>
                        <a href="#" class="btn btn-lg btn-block btn-default my-1 bg-green text-white btn-subscribe">Subscribe</a>
                        <p>Already Subsribed? <a class="text-purple" href="#">Login</a></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="{{ asset('assets/js/teamDetails.js') }}"></script>
    <script>
        // var base_url = window.location.origin;

        // $(document).ready(function(){
        //     var TeamId=document.getElementsByName('TeamId')[0].value;

        // });

    </script>
    @include('partials.footernew')
</body>
</html>
