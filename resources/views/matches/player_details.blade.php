@include('partials.headernew')
</head>


<body>
    <div class="wrapper">
        <!-- header image -->
        <img src="{{ asset('assets/img/header.png') }}" class="img-fluid" alt="">

        <div class="block bg-whitepurple">
            <!-- player-cover -->
            <div class="player-cover">
                <div class="pict">
                    <img class="a" src="{{ asset('assets/img/face.png') }}" alt="">
                    <img class="b" src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                </div>
                <h5 class="name">Ben Chilwell</h5>
                <div class="pos">
                    <span>1</span>
                    <span>GK</span>
                </div>
            </div>
        </div>

        <!-- plyer menu -->
        <ul class="club-menu bg-purple" id="team_details" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">Match</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Stats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">News</a>
            </li>
        <!-- <ul class="player-menu bg-purple">
            <li class="active"><a href="6.html">Info</a></li>
            <li><a href="7.html">Match</a></li>
            <li><a href="8.html">Stats</a></li>
            <li><a href="9.html">News</a></li> -->
        </ul>

        <!-- tabs content -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
                <div class="tab-content">

                    <!-- player highlight -->
                    <div class="player-highlight block bg-grey">
                        <h5>Season 2019/2020</h5>
                        <ul>
                            <li>
                                <span>54</span>
                                <span>Matches Played</span>
                            </li>
                            <li>
                                <span>100</span>
                                <span>Minutes Played</span>
                            </li>
                            <li>
                                <span>14</span>
                                <span>Goal Save</span>
                            </li>
                            <li>
                                <span>90</span>
                                <span>Matches Played</span>
                            </li>
                            <li>
                                <span>90</span>
                                <span>Matches Played</span>
                            </li>
                        </ul>
                    </div>

                    <!-- player matches -->
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

                    <!-- player info -->
                    <div class="player-info">
                        <div class="name">
                            <h4 class="my-0"><strong>Ben Chilwell</strong></h4>
                            <span>Ben</span>
                        </div>

                        <!-- personal -->
                        <div class="tag">Personal Info</div>
                        <div class="personal">
                            <table class="table">
                                <tr><td>Date of Birth</td><td>01/01/1988</td></tr>
                                <tr><td>Citizenship</td><td>Brazil</td></tr>
                                <tr><td>Age</td><td>27</td></tr>
                                <tr><td>Weight</td><td>91 Kg</td></tr>
                                <tr><td>Height</td><td>192</td></tr>
                            </table>
                        </div>

                        <div class="tag">Career Info</div>
                        <div class="career">
                            <table class="table">
                                <tr><td>Current Team</td><td>Chelsea</td></tr>
                                <tr><td>Current Competition</td><td>EPL</td></tr>
                                <tr><td>Previous Team</td><td>Arsenal</td></tr>
                                <tr><td>Previous Competition</td><td>EPL</td></tr>
                            </table>
                        </div>

                        <div class="tag">Club History</div>
                        <div class="club-hstr">
                            <ul>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/ic-chelsea.png') }}" alt=""></div>
                                    <h5 class="my-1"><strong>Chelsea</strong></h5>
                                    <span>100 Match</span>
                                    <span>4 Season</span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/ic-lvpl.png') }}" alt=""></div>
                                    <h5 class="my-1"><strong>Liverpool</strong></h5>
                                    <span>100 Match</span>
                                    <span>4 Season</span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/ic-albion.png') }}" alt=""></div>
                                    <h5 class="my-1"><strong>Albion</strong></h5>
                                    <span>100 Match</span>
                                    <span>4 Season</span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/ic-mancity.png') }}" alt=""></div>
                                    <h5 class="my-1"><strong>Manchester City</strong></h5>
                                    <span>100 Match</span>
                                    <span>4 Season</span>
                                </li>
                                <li>
                                    <div class="cover-img"><img src="{{ asset('assets/img/ic-manutd.png') }}" alt=""></div>
                                    <h5 class="my-1"><strong>Manchester United</strong></h5>
                                    <span>100 Match</span>
                                    <span>4 Season</span>
                                </li>
                            </ul>
                        </div>

                        <div class="tag">Competion History</div>
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
            </div>
            <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
                <!-- tabs content -->
                <div class="tab-content">

                    <div class="block bg-grey">
                        <div class="dropdown">
                            <button class="btn btn-lg btn-white w-100" type="button" data-toggle="dropdown">
                            2019/2020
                            <span class="caret"></span>
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

                    <!-- player match -->
                    <div class="player-match table-responsive bg-white">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white text-center">
                                    <td>No</td>
                                    <td>League</td>
                                    <td>Date</td>
                                    <td>Competion</td>
                                    <td>Duration</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td><strong>1</strong></td>
                                    <td class="c-league"><div class="cover-img"><img src="{{ asset('assets/img/league/Image 22@3x.png') }}" alt=""></div></td>
                                    <td>14/07/<br>2020</td>
                                    <td style="white-space:nowrap;">
                                        <div class="c-competion">
                                            <div class="clubl">
                                                <img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                                <span>CHE</span>
                                            </div>
                                            <div class="score">100 - 100</div>
                                            <div class="clubr">
                                                <img src="{{ asset('assets/img/ic-lvpl.png') }}" alt="">
                                                <span>LVP</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td><strong>2</strong></td>
                                    <td class="c-league"><div class="cover-img"><img src="{{ asset('assets/img/league/Image 23@3x.png') }}" alt=""></div></td>
                                    <td>15/07/<br>2020</td>
                                    <td style="white-space:nowrap;">
                                        <div class="c-competion">
                                            <div class="clubl">
                                                <img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                                <span>CHE</span>
                                            </div>
                                            <div class="score">100 - 100</div>
                                            <div class="clubr">
                                                <img src="{{ asset('assets/img/ic-lvpl.png') }}" alt="">
                                                <span>LVP</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td><strong>3</strong></td>
                                    <td class="c-league"><div class="cover-img"><img src="{{ asset('assets/img/league/Image 24@3x.png') }}" alt=""></div></td>
                                    <td>16/07/<br>2020</td>
                                    <td style="white-space:nowrap;">
                                        <div class="c-competion">
                                            <div class="clubl">
                                                <img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                                <span>CHE</span>
                                            </div>
                                            <div class="score">100 - 100</div>
                                            <div class="clubr">
                                                <img src="{{ asset('assets/img/ic-lvpl.png') }}" alt="">
                                                <span>LVP</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td><strong>4</strong></td>
                                    <td class="c-league"><div class="cover-img"><img src="{{ asset('assets/img/league/Image 25@3x.png') }}" alt=""></div></td>
                                    <td>17/07/<br>2020</td>
                                    <td style="white-space:nowrap;">
                                        <div class="c-competion">
                                            <div class="clubl">
                                                <img src="{{ asset('assets/img/ic-chelsea.png') }}" alt="">
                                                <span>CHE</span>
                                            </div>
                                            <div class="score">100 - 100</div>
                                            <div class="clubr">
                                                <img src="{{ asset('assets/img/ic-lvpl.png') }}" alt="">
                                                <span>LVP</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>90</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
                    <!-- tabs content -->
                <div class="tab-content">

                    <!-- player main stats -->
                    <div class="block bg-grey">
                        <div class="player-stats-main block bg-white shadow radius-1">
                            <div class="box border-right border-bottom">Goals conceded / match <br> <strong>0.67</strong></div>
                            <div class="box border-bottom border-left">Saves made / match <br> <strong>2.2</strong></div>
                            <div class="w-100 d-flex j-center">
                                <div class="progress-circle c100 p75 m-0 green" style="margin:-13% 0;">
                                    <span>
                                        <strong>Matches <br> played</strong>
                                        <span class="mt-1">26/35</span>
                                    </span>
                                    <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="box border-top border-right"><strong>13</strong> <br> Clean sheets</div>
                            <div class="box border-left border-top"><strong>4</strong> <br> Saves from penalty</div>
                        </div>
                    </div>

                    <!-- player stats detail -->
                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center">SAVES</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li>
                                    <span>Saves made</span>
                                    <span>55</span>
                                </li>
                                <li>
                                    <span>Saves - caught</span>
                                    <span>13</span>
                                </li>
                                <li>
                                    <span>Saves - parried</span>
                                    <span>4</span>
                                </li>
                                <li>
                                    <span>Saves from penalty</span>
                                    <span>23</span>
                                </li>
                                <li>
                                    <span>Saves shots inside the box</span>
                                    <span>11</span>
                                </li>
                                <li>
                                    <span>Saves shots ouotside the box</span>
                                    <span>23</span>
                                </li>
                                <li>
                                    <span>Catches</span>
                                    <span>44</span>
                                </li>
                                <li>
                                    <span>Punches</span>
                                    <span>11</span>
                                </li>
                                <li>
                                    <span>Crosses not claimed</span>
                                    <span>21</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- player stats detail -->
                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center">DISTRIBUTION</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li>
                                    <span>Total Passes</span>
                                    <span>728</span>
                                </li>
                                <li>
                                    <span>Pass accuracy</span>
                                    <span>13</span>
                                </li>
                                <li>
                                    <span>Successful distribution</span>
                                    <span>4</span>
                                </li>
                                <li>
                                    <span>Saves - shots inside the box</span>
                                    <span>11</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade p-3" id="four" aria-labelledby="four-tab">
                <h1>four</h1>
            </div>
        </div>
    </div>
</body>
</html>
