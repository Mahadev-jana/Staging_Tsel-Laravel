@include('partials.header_portal')
<link href="/assets/css/lineup.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>


</head>

<body>

    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">
        <!-- header -->
        {{-- <img src="{{ asset('assets/img/header.png') }}" width="100%" alt=""> --}}

        <div id="sk_loader_match_details" style="display:inline">@include('matches.sk_loader_match_details')</div>



        <!-- content -->
        <div class="detail-match" id="match_details_body" style="display:none">


            <div class="detail-match-header">
                <h4>DISPLAY</h4>
                <div class="row row-no-gutters sec-1">
                    <div class="col-xs-4 club">
                        <a href="{{route('team',[$details['homeTeam']['id']])}}"><img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="" ></a>
                        <p>{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}}</p>
                    </div>
                    <div class="col-xs-4">
                        <div class="score-board">

                            <div class="date">
                           {{$details['date_time']}}
                            </div>
                            <div class="score">{{(isset($details['homeTeam_score']) ? $details['homeTeam_score']: '')}} : {{(isset($details['awayTeam_score']) ? $details['awayTeam_score']: '')}}</div>
                        </div>
                    </div>
                    <div class="col-xs-4 club">
                    <a href="{{route('team',[$details['awayTeam']['id']])}}"><img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt=""></a>
                        <p>{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}}</p>
                    </div>
                </div>
                <div class="sec-3">
                    <div class="card">
                        <!-- goal -->
                        <div class="row row-no-gutters d-flex ais-stretch">
                            <div class="col-xs-5 d-flex ais-center j-start">
                                <table>
                                    @if(isset($details['goals']))
                                    @foreach ($details['goals'] as $value )
                                    @if($details['homeTeam']['id']==$value['team_id'])
                                    <tr><td>{{$value['player_name']}}</td><td class="pl-3">({{$value['minute']}})</td></tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                            <div class="col-xs-2 d-flex ais-center j-center">
                                <img src="/assets/img/detail-match/goal.png" alt="">
                            </div>
                            <div class="col-xs-5 d-flex ais-center j-center">
                                <table>
                                @if(isset($details['goals']))
                                    @foreach ($details['goals'] as $value )
                                    @if($details['awayTeam']['id']==$value['team_id'])
                                    <tr><td>{{$value['player_name']}}</td><td class="pl-3">({{$value['minute']}})</td></tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-no-gutters sec-2">
                    <div class="col-xs-6 stadium">
                        Stadium: <br> {{(isset($details['venue']['name']) ? $details['venue']['name']: '')}}
                    </div>
                    <div class="col-xs-6 referee">
                        Referee: <br> {{(isset($details['referee']['fullname']) ? $details['referee']['fullname']: '')}}
                    </div>
                </div>
            </div>
            <input type="hidden" name="match_id" value="{{$details['match_id']}}">
            <input type="hidden" name="homeTeamId" value="{{$details['homeTeam']['id']}}">
            <input type="hidden" name="awayTeamId" value="{{$details['awayTeam']['id']}}">
            <div class="match-detail-body">
                <div class="menu menu-details" >
                    <ul class="nav nav-pills">
                        <li class="activ1e"> <a class="nav-link" id="timeline-tab"  data-toggle="tab" href="#timeline" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/timeline2.png') }}"></a></li>
                        <li><a class="nav-link" id="players-tab"  data-toggle="tab" href="#players" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/players.png') }}">Players</a></li>
                        <li><a class="nav-link" id="lineups-tab"  data-toggle="tab" href="#lineups" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/lineups.png') }}">Lineups</a></li>
                        <li><a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/stats.png') }}">Stats</a></li>
                        <li><a class="nav-link" id="head2head-tab"  data-toggle="tab" href="#head2head" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/head2head.png') }}">Head to Head</a></li>
                        <li><a class="nav-link" id="prediction-tab" data-toggle="tab" href="#prediction" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/prediction.png') }}">Prediction</a></li>
                        <li><a class="nav-link" id="live-chat-tab" data-toggle="tab" href="#live-chat" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/live-chat.png') }}">Live Chat</a></li>
                        <li><a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/news.png') }}">News</a></li>
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="tab-pane fade p-3 active in" id="timeline" aria-labelledby="timeline-tab">

<div id="sk_loader_match_details_timeline" >@include('matches.sk_loader_timeline')</div>

                    </div>
                    <div class="tab-pane fade p-3 in" id="players" aria-labelledby="players-tab">

                         <div id="sk_loader_match_details_player" >@include('matches.sk_loader_player')</div>
                        <div class="block" id="player_info" style="display:none">

                            <div class="player-states"><div class="pull-left"><strong>Passes</strong></div><div class="pull-right">Successfull/Total</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_passes">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong>Passing Accuracy (Final Third)</strong></div><div class="pull-right">&nbsp;</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_passingAccuracy">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong>Crosses</strong></div><div class="pull-right">Successfull/Total</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_crosses">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong>Shots</strong></div><div class="pull-right">Goal / On Target / Total</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_shots">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong>Chances Created</strong></div><div class="pull-right">Assists / Chances</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_changesCreated">

                            </tbody></table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3 in" id="lineups" aria-labelledby="lineups-tab">

                    {{--Line-ups --}}
                        <div class="field" data-type="lineup-field">
                            <div class="home-info" data-type="home-info">
                                <div class="name" data-type="team">
                                    <img src="{{isset($details['homeTeam']['logo_path'])?$details['homeTeam']['logo_path']:''}}" height="24" alt=""/> &nbsp;{{isset($details['homeTeam']['name'])?$details['homeTeam']['name']:''}}
                                </div>
                                <div class="formation" data-type="formation">4-3-3</div>
                            </div>
                            <div class="field-wrap">
                                <div class="corners">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="middle"></div>
                                <div class="circle"></div>
                                <div class="center"></div>
                                <div class="goal-box">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="goal-box goal-box-right">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="home" data-type="home-players">

                                @if(isset($lineups))
                                @foreach ($lineups as $lineup)
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">

                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">
                                                        <i class="far fa-futbol goal"></i>
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>
                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                        <span class="evt evt2" data-type="player-bubble">
                                                            <div class="yellow-card"></div>
                                                        </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">{{isset($lineup['player_name'])?$lineup['player_name']:''}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span>{{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}

                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                    @if(isset($lineup['stats']['goals']))
                                                    @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                    <!-- <span class="evt evt4" data-type="player-bubble">
                                                        <i class='fas fa-arrow-down text-red'></i>
                                                    </span> -->
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">{{isset($lineup['player_name'])?$lineup['player_name']:''}}</div>
                                        </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                <!-- <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span> -->
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                    <span class="evt evt1" data-type="player-bubble">

                                                        <i class="far fa-futbol goal"></i>
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                    </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                    <li data-type="player-item">
                                        <div class="player" data-type="player-data">
                                            <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                            @if(isset($lineup['stats']['goals']))
                                            @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="name" data-type="player-name">
                                            <span class="hidden-xxs"></span>
                                            <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                        </div>
                                    </li>
                                    @endif
                                    @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                    @if(isset($lineup['stats']['goals']))
                                                    @if($lineup['stats']['goals']['scored']>0)
                                                    <span class="evt evt1" data-type="player-bubble">

                                                        <i class="far fa-futbol goal"></i>
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                    </span>
                                                    @endif
                                                    @if($lineup['stats']['cards']['yellowcards']>0)
                                                        <span class="evt evt2" data-type="player-bubble">
                                                            <div class="yellow-card"></div>
                                                        </span>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                @endforeach
                                @endif
                                </div>
                                <div class="away" data-type="away-players">

                                @foreach ($awaylineups as $lineup)
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                    <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <i class="far fa-futbol goal"></i>
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                            @endif
                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                        <span class="evt evt4" data-type="player-bubble">
                                                            <i class='fas fa-arrow-down text-red'></i>
                                                        </span>

                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                                </ul>
                                        </div>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                        {{-- <span class="evt evt2" data-type="player-bubble">
                                                            <div class="red-card"></div>
                                                        </span> --}}
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                    @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">

                                            <ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['number'])?$lineup['number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif

                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                            <div class="away-info" data-type="away-info">
                                <div class="name" data-type="team">
                                    <img src="{{$details['awayTeam']['logo_path']}}" height="24" alt=""/>
                                    &nbsp;{{$details['awayTeam']['name']}}
                                </div>
                                <div class="formation" data-type="formation">4-4-2</div>
                            </div>
                        </div>
                    {{-- end Line-ups--}}
                    </div>
                    <div class="tab-pane fade p-3 in" id="stats" aria-labelledby="stats-tab">
                    <!-- <div role="tabpanel" class="tab-pane" id="stats"> -->

                        <div class="block">
                            <div class="row min-gutter">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="#" class="btn btn-block btn-cta-premium active">Basic Stats</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="{{route('advancestats')}}" class="btn btn-block btn-cta-premium"><span class="icon icon-external-link"></span> Advance Stats</a>
                                </div>
                            </div>
                        </div>
                        <div class="stats-header">
                            <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="">
                            <h4>TEAM STATS</h4>
                            <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="">
                        </div>
                        <div class="stats-body">
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['shots']['total']))
                                <div class="point-left" style="width: {{isset($Shot)?$Shot:''}}%;">{{isset($details['stats'][0]['shots']['total'])?$details['stats'][0]['shots']['total']:''}}</div>
                                <div class="point-name">Shots</div>
                                <div class="point-right" style="width: {{isset($Shots)?$Shots:''}}%;">{{isset($details['stats'][1]['shots']['total'])?$details['stats'][1]['shots']['total']:''}}</div>
                            @endif

                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['shots']['ongoal']))

                                <div class="point-left" style="width: {{isset($ShotOnTarget)?$ShotOnTarget:''}}%;">{{isset($details['stats'][0]['shots']['ongoal'])?$details['stats'][0]['shots']['ongoal']:""}}</div>
                                <div class="point-name">Shot On Target</div>
                                <div class="point-right" style="width:  {{isset($ShotOnTargets)?$ShotOnTargets:''}}%;">{{isset($details['stats'][1]['shots']['ongoal'])?$details['stats'][1]['shots']['ongoal']:''}}</div>

                             @endif
                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['possessiontime']))

                            <div class="point-left" style="width: {{isset($Possession)?$Possession:''}}%;">{{isset($details['stats'][0]['possessiontime'])?$details['stats'][0]['possessiontime']:""}}</div>
                            <div class="point-name">Possession</div>
                            <div class="point-right" style="width:  {{isset($Possessions)?$Possessions:''}}%;">{{isset($details['stats'][1]['possessiontime'])?$details['stats'][1]['possessiontime']:''}}</div>

                             @endif
                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['passes']['total']))

                            <div class="point-left" style="width: {{isset($Passe)?$Passe:''}}%;">{{isset($details['stats'][0]['passes']['total'])?$details['stats'][0]['passes']['total']:""}}</div>
                            <div class="point-name">Passes</div>
                            <div class="point-right" style="width:  {{isset($Passes)?$Passes:''}}%;">{{isset($details['stats'][1]['passes']['total'])?$details['stats'][1]['passes']['total']:''}}</div>

                             @endif
                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['passes']['accurate']))

                             <div class="point-left" style="width: {{isset($PassAccuracy)?$PassAccuracy:''}}%;">{{isset($details['stats'][0]['passes']['accurate'])?$details['stats'][0]['passes']['accurate']:""}}</div>
                             <div class="point-name">Pass accuracy</div>
                             <div class="point-right" style="width:  {{isset($PassAccuracys)?$PassAccuracys:''}}%;">{{isset($details['stats'][1]['passes']['accurate'])?$details['stats'][1]['passes']['accurate']:''}}</div>
                             @endif
                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['fouls']))

                             <div class="point-left" style="width: {{isset($Foul)?$Foul:''}}%;">{{isset($details['stats'][0]['fouls'])?$details['stats'][0]['fouls']:""}}</div>
                             <div class="point-name">Fouls</div>
                             <div class="point-right" style="width:  {{isset($Fouls)?$Fouls:''}}%;">{{isset($details['stats'][1]['fouls'])?$details['stats'][1]['fouls']:''}}</div>

                             @endif
                            </div>
                           <div class="stats-item">
                            @if(isset($details['stats'][0]['corners']))

                             <div class="point-left" style="width: {{isset($Corner)?$Corner:''}}%;">{{isset($details['stats'][0]['corners'])?$details['stats'][0]['corners']:""}}</div>
                             <div class="point-name">Corners</div>
                             <div class="point-right" style="width:  {{isset($Corners)?$Corners:''}}%;">{{isset($details['stats'][1]['corners'])?$details['stats'][1]['corners']:''}}</div>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3 in" id="head2head" aria-labelledby="head2head-tab">
                        <h3>Head to Head</h3>
                        <table class="table table-striped mb-10 text-small">
                            <tbody><tr>
                                <td width="" class="text-left">
                                    <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" height="50" alt="">
                                </td>
                                <td width="" class="text-center bdr1"> <span class="ctr" id="wins"></span>Wins</td>
                                <td width="" class="text-center bdr1"><span class="ctr" id="draw"></span>Draw</td>
                                <td width="" class="text-center"><span class="ctr" id="loss"></span>Wins</td>
                                <td width="" class="text-right"><img src="{{(isset($details['homeTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" height="50" alt="">
                                </td>
                            </tr></tbody>
                        </table>
                        <div class="progress-bar-sm progress-bar-animated-alt progress"><div class="progress-bar bg-win" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 81.8182%;"></div><div class="progress-bar bg-lose" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 18.1818%;"></div></div>

                        <table class="table table-striped custab mb-10">
                            <tbody id="matchHead">

                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade p-3 in" id="prediction" aria-labelledby="prediction-tab">
                        <div class="lm prediction_list" style="padding: 10px; height: auto;">
                        <div class="widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="text-muted opacity-6">Nantes</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="text-muted opacity-6">Draw</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="text-muted opacity-6">Lorient</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-numbers fsize-3 text-win">{{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="widget-numbers fsize-3 text-muted">{{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers fsize-3 text-lose">{{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}% </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper mt-1">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-win" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%;"></div>
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%;"></div>
                                        <div class="progress-bar bg-lose" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}%;"></div>
                                    </div>
                                </div>
                            </div>
                            <h4>Data</h4>
                            <div class="liner"></div>
                            <div style="border: none;">
                                <div>
                                    <div aria-expanded="true" style="padding: 0px;">
                                    <h4 class="title-pred" data-toggle="collapse" data-target="#pred1">Predictions<i class="fa fa-arrow-circle-down pull-right"></i></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                            <div class="">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                        <div class="text-muted opacity-6">Both Team To Score</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="text-muted opacity-6"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">No Score</div>
                                        </div>
                                    </div>
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="widget-numbers fsize-3 text-muted"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%;"></div>
                                            <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 pd-0 mt-10">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6">Score Probability</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6" id="load_more"><strong>MORE</strong> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped custab mb-10">
                                        <tbody>
                                        @if (isset($details['probability']['predictions']['correct_score']))
                                        @foreach ($details['probability']['predictions']['correct_score'] as $key => $score )

                                        <tr class="listing">
                                            <td width="60%" class="text-spec">
                                                <div class="col-xs-6 pd-0">
                                                    <p class="">
                                                        <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">Colorado Rapids</strong>
                                                    </p>
                                                    <p class="">
                                                        <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">Los Angeles FC</strong>
                                                    </p>
                                                </div>
                                                <div class="col-xs-1">
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[0] :'-'}}</p>
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[1]: '-'}}</p>
                                                </div>
                                            </td>
                                            <td width="" class="text-center">
                                                <div class="widget-content">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers text-win">{{(isset($score) ? $score: '-')}}</div>
                                                        </div>
                                                        <div class="widget-content-middle">
                                                            <div class="widget-numbers text-muted"></div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers text-lose">{{(isset($score) ?(100- $score): '-')}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-bar-sm progress-bar-animated-alt progress mb-0">
                                                    <div class="progress-bar bg-win" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ? $score: '-')}}%;"></div>
                                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ?(100- $score): '-')}}%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6">Under 2 Goals</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">Over 3 Goals</div>
                                            </div>
                                        </div>
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="widget-numbers fsize-3 text-muted"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}% </div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%;"></div>
                                                <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" ">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">3 or Less Goals</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">4 or More Goals</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> No Score</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> Score At Least 1 </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br>No Score</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br>Score At Least 1 </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: ''}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: ''}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    {{-- <div class="tab-pane fade p-3 in" id="live-chat" aria-labelledby="live-chat-tab"> --}}
                    {{-- <h1>live-chat 3</h1> --}}

                    <!-- <li class="left clearfix" style="margin-bottom: 2px;"><span class="chat-img pull-left"><img src="http://smartcms.goaly.mobi/assets/uploads/profiles/user_no_image.png" alt="User Avatar" class="img-circle" style="height: 40px; width: 40px; padding: 10px;"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font"> </strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>19h 13m ago</small></div><p id="sms"></p></div></li> -->

                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm form-chat" placeholder="Type your message here..." value="">
                    <input id="btn-match-id" type="hidden"  value="{{$details['id']}}"> --}}
                        {{-- <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                        </span> --}}
                    {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('partials.footernew')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/matchDetails.js') }}"></script>

<script type="text/javascript">
// var base_url = window.location.origin;
// var match_id= document.getElementsByName('match_id')[0].value;
// $(document).ready(function() {

// })

</script>

<script type="text/javascript">

        $(document).ready(function() {


       $('#sk_loader_match_details').hide();
        $('#match_details_body').show();

    });
    </script>
</html>
