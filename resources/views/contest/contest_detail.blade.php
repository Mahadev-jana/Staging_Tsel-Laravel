
@include('partials.header')
  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

	<div class="">
    @include('partials.topmenubar')
		<div class="clearfix"></div>
		@include('partials.sidebar')
	  <div class="page-content">
			<!-- Menu Cat -->
			<div class="col-xs-12 nnav">
				<ul class="nav nav-tabs">
					<li>
						<a href="{{route('home')}}" class="ingrid">
							<i class="far fa-futbol text-center"></i>
							<span class="text-small">Home</span>
						</a>
					</li>
					<li class="active">
						<a href="{{route('contest')}}" class="ingrid">
							<i class="fas fa-history text-center"></i>
							<span class="text-small">Contest</span>
						</a>
					</li>
					<li>
						<a href="{{route('matches')}}" class="ingrid">
							<i class="far fa-clock text-center"></i>
							<span class="text-small">Live</span>
						</a>
					</li>
					<li>
						<a href="{{route('news')}}" class="ingrid">
							<i class="far fa-newspaper text-center"></i>
							<span class="text-small">News</span>
						</a>
					</li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
			<!-- Contest Detail -->
			<div class="col-xs-12 lm ct">

				<div id="div1">
					<div class="col-xs-7 pd-0">
						<h2>Score Prediction</h2>
					</div>
		  			<div class="col-xs-5 text-right pd-0">
						<h5 class="lh3">Points Win: 100</h5>
					</div>
					<div class="hr"></div>
					<h2 class="ct-title">
						<div class="left">
							1.
						</div>
						<div class="right">
							Can you predict the score between Juventus vs Ac Milan at Allianz Stadium 10/14/2018?
						</div>
					</h2>
					<div>
		   			<img src="{{('assets/img/live2.jpg')}}" alt=""/>
				</div>
					<div class="hr"></div>
					<div class="col-xs-6 scrL">
					<img src="{{('assets/img/juventus_black.png')}}" alt=""/>
					<input type="text" class="ct-input-scr" id="score1">
					<span>&nbsp;</span>
				  	<br>
				  	<h4 class="tl">Juventus</h4>
				  	<!--<p class="marcatori-partita">&nbsp; </p>-->
			  </div>
			  		<div class="col-xs-6 scrR">
				  	<span>&nbsp;</span>
					<input type="text" class="ct-input-scr" id="score2">
				  	<img src="{{('assets/img/milan.png')}}" alt=""/>

				  	<br>
				  	<h4 class="tl">Milan</h4>

			  </div>
					<div class="clearfix"></div>
					<div class="col-xs-12 pd-0 text-center">
						<button id="todiv2" class="btn btn-primary btn-ct black">
							Submit Answer 1
						</button>
					</div>
				</div>

				<div id="div2" style="display: none">
					<div class="col-xs-7 pd-0">
						<h2>First Goal Team</h2>
					</div>
		  			<div class="col-xs-5 text-right pd-0">
						<h5 class="lh3">Points Win: 50</h5>
					</div>
					<div class="hr"></div>
					<h2 class="ct-title">
						<div class="left">
							2.
						</div>
						<div class="right">
							Which team first to make goal?
						</div>
					</h2>
					<div>
						<img src="{{('assets/img/live2.jpg')}}" alt=""/>
					</div>
					<div class="hr"></div>
					<!--<div class="col-xs-6 scrL">
						<img src="img/juventus_black.png" alt=""/>
						<input type="text" class="ct-input-scr" value="1" disabled>
						<span>&nbsp;</span>
						<br>
						<h4 class="tl">Juventus</h4>
						<p class="marcatori-partita">&nbsp; </p>
				    </div>
			  		<div class="col-xs-6 scrR">
						<span>&nbsp;</span>
						<input type="text" class="ct-input-scr" value="2" disabled>
						<img src="img/milan.png" alt=""/>

						<br>
						<h4 class="tl">Milan</h4>
						<p class="marcatori-partita">&nbsp; </p>
				    </div>-->
					<div class="clearfix"></div>
					<div class="col-xs-12 text-center mb-10" style="margin-top: -10px">
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">1</div>
						</div>
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">2</div>
						</div>
						<h4 class="tl">Your answer</h4>
						<input type="number" class="ct-input-scr" id="score2">
					</div>
					<div class="col-xs-12 pd-0 text-center">
						<button id="todiv3" class="btn btn-primary btn-ct black">
							Submit Answer 2
						</button>
					</div>
				</div>

				<div id="div3" style="display: none">
					<div class="col-xs-7 pd-0">
						<h2>First Yellow card Team</h2>
					</div>
		  			<div class="col-xs-5 text-right pd-0">
						<h5 class="lh3">Points Win: 50</h5>
					</div>
					<div class="hr"></div>
					<h2 class="ct-title">
						<div class="left">
							3.
						</div>
						<div class="right">
							Which team to receive yellow card?
						</div>
					</h2>
					<div>
						<img src="{{('assets/img/live2.jpg')}}" alt=""/>
					</div>
					<div class="hr"></div>
					<div class="clearfix"></div>
					<div class="col-xs-12 text-center mb-10" style="margin-top: -10px">
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">1</div>
						</div>
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">2</div>
						</div>
						<h4 class="tl">Your answer</h4>
						<input type="number" class="ct-input-scr" id="score2">
					</div>
					<div class="col-xs-12 pd-0 text-center">
						<button id="todiv4" class="btn btn-primary btn-ct black">
							Submit Answer 3
						</button>
					</div>
				</div>

				<div id="div4" style="display: none">
					<div class="col-xs-7 pd-0">
						<h2>Highest goal possession</h2>
					</div>
		  			<div class="col-xs-5 text-right pd-0">
						<h5 class="lh3">Points Win: 50</h5>
					</div>
					<div class="hr"></div>
					<h2 class="ct-title">
						<div class="left">
							4.
						</div>
						<div class="right">
							Which team highest goal possession?
						</div>
					</h2>
					<div>
						<img src="{{('assets/img/live2.jpg')}}" alt=""/>
					</div>
					<div class="hr"></div>
					<div class="clearfix"></div>
					<div class="col-xs-12 text-center mb-10" style="margin-top: -10px">
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">1</div>
						</div>
						<div class="col-xs-6 pd-0 mt-5">
							<div class="btn btn-default">2</div>
						</div>
						<h4 class="tl">Your answer</h4>
						<input type="number" class="ct-input-scr" id="score3">
					</div>
					<div class="col-xs-12 pd-0 text-center">
						<a href="contest-detail-result.php" class="btn btn-primary btn-ct black">
							Submit Answer 4
						</a>
					</div>
				</div>

			  <!--<div class="col-xs-4">
					<div class="ct-mid">Question: 1/3</div>
			  </div>
			  <div class="col-xs-4 pd-0">
					<a href="contest-detail-2.php" class="btn btn-primary btn-ct cyan">Next Question</a>
			  </div>-->
			  <div class="col-xs-12 pd-0 text-center">
					Winning percentage
			  </div>
			  <div class="col-xs-12 pd-0 text-center">
					<div class="col-xs-6 pd-0">
				  		<h1><strong>55%</strong></h1>
				  	</div>
				  	<div class="col-xs-6 pd-0">
				  		<h1><strong>45%</strong></h1>
				  	</div>
			  </div>
			  <div class="col-xs-12 pd-0">
					<div class="lm">
						<h4>Head to Head</h4>
						<div class="liner"></div>
						<h5>Serie A</h5><table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										11/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Ac Milan
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>0 - 0</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Juventus
											</p>
										</div>
									</td>
									<td width="45" class="text-center">&nbsp;

									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										13/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Juventus</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>1 - 0</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Ac Milan
											</p>
										</div>
									</td>
									<td width="45" class="text-center">&nbsp;

									</td>
								</tr>
							</tbody>
						</table>
						<h5>Coppa Italia</h5><table class="table table-striped custab mb-10">
							<tbody>

								<tr>
									<td width="45" class="text-date">
										19/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Juventus</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>2 - 1</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Ac Milan
											</p>
										</div>
									</td>
									<td width="45" class="text-center">&nbsp;

									</td>
								</tr>
							</tbody>
						</table>
					</div>
			  </div>
			  <div class="col-xs-12 pd-0">
					<div class="lm">
						<div class="col-xs-12 pd-0">
							<h4 class="inline">Last Match </h4>
							&nbsp; <img src="{{('assets/img/juventus_black.png')}}" height="24px" alt=""> <strong>Juventus</strong>
						</div>
						<div class="liner"></div>
						<h5>Serie A</h5><table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										11/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Napoli
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>2 - 2</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Juventus
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat draw">D</div>
									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										13/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Juventus</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>3 - 1</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Inter Milan
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat win">W</div>
									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										11/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Chievo
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>0 - 3</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 <strong>Juventus</strong>
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat win">W</div>
									</td>
								</tr>
							</tbody>
						</table>
						<h5>Champion League</h5>
						<table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										19/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Juventus</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>3 - 2</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 At. Madrid
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat win">W</div>
									</td>
								</tr>
							</tbody>
						</table>
						<h5>Coppa Italia</h5>
						<table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										21/03
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Atalanta</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>3 - 0</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Juventus
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat lose">L</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
			  </div>
			  <div class="col-xs-12 pd-0">
					<div class="lm">
						<div class="col-xs-12 pd-0">
							<h4 class="inline">Last Match </h4>
							&nbsp; <img src="{{('assets/img/milan.png')}}" height="24px" alt=""> <strong>Ac Milan</strong>
						</div>
						<div class="liner"></div>
						<h5>Serie A</h5><table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										11/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Ac Milan
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>1 - 1</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Napoli
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat draw">D</div>
									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										13/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>Lazio</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>2 - 1</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Ac Milan
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat lose">L</div>
									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										11/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Bologna
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>1 - 2</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 <strong>Ac Milan</strong>
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat win">W</div>
									</td>
								</tr>
								<tr>
									<td width="45" class="text-date">
										13/05
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 Ac Milan
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>2 - 2</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Bologna
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat draw">D</div>
									</td>
								</tr>
							</tbody>
						</table>
						<h5>Coppa Italia</h5>
						<table class="table table-striped custab mb-10">
							<tbody>
								<tr>
									<td width="45" class="text-date">
										21/03
									</td>
									<td>
										<div class="col-xs-4 pd-0">
											<p class="text-right">
												 <strong>AS Roma</strong>
											</p>
										</div>
										<div class="col-xs-4 plr5 text-center">
											<strong>1 - 0</strong>
										</div>
										<div class="col-xs-4 pd-0">
											<p class="text-left">
												 Ac Milan
											</p>
										</div>
									</td>
									<td width="45" class="text-center">
										<div class="bdstat lose">L</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
			  </div>
		  	</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
    @include('partials.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
		  $("#todiv1").click(function() {
			$("#div1").show();
			$("#div2").hide();
			$("#div3").hide();
			$("#div4").hide();
		  });
		});
	</script>
	<script>
		$(document).ready(function() {
		  $("#todiv2").click(function() {
			$("#div2").show();
			$("#div1").hide();
			$("#div3").hide();
			$("#div4").hide();
		  });
		});
	</script>
	<script>
		$(document).ready(function() {
		  $("#todiv3").click(function() {
			$("#div3").show();
			$("#div1").hide();
			$("#div2").hide();
			$("#div4").hide();
		  });
		});
	</script>
	<script>
		$(document).ready(function() {
		  $("#todiv4").click(function() {
			$("#div4").show();
			$("#div1").hide();
			$("#div2").hide();
			$("#div3").hide();
		  });
		});
	</script>

</body>
</html>
