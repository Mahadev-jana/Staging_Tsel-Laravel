@include('partials.header_portal')
</head>

<body>
    <div>
        @include('partials.topmenubar2_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content container-fluid">
            <!-- league-cover -->
            <input type="hidden" name="league_id" value="{{$league_id}}">
            <input type="hidden" name="season_id" value="{{isset($details['id'])?$details['id']:''}}">
            <input type="hidden" name="comp_id" value="{{isset($details['competition_id'])?$details['competition_id']:''}}">
            @if (isset($details))


            <div class="league-cover">
                <div class="inner-league-cover">
                    <div class="logo">
                       {{-- <img src="{{ asset('assets/img/ic-epl.png') }}" alt=""> --}}
                        @php
                            $img = isset($details['old_logo'])?$details['old_logo']:'';
                            $logo = "http://api.goaly.mobi/assets/uploads/leagues/".$img;
                        @endphp
                        <img src="{{isset($logo)?$logo:''}}" alt="">
                    </div>
                    <h4 class="name">{{isset($details['competition_name'])?$details['competition_name']:''}}</h4>
                    <span>Season {{isset($details['name'])?$details['name']:''}}</span>
                    <!-- <span>Round 37/38</span> -->
                </div>
            </div>
            @endif
            <!-- league menu -->

            <ul class="league-menu bg-purple">
                <li class="nav-item active">
                    <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">Match</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Standings</a>
                </li>
                <li><a href="#">Rank</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Team</a></li>
            </ul>
            <!-- tabs content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
                    <div class="tab-content">
                        <!-- league highlight -->

                            <div class="league-highlight block bg-grey">
                                <h5>Season {{isset($details['name'])?$details['name']:''}}</h5>
                                <ul>
                                    <li>
                                        <span id="Matched_played"></span>
                                        <span>Matches Played</span>
                                    </li>
                                    <li>
                                        <span id="Goal"></span>
                                        <span>Goal</span>
                                    </li>
                                    <li>
                                        <span id="Yellow"></span>
                                        <span>Yellow Card</span>
                                    </li>
                                    <li>
                                        <span id="Red"></span>
                                        <span>Red Card</span>
                                    </li>
                                    <li>
                                        <span id="Assists"></span>
                                        <span>Assists</span>
                                    </li>
                                </ul>
                            </div>


                        <!-- league top player -->
                        <div class="league-top-player">
                            <div class="tag bg-dark d-flex text-white">
                                <span class="mr-auto">Top Player</span>
                                <span>Season {{isset($details['name'])?$details['name']:''}}</span>
                            </div>
                            <div class="p-2 bg-white">
                                <ul id="PlayerDetails">

                                </ul>
                            </div>
                        </div>


                        <!-- league matches -->
                        <div class="tag bg-purple d-flex text-white">
                            <span class="mr-auto">Last Game</span>
                            <span class="bg-whitepurple">More</span>
                        </div>
                        <div class="container-matches">
                            <div class="matches">
                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                        <h5 class="mb-0">Chelsea</h5>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>2</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>1</span>
                                        </div>
                                        <span class="my-1">07/07/2020 03:00</span>
                                        <span class="btn-pill bg-red">Finished</span>
                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                        <h5 class="mb-0">Manchester</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="matches">
                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                        <h5 class="mb-0">Chelsea</h5>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>0</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>1</span>
                                        </div>
                                        <span class="my-1">07/07/2020 03:00</span>
                                        <span class="btn-pill bg-red">Finished</span>
                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                        <h5 class="mb-0">Manchester</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tag bg-purple d-flex text-white">
                            <span class="mr-auto">Next Game</span>
                            <span class="bg-whitepurple">More</span>
                        </div>
                        <div class="container-matches">
                            <div class="matches">
                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                        <h5 class="mb-0">Chelsea</h5>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>--</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>--</span>
                                        </div>
                                        <span class="my-1">07/07/2020 03:00</span>
                                        <!-- <span class="btn-pill bg-red">Finished</span> -->
                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                        <h5 class="mb-0">Manchester</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="matches">
                                <div class="d-flex j-center">
                                    <div class="club-left mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                        <h5 class="mb-0">Chelsea</h5>
                                    </div>
                                    <div class="mid mx-2 d-flex flex-column my-auto">
                                        <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                            <span>--</span>
                                            <span class="mx-2 border-right"></span>
                                            <span>--</span>
                                        </div>
                                        <span class="my-1">07/07/2020 03:00</span>
                                        <!-- <span class="btn-pill bg-red">Finished</span> -->
                                    </div>
                                    <div class="club-right mx-1 text-center">
                                        <div class="logo"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                        <h5 class="mb-0">Manchester</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
                    <div class="tab-content">

                        <div class="block bg-grey">
                            <div class="dropdown">

                                <select id="round" name="round" class="btn btn-lg btn-white w-100 d-flex ais-center">

                                </select>
                                {{-- <ul class="dropdown-menu w-100">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <!-- league matches -->
                        <div class="tag"><u><b>Tuesday, 21 Jul 2020</b></u></div>
                        <div class="container-matches" id="match">

                        </div>


                    </div>
                </div>
                <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
                    <!-- tabs content -->
                    <div class="tab-content" id="standings">


                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('partials.footernew')
    <script src="{{ asset('assets/js/leagueDetails.js') }}"></script>

<script type="text/javascript">
var base_url = window.location.origin;
var league_id= document.getElementsByName('league_id')[0].value;
$(document).ready(function() {
// console.log(league_id);
// $.ajax({
//         url:base_url+'/LeagueRound/'+league_id,
//         method:'GET',
//         success: function(responseData){
//             $.each(responseData, function(index,response){
//                         $("#round").append('<option value="'+response.round_id+'">Game Week '+response.round_name+'</option>');
//                 });
//             console.log(responseData);
//         }

// });
})

</script>
</body>
</html>
