@include('partials.header_portal')
</head>
<style>

       / filter-days ================================================== /
       .filter-days {
        padding: .5em 0;
        margin: .5em 0;
        white-space: nowrap;
        overflow-x: auto;
    }
    .filter-days li {
        color: grey;
        display: inline-block;
        padding: .75em 1em;
        min-width: 30% !important;
        text-align: center;
        margin-right: .5em;
        background-color: white;
    }
    .filter-days > .filter-days-active {
        background-color: #AC4CB7;
        color: white;
    }

    / filter-league ================================================ /
    .filter-league > .btn {
        padding: .75em;
    }

    / contest ====================================================== /
    .contest {
        padding: 1em;
        margin-bottom: 1em;
        text-align: center;
        background: url(./assets/img/stadium.png) no-repeat, linear-gradient(to bottom, rgb(28, 51, 8), black);
        background-size: 100% 100%, cover;
        background-position: 0 0;
    }
    .contest .club-left, .contest .club-right { color: white }
    .contest .club-left .logo, .contest .club-right .logo { 
        background-color: white;
        padding: .5em;
        border-radius: 50%;
    }
    .contest .club-left img, .contest .club-right img { width: 60px; }
    .contest .mid { text-align: center; color: white; }
    .contest .mid .date {
        background-color: #575757;
        border: 1px solid white;
        border-radius: 5px 5px 0 0;
        font-size: 9pt;
    }
    .contest .mid .place {
        background: transparent;
        border: 1px solid white;
        border-top: 0;
        border-radius: 0 0 5px 5px;
        font-size: 9pt;
    }

    / timeline start /
    .timeline {
        position: relative;
    }
    .timeline:before {
        content: '';
        display: block;
        background-color: #A3A3A3;
        width: 3px;
        position: absolute;
        height: 100%;
        margin-left: 49%;
        margin-right: auto;
        left: 0;
        right: 0;
        z-index: 0;
    }
    .timeline .timeline-header {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 5;
    }
    .timeline .timeline-header::before {
        content: '';
        height: 2px;
        width: 100%;
        background-color: #A3A3A3;
        display: block;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
    }
    .timeline .timeline-header h3 {
        display: inline-block;
        margin: 0;
        font-size: 18px;
        border: 2px solid #A3A3A3;
        text-transform: uppercase;
        color: #72227C;
        padding: 5px 10px;
        border-radius: 50rem;
        line-height: normal;
        letter-spacing: 1px;
        font-weight: bold;
        background-color: #F5F5F5;
        position: relative;
        z-index: 9;
    }
    .timeline .timeline-group {
        background-color: #FFFFFF;
        border-radius: 8px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        margin-bottom: 20px;
        position: relative;
        z-index: 5;
    }
    .timeline .timeline-group:nth-child(odd) {
        margin-left: 20px;
        width:87%;
    }
    .timeline .timeline-group:nth-child(even) {
        margin-right: 20px;
        width:87%
    }
    .timeline .timeline-group:nth-child(odd) .timeline-group-header::before {
        right: 20px;
    }
    .timeline .timeline-group:nth-child(even) .timeline-group-header::before {
        left: 20px;
    }
    .timeline .timeline-group:nth-child(odd) .timeline-match-header::before {
        right: 20px;
    }
    .timeline .timeline-group:nth-child(even) .timeline-match-header::before {
        left: 20px;
    }
    .timeline .timeline-group-header {
        background-color: #AC4CB7;
        color: #FFFFFF;
        padding: 10px 8px;
        border-radius: 8px 8px 0 0;
        clear: both;
        position: relative;
    }
    .timeline .timeline-group-header::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        display: inline-block;
        border: 2px solid #FFFFFF;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        background-color: #AC4CB7;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: 40%;
        top: -10px;
    }
    .timeline .timeline-group-header.header-player {
        background-color: #72227C;
    }
    .timeline .timeline-group-header.header-player::before {
        background-color: #72227C;
    }
    .timeline .timeline-group-header.header-transfer {
        background-color: #7CD327;
    }
    .timeline .timeline-group-header.header-transfer::before {
        background-color: #7CD327;
    }

    .timeline .timeline-group-header a {
        color: #FFFFFF;
    }
    .timeline .timeline-group-content {
        margin-top: 0;
    }
    .timeline .timeline-group-content .thumbail-news {
        width: 115px;
        height: 100px;
        position: relative;
    }
    .timeline .timeline-group-content .thumbail-news img {
        object-fit: cover;
        object-position: center top;
        width: 100%;
        height: 100%;
    }
    .timeline .timeline-group-content .thumbail-news::after {
        content: '';
        position: absolute;
        display: block;
        width: 50px;
        height: 100%;
        top: 0;
        right: -10px;
        z-index: -1;
        background: #FFFFFF;
        transform-origin: bottom left;
        -webkit-transform: skew(-20deg, 0deg);
        transform: skew(-20deg, 0deg);
        z-index: 9;
    }
    .timeline .timeline-group-content .media-body {
        padding: 10px 10px 10px 0;
        position: relative;
        z-index: 10;
    }
    .timeline .timeline-group-content .media-body .media-heading {
        line-height: 24px;
        font-size: 16px;
        text-transform: uppercase;
        white-space: pre-wrap;
        text-overflow: ellipsis;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .timeline .timeline-match {
        background-image: url('./assets/img/home-match-bg.png');
        background-position: center center;
        padding: 0 10px 10px 10px;
        color: #FFFFFF;
    }
    .timeline .timeline-match .timeline-match-header {
        font-size: 12px;
        position: relative;
        padding-top: 15px;
        padding-bottom: 10px;
    }
    .timeline .timeline-match .timeline-match-header::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        display: inline-block;
        border: 2px solid #FFFFFF;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        background-color: black;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        top: -10px;
    }
    .timeline .timeline-match .timeline-match-header .timeline-header-logo img {
        width: 100%;
        max-width: 90px;
    }
    .timeline .timeline-match .timeline-match-label {
        background-color: #6F1CFF;
        color: #FFFFFF;
        padding: 2px 5px;
        display: block;
        position: absolute;
        right: -8px;
        text-align: center;
        top: 50%;
        transform: translateY(-50%);
    }
    .timeline .timeline-match .timeline-match-label.red {
        background-color: #FF1C1C;
    }
    .timeline .timeline-match .timeline-match-team {
        padding: 0;
        margin: 0;
        font-size: 16px;
    }
    .timeline .timeline-match .timeline-match-team li {
        list-style: none;
        padding-top: 8px;
        padding-bottom: 8px;
        border-bottom: 1px solid rgba(225, 225, 225, 0.5);
        display: flex;
        align-items: center;
    }
    .timeline .timeline-match .timeline-match-team li:last-child {
        border-bottom: 0;
    }
    .timeline .timeline-match .timeline-match-team li .team-img {
        width: 50px;
        height: auto;
        max-height: 50px;
        display: inline-block;
        background-color: #FFFFFF;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        padding: 8px;
        margin-right: 10px
    }
    .timeline .timeline-match .timeline-match-team li .team-img img {
        max-width: 100%;
    }
    .timeline .timeline-match .timeline-match-team li .team-score {
        position: relative;
        margin-left: auto;
        float: right;
    }
    .match-area {
    padding: 0.5em 1em 1em;
    background: url("./assets/img/stadium-alt.jpg") no-repeat;
    position: relative;
    background-position: center center;
    color: white;
    border-radius: 0 0 8px 8px;
    background-size: cover;
}
.contest {
    padding: 1em;
    margin-bottom: 1em;
    text-align: center;
    background-size: 100% 100%, cover;
    background-position: 0 0;
}
.contest .club-left, .contest .club-right { color: white }
.contest .club-left .logo, .contest .club-right .logo { 
    background-color: white;
    padding: .5em;
    border-radius: 50%;
}
.contest .club-left img, .contest .club-right img { width: 60px; }
.contest .mid { text-align: center; color: white; }
.contest .mid .date {
    background-color: #575757;
    border: 1px solid white;
    border-radius: 5px 5px 0 0;
    font-size: 9pt;
}
.contest .mid .place {
    background: transparent;
    border: 1px solid white;
    border-top: 0;
    border-radius: 0 0 5px 5px;
    font-size: 9pt;
}
.bg-whitesmoke {
    background-color: #fff;
}
.bg-green {
    background-color: #7CD327;
}

.blurContainer{
    background-color: rgba(0,0,0, 0.4);
    border-radius: 4px;
    margin: -15px;
    padding: 19px;
}
/* .timeline-group {
    background-color: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    margin-bottom: 20px;
    position: relative;
    z-index: 5;
}
.timeline-group:nth-child(even) {
    margin-right: 20px;
} */
/* .timeline-label {
    background-color: #6F1CFF;
    color: #FFFFFF;
    padding: 2px 5px;
    display: block;
    position: absolute;
    right: -8px;
    text-align: center;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
}
.match-area {
    padding: 0.5em 1em 1em;
    position: relative;
    background-position: center center;
    color: white;
    border-radius: 0 0 8px 8px;
    background-size: cover;
} */
/* new */
.timeline-group-header.header-match {
    background-color: black;
}
.timeline-group-header.header-match::before {
    background-color: black;
}

.match-area {
    padding: 0.5em 1em 1em;
    background: url("./assets/img/stadium-alt.jpg") no-repeat;
    position: relative;
    background-position: center center;
    color: white;
    border-radius: 0 0 8px 8px;
    background-size: cover;
}
.match-area::before {
    content: '';
    background-color: rgba(0, 0, 0, .5);
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border-radius: 0 0 8px 8px;
}
.match-area .btn {
    position: relative;
    z-index: 1;
}

.club-box {
    display: flex;
    align-items: center;
    position: relative;
}
.club-box .club-pict {
    width: 87px;
    height: 42px;
    padding: 3px;
    border-radius: 50%;
    box-shadow: 0 3px 5px rgba(0, 0, 0, .25);
    display: inline-block;
    background-color: white;
}
.club-box .club-pict img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center center;
    border-radius: 50%;
}
.club-box .club-name {
    margin-bottom: 0;
    font-weight: bold;
    font-size: 16px;
    flex: auto;
    width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.club-box .match-result {
    display: inline-block;
    position: absolute;
    text-align: center;
    width: 25px;
    height: 25px;
    line-height: 25px;
    top: 50%;
    transform: translateY(-50%);
    font-weight: normal;
}
.club-box.club-l {
    justify-content: flex-start;
}
.club-box.club-r {
    justify-content: flex-end;
}
.club-box.club-l .club-pict {
    margin-right: 10px;
}
.club-box.club-r .club-pict {
    margin-left: 10px;
}
.club-box.club-l .club-name {
    text-align: left;
}
.club-box.club-r .club-name {
    text-align: right;
}
.club-box.club-l .match-result {
    right: -7.5px;
    border-right: 1px solid rgba(225, 225, 225, .75);
}
.club-box.club-r .match-result {
    left: -7.5px;
    border-left: 1px solid rgba(225, 225, 225, .75);
}

.timeline-label {
    background-color: #6F1CFF;
    color: #FFFFFF;
    padding: 2px 5px;
    display: block;
    position: absolute;
    right: -8px;
    text-align: center;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
}
.timeline-label.red {
    background-color: #FF1C1C;
}
.my-team {
    display: flex;
    justify-content: center;
    align-items: center;
    /* padding: 0em; */
    margin-top: -3.75em;
    margin-left: 11px;
    margin-right: 11px;
    margin-bottom: 12px;
}
    / timeline end /

    /Modal Button/
    .b-design {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    width: 94%;
    margin-left: 6px;
    margin-right: 6px;
}

</style>

<body>
    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">

        <div class="block bg-grey" style="background:rgba(201, 195, 195, 0.59);margin-top: 5px">
                <!-- menu ------------------------------------>
                @include('partials.topmenu_portal')
                <!-- menu ------------------------------------>
        </div>

            
                <!-- my team --------------------------------->
                <div class="my-team bg-white border radius-1 " id="myTeam">
                    <span><strong>Favourite Club</strong></span>
                    <ul id="UserFavourite">  </ul>
                       
                    <a data-toggle="modal" data-target="#myModalClub" id="open" class="add-club-button" >+</a>
                </div>

                
                <!-- <div class="club-cover hide"  id="hide">
                
                    <div class="inner-club-cover">
                    <div>
                        <span style="margin: 12px;"><strong>
                            </strong></span>
                            <a  data-toggle="modal" data-target="#myModalClub" id="open">
                                <img src="{{ asset('assets/img/addClub.png')}}" alt="" style="height: 50px; margin: 9px;">
                                </a>
                            <a>
                                <img src="{{ asset('assets/img/RemoveClub.png')}}" alt="" style="height: 50px; margin: 9px;">
                            </a>
                            <a id="clubHide">
                                <img src="{{ asset('assets/img/hied.png')}}" alt="" style="height: 50px; margin: 9px;">
                            </a>

                            <div class="clearfix" style="clear: both;" id="UserFev"></div>
                    </div> --> 
               

  <!-- Modal End -->
                    

            <!-- slider Here -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="./assets/img/demo-goaly-banner-1.jpg" alt="" style="width:100%;">
      </div>

      <div class="item">
        <img src="./assets/img/demo-goaly-banner-2.png" alt="" style="width:100%;">
      </div>
    
      
    </div>

   
   
  </div>
</div>

            <!-- slider end -->

            <!-- New code here -->
            
            <div class="block">
            <div class="timeline">
                <div class="timeline-header">
                    <h3>Timeline</h3>
                </div>
                <div class="timeline-group">
                    <div class="timeline-group-header clearfix">
                        <span class="float-left">
                            <span class="icon-group mr-1"></span> <strong>Team News</strong>
                        </span>
                        <span class="float-right text-right"><a href="#">See All</a></span>
                    </div>
                    <div class="timeline-group-content media">
                        <div class="media-left p-0">
                            <div class="thumbail-news">
                                <img src="./assets/img/timeline-news-1.png" alt="Images">
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Streling Contract and Switch to Championship and Get</h4>
                            <small class="text-muted">05 Aug 2021</small>
                        </div>
                    </div>
                </div>

                <div class="timeline-group">
                    <div class="timeline-group-header header-player clearfix">
                        <span class="float-left">
                            <span class="icon-user mr-1"></span> <strong>Player News</strong>
                        </span>
                        <span class="float-right text-right"><a href="#">See All</a></span>
                    </div>
                    <div class="timeline-group-content media">
                        <div class="media-left p-0">
                            <div class="thumbail-news">
                                <img src="./assets/img/timeline-news-3.png" alt="Images">
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Barcelona Without Messi is A Long Distance Relationship</h4>
                            <small class="text-muted">05 Aug 2021</small>
                        </div>
                    </div>
                </div>
              <!-- upcomming match start -->
             
             
               @if(!empty($response['matches']))
              @foreach($response['matches'] as $match) 
              
                <div class="timeline-group">
                    <div class="timeline-group-header header-match clearfix">
                        <span class="float-left">
                            <span class="icon-ball mr-1"></span> <strong>Match</strong>
                        </span>
                        <span class="timeline-label red">{{$match['match_status']}}</span>
                    </div>
                    <div class="match-area">
                        <div class="row small mb-1">
                            <div class="col-xs-6">
                                <p class="m-0 text-left">{{$match['league']}}</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="m-0 text-right">{{$match['date_time']}}</p>
                            </div>
                        </div>
                        <div class="row d-flex ais-center mb-1 min-gutter">
                            <div class="col-xs-5">
                                <div class="club-box club-l">
                                    <div class="club-pict">
                                        <img src="{{$match['homeTeam_image']}}" alt="club">
                                    </div>
                                    <div class="club-name">
                                       {{$match['homeTeam_name']}}
                                        <span class="match-result">{{$match['localteam_score']}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-center">VS</div>
                            <div class="col-xs-5">
                                <div class="club-box club-r">
                                    <div class="club-name">
                                       {{$match['awayTeam_name']}}
                                        <span class="match-result">{{$match['visitorteam_score']}}</span>
                                    </div>
                                    <div class="club-pict">
                                        <img src="{{$match['awayTeam_image']}}" alt="club">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-purple p-1 w-50 text-white mx-auto">See Result</a>
                        </div>
                    </div>
                </div>
                <!-- competition end -->
                 @endforeach
                @endif
            
                  <!-- upcoming matches end ------------------------------------->

			  
                <div class="timeline-group">
                    <div class="timeline-group-header header-transfer clearfix">
                        <span class="float-left">
                            <span class="icon-transfer mr-1"></span> <strong>Transfer News</strong>
                        </span>
                        <span class="float-right text-right"><a href="#">See All</a></span>
                    </div>
                    <div class="timeline-group-content media">
                        <div class="media-left p-0">
                            <div class="thumbail-news">
                                <img src="./assets/img/timeline-news-2.png" alt="Images">
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Thomas Tuchel's thoughts on Erling Haaland transfer amid Romelu Lukaku row</h4>
                            <small class="text-muted">05 Aug 2021</small>
                        </div>
                    </div>
                </div>
<!----------------------for showing Predictions/competitions -------------------->
              @if(!empty($competitions))
              @foreach($competitions as $competition) 

                <div class="timeline-group">
                    <div class="timeline-group-header header-match clearfix">
                        <span class="float-left">
                            <span class="icon-ball mr-1"></span> <strong>Match</strong>
                        </span>
                        <span class="timeline-label blue">Ongoing Prediction</span>
                    </div>
                    <div class="match-area">
                        <div class="row small mb-1">
                            <div class="col-xs-6">
                                <p class="m-0 text-left">Premiere League</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="m-0 text-right">07/07/2021 03:00</p>
                            </div>
                        </div>
                        <div class="row d-flex ais-center mb-1 min-gutter">
                            <div class="col-xs-5">
                                <div class="club-box club-l">
                                    <div class="club-pict">
                                        <img src="{{$competition['home_team_logo']}}" alt="club">
                                    </div>
                                    <div class="club-name">
                                       {{$competition['home_team_name']}}
                                        <span class="match-result">-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-center">VS</div>
                            <div class="col-xs-5">
                                <div class="club-box club-r">
                                    <div class="club-name">
                                       {{$competition['away_team_name']}}
                                        <span class="match-result">-</span>
                                    </div>
                                    <div class="club-pict">
                                        <img src="{{$competition['away_team_logo']}}" alt="club">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-purple p-1 w-50 text-white mx-auto">See Result</a>
                        </div>
                    </div>
                </div>
                <!-- competition end -->
                 @endforeach
                @endif
            </div>
        </div>
           
           

           

         

         </div> 
    <!--page content -->
    </div>
    @include('partials.footernew')
<!-- Add fav club modal -->
<div id="myModalClub" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-left:-14px;margin-top:67px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" ><b>X</b></button>
        <h4 class="modal-title text-center">
        <img src="{{asset('/assets/img/logo-goaly.png')}}" alt="" style="height:50px;width:auto"/>
      </h4>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
      @if(!empty($details))

                        @foreach($details as $league)


                            
                                <a class="nav-link" id="team-{{$league['sportsmonks_id']}}-tab" data-toggle="tab" href="#team-{{$league['sportsmonks_id']}}" role="tab" aria-controls="Team-{{$league['sportsmonks_id']}}" aria-selected="true" aria-expanded="true">
                                <div class="league">
                                    <div class="league-logo border-right">

                                        <img src="{{$link.$league['old_logo']}}" alt="">
                                    </div>
                                    <div class="league-title" style="color:black ;font-weight:600">{{$league['competition_name']}}</div>

                                </div>
                            </a>

                                <div class="tab-pane fade  p-3 in" id="team-{{$league['sportsmonks_id']}}" aria-labelledby="team-{{$league['sportsmonks_id']}}-tab">
                                    <div id="team-ui-{{$league['sportsmonks_id']}}">

                                    </div>
                                </div>
                        @endforeach
                    @endif
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success btn-lg btn-block" style="background: rgb(22, 80, 14);color:white">Save</button>
              <button type="button" class="btn btn-secondary btn-lg btn-block" style="background:rgb(215, 13, 78); color:white">Close</button>
      </div>
     
      </div>
     


      <div class="modal-footer">
      <div class="col-xs-6 plfix">
      
      

      </div> 
       <div class="col-xs-6 prfix">
      
      </div>
      </div>
    </div>

  </div>
</div>
<!-- Add fav club modal end -->
<script src="{{ asset('assets/js/Prediction.js') }}"></script>
<script src="{{ asset('js/frontend/home.js')}}"></script>
    <script type="text/javascript">


    </script>


</body>
</html>