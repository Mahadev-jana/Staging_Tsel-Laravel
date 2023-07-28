@include('partials.header_portal')
</head>

<body>
    
    
    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">

            <div class="block bg-grey">
                <!-- menu ------------------------------------>
                @include('partials.topmenu_portal')
                <!-- menu ------------------------------------>
            </div>

            <div class="block">
                <div class="d-flex" style="margin-top: -2.75em;">
                    <a href="#" class="btn btn-lg border btn-white text-white w-50 mr-1" data-href="my_team" style="color: black;">My Team</a>
                    <a href="#" class="btn btn-lg border btn-purple w-50 ml-1 team_active" data-href="all_team" >All Team</a>
                </div>

                <!-- filter days -->
                <ul class="filter-days">

                    <a class="nav-link"   id="yesterday_match-tab"  onclick="tabAction(1)" data-toggle="tab" href="#yesterday_match" role="tab" aria-controls="" aria-selected="true">
                    <li class="btn border radius-1 date_active" data-type="yesterday" id="yesterday_match_id">Yesterday</li>
                        </a>
                    <a class="nav-link"  id="today_match-tab" onclick="tabAction(2)" data-toggle="tab" href="#today_match" role="tab" aria-controls="" aria-selected="false">

                    <li class="btn border radius-1" id="today_match_id" data-type="today">Today</li>
                        </a>
                    <a class="nav-link"   id="tommorow_match-tab" onclick="tabAction(3)" data-toggle="tab" href="#tommorow_match" role="tab" aria-controls="" aria-selected="false">
                    <li class="btn border radius-1" id="tommorow_match_id" data-type="tomorrow">Tommorow</li></a>

                </ul>
                <!-- filter days -->

                <!-- filter league -->
                <div id="league_list">
                  @if(!empty($league_details))
                    <select name="league_id" id="league_id_list" class="form-control select2me selectAggregate">

                            <option value="">All Leagues</option>
                            
                                @foreach($league_details as $league)
                                    <option value="{{$league['sportsmonks_id']}}">{{$league['competition_name']}}</option>
                                @endforeach
                           
                    </select>
                     @endif
                </div>
                <!-- filter league -->

            </div>



            <div class="tab-content" id="myTabContent">



            <div id="skloader"> 

<div class="container">
    
  </div>
             </div>


     <div class="tab-pane fade p-3 active in" id="yesterday_match" aria-labelledby="yesterday_match-tab">

                    <div id="matchDisplay"></div>
                    
                </div>

                <div class="tab-pane fade p-3 in" id="today_match" aria-labelledby="today_match-tab">
                    <div id="matchDisplay"></div>

                </div>

                <div class="tab-pane fade p-3 in" id="tommorow_match" aria-labelledby="tommorow_match-tab">
                    <div id="matchDisplay"></div>

                </div>

            </div>

        </div>
    </div>

    @include('partials.footernew')


     <script src="{{ asset('js/frontend/_match.js')}}"></script>

    <script type="text/javascript">
        
        $(document).ready(function() {
 //GetMatches();
   
       
       
    });
    </script>
</body>
</html>

