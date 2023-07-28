@include('partials.header_portal')
</head>

<body>
	<div class="">
         @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')
	  <div class="page-content mt-10">
			<!-- News -->
			<div class="col-xs-12 ct">
				<div class="mb-10">
					<div class="part ml15">
						<div class="pt-title">
							<a href="{{route('leaderboard')}}" class="text-white">back</a>
						</div>
						<img class="unite" src="{{('assets/img/slash.png')}}" alt="">
					</div>
					<div class="">
					<div class="pb-0">
						<div class="lead-info mb-0">
							<h5>
								Contest: Juventus Vs Milan
							</h5>
						</div>
					</div>
					<div class="leaderboard">
						<div class="table-responsive">
							<table class="table v2">
								<tbody>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">1.</span> Debasish Midya
										</div>
										<div class="mid">
											<hr width="90%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 2100 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">01:57:72</p>
											<!--<p class="badge text-small clr-orange">Attempt</p>
											<p class="mt-3">17 / 20</p>-->
										</div>
									</td>

									<td class="text-coin">550 Coin</td>
								  </tr>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default2.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">2.</span> Aldo
										</div>
										<div class="mid">
											<hr width="70%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 1500 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">02:14:36</p>
										</div>
									</td>

									<td class="text-coin">540 Coin</td>
								  </tr>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">3.</span> Fajar
										</div>
										<div class="mid">
											<hr width="50%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 1200 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">03:41:11</p>
										</div>
									</td>

									<td class="text-coin">280 Coin</td>
								  </tr>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">4.</span> Gondo
										</div>
										<div class="mid">
											<hr width="45%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 1100 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">03:57:22</p>
											<!--<p class="badge text-small clr-orange">Attempt</p>
											<p class="mt-3">17 / 20</p>-->
										</div>
									</td>

									<td class="text-coin">250 Coin</td>
								  </tr>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">5.</span> Revataka
										</div>
										<div class="mid">
											<hr width="35%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 900 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">04:14:36</p>
										</div>
									</td>

									<td class="text-coin">240 Coin</td>
								  </tr>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{('assets/img/acc-default2.png')}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">6.</span> String Fellow
										</div>
										<div class="mid">
											<hr width="20%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> 700 </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">05:08:31</p>
										</div>
									</td>

									<td class="text-coin">150 Coin</td>
								  </tr>
								</tbody>
							</table>
						</div>
						<a href="{{route('contest')}}" class="btn btn-primary btn-round wd100">
							<strong>Play Again</strong>
						</a>
						<a href="{{route('reward')}}" class="btn btn-primary btn-reg wd100 mt-10">
							<strong>Reward</strong>
						</a>
					</div>

					<div class="clearfix"></div>
				</div>
				</div>

		  	</div>
	  </div>
	</div>
	@include('partials.footernew')
    @stack('toggleIcon')
</body>
</html>
