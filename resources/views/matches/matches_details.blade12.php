@include('partials.headernew')
<link href="/assets/css/lineup.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <img src="{{ asset('assets/img/header.png') }}" width="100%" alt="">

        <!-- content -->
        <div class="detail-match">
            <div class="detail-match-header">
                <h4>DISPLAY</h4>
                <div class="row row-no-gutters sec-1">
                    <div class="col-xs-4 club">
                        <img src="{{ asset('assets/img/trans-mu.png') }}" alt="">
                        <p>Manchester United</p>
                    </div>
                    <div class="col-xs-4">
                        <div class="score-board">
                            <div class="date">
                                28/11/2020
                                <br>
                                00:55
                            </div>
                            <div class="score">2 : 0</div>
                        </div>
                    </div>
                    <div class="col-xs-4 club">
                        <img src="{{ asset('assets/img/trans-chelsea.png') }}" alt="">
                        <p>Chelsea</p>
                    </div>
                </div>
                <div class="sec-3">
                    <div class="card">
                        <!-- goal -->
                        <div class="row row-no-gutters d-flex ais-stretch">
                            <div class="col-xs-5 d-flex ais-center j-start">
                                <table>
                                    <tr><td>Marquinhos</td><td class="pl-3">(4:20)</td></tr>
                                    <tr><td>Cavani</td><td class="pl-3">(10:02)</td></tr>
                                </table>
                            </div>
                            <div class="col-xs-2 d-flex ais-center j-center">
                                <img src="{{ asset('assets/img/detail-match/goal.png') }}" alt="">
                            </div>
                            <div class="col-xs-5 d-flex ais-center j-center">
                                <table>
                                    <tr><td>Marquinhos</td><td class="pl-3">(4:20)</td></tr>
                                    <tr><td>Cavani</td><td class="pl-3">(10:02)</td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-no-gutters sec-2">
                    <div class="col-xs-6 stadium">
                        Stadium: <br> ESTADIO DE MESTALLA
                    </div>
                    <div class="col-xs-6 referee">
                        Referee: <br> FELIX ZWAYER
                    </div>
                </div>
            </div>

            <div class="match-detail-body">
                <div class="menu" style="padding: 10px;background-color: #d04979;">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#timeline"><img src="{{ asset('assets/img/detail-match/icon-menu/timeline2.png') }}">Timeline</a></li>
                        <li><a href="#players"><img src="{{ asset('assets/img/detail-match/icon-menu/players.png') }}">Players</a></li>
                        <li><a href="#lineups"><img src="{{ asset('assets/img/detail-match/icon-menu/lineups.png') }}">Lineups</a></li>
                        <li><a href="#stats"><img src="{{ asset('assets/img/detail-match/icon-menu/stats.png') }}">Stats</a></li>
                        <li><a href="#head2head"><img src="{{ asset('assets/img/detail-match/icon-menu/head2head.png') }}">Head to Head</a></li>
                        <li><a href="#prediction"><img src="{{ asset('assets/img/detail-match/icon-menu/prediction.png') }}">Prediction</a></li>
                        <li><a href="#live-chat"><img src="{{ asset('assets/img/detail-match/icon-menu/live-chat.png') }}">Live Chat</a></li>
                        <li><a href="#news"><img src="{{ asset('assets/img/detail-match/icon-menu/news.png') }}">News</a></li>
                    
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="timeline" style="margin-bottom: 20px;">
                        <div class="row activity">
                            <div class="col-xs-2">
                                <div class="notif-icon">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/detail-match/icon-timeline/Group 114.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-10">
                                <div class="notif-body">
                                    <div class="msg">
                                        <h4>Foul</h4>
                                        <span>Hand ball by Edison Cavani</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="players">
                        <div class="block">
                            <div class="row min-gutter">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="#" class="btn btn-block btn-cta-premium active">Basic Stats</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="detail-match-player-advance.html" class="btn btn-block btn-cta-premium"><span class="icon icon-external-link"></span> Advance Stats</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="stats">
                        <div class="block">
                            <div class="row min-gutter">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="#" class="btn btn-block btn-cta-premium active">Basic Stats</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="detail-match-stats-advance.html" class="btn btn-block btn-cta-premium"><span class="icon icon-external-link"></span> Advance Stats</a>
                                </div>
                            </div>
                        </div>
                        <div class="stats-header">
                            <img src="{{ asset('assets/img/trans-mu.png') }}" alt="">
                            <h4>TEAM STATS</h4>
                            <img src="{{ asset('assets/img/trans-chelsea.png') }}" alt="">
                        </div>
                        <div class="stats-body">
                            <div class="stats-item">
                                <div class="point-left" style="width: 50%;">47</div>
                                <div class="point-name">Shots</div>
                                <div class="point-right" style="width: 50%;">53</div>
                            </div>
                            <div class="stats-item">
                                <div class="point-left" style="width: 30%;">8</div>
                                <div class="point-name">Shot On Target</div>
                                <div class="point-right" style="width: 70%;">11</div>
                            </div>
                            <div class="stats-item">
                                <div class="point-left" style="width: 35%;">13</div>
                                <div class="point-name">Possession</div>
                                <div class="point-right" style="width: 65%;">17</div>
                            </div>
                            <div class="stats-item">
                                <div class="point-left" style="width: 70%;">5</div>
                                <div class="point-name">Passes</div>
                                <div class="point-right" style="width: 30%;">2</div>
                            </div>
                            <div class="stats-item">
                                <div class="point-left" style="width: 10%;">0</div>
                                <div class="point-name">Pass accuracy</div>
                                <div class="point-right" style="width: 90%;">1</div>
                            </div>
                            <div class="stats-item">
                                <div class="point-left" style="width: 85%;">2</div>
                                <div class="point-name">Fouls</div>
                                <div class="point-right" style="width: 15%;">1</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#btn-chat').on('click', function() {
var comment = $('#btn-input').val();
var match_id = $('#btn-match-id').val();
var base_url = window.location.origin;
if(comment!=""){
    $.ajax({
        url: base_url+"/comment",
        type: "POST",
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            comment: comment,
            match_id:match_id,
        },
        //console.log(response); return false;
        //cache: false,
        success: function(dataResult){
            $("#btn-input").val('');
             $.each(dataResult,function(index,matches){
                                         $("#sms").append('matches.comment');
            console.log(index);
            });
        }
    });
    }
    else{
        alert('Please fill all the field !');
    }
});
});

    $(document).ready(function() {
        let activity = $('.activity')
        for (var i=0; i<10; i++) {
            activity.clone().appendTo('#timeline')
        }
    })
</script>
</html>