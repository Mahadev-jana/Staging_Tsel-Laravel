@include('partials.header')
</head>

<body>
	<div class="">
       @include('partials.topmenu')

		<div class="clearfix"></div>
		  {{--<?php include('inc_leftmenu.php'); ?>--}}
          @include('partials.sidebar')

	  <div class="page-content mt-10">
			<!-- Menu Cat -->
			<div class="col-xs-12 main-cat">
				<div class="well">
				<form>
					<fieldset>
						<div class="form-group">
							<input type="text" class="form-control" name="query" id="query" placeholder="">
						</div>
						<div class="text-center">
							<!--<button type="submit" class="btn btn-primary btn-round">Search</button>-->
							<a href="{{route('search_result')}}" class="btn btn-primary btn-round">Search</a>
						</div>
					</fieldset>
				</form>
				</div>
			</div>
		  	<div class="clearfix"></div>
	  </div>
	</div>
	@include('partials.footer')
    @stack('location')


</body>
</html>
