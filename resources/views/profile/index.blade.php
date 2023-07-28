@include('partials.header_portal')
</head>

<body>
	<div class="">
        @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')

	  <div class="page-content mt-10">

  			<div class="part">
		  		<div class="pt-title">Your Account</div>
		  		<img class="unite" src="{{('assets/img/slash.png')}}" alt=""/>

				<div class="col-xs-12 mt-15 pd-0">
					<div class="col-xs-6 mt-10">
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
							</div>
							<div class="avatar-preview">
								<div id="imagePreview" style="background-image: url('assets/img/acc-sample.png');">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="r-coin">
							<i class="fas fa-coins fasco"></i>&nbsp; <span>240</span>
							<p>Your Coins</p>
						</div>
						<div class="chk-reward">
							<a href="{{route('reward')}}" class="btn btn-default chk">
								<i class="fas fa-gift"></i>&nbsp; Check Reward
							</a>
							<a href="{{route('profile_contest_history')}}" class="btn btn-default cts mt-5">
								<i class="fas fa-futbol"></i>&nbsp; Contest History
							</a>
						</div>
					</div>
					
					<div class="clearfix"></div>
					<div class="col-xs-6">
						<div class="pt-input">
							<label for="pt-user">First Name</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['first_name']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="pt-input">
							<label for="pt-user">Last Name</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['last_name']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user">Email Address</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['email']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user">Country Residence</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['country']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user">Phone Number</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['msisdn']}}</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="liner"></div>
				<div class="col-xs-12 pd-0">
					<!-- <div class="col-xs-12 mt-10">
						<div class="pt-input">
							<div class="col-xs-12 pd-0">
								<label for="pt-user">Favorite Club</label>
							</div>

							<div class="col-xs-4">
								<img src="{{('assets/img/juventus_black.png')}}" width="50" alt=""/>
							</div>
							<div class="col-xs-8">
								<h4 class="mt-10 bg-f5">Juventus</h4>
							</div>
						</div>
					</div> -->
					<!-- <div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user">Country Residence</label>
							<div class="">
								<h4 class="mt-10 bg-f5">{{$user_details['India']}}</h4>
							</div>
						</div>
					</div> -->
					<div class="col-xs-12 mt-10">
						<a href="{{url('/logout')}}">
							<button type="button" class="btn-sign">Logout</button>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
		  	</div>
	  </div>
	</div>
	@include('partials.footernew')
    @stack('location')
</body>
</html>
