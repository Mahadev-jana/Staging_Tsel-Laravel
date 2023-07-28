<<aside class="aside aside-fixed">
  <div class="aside-header">
    {{-- <a href="{{url('admin/dashboard')}}" class="aside-logo"><img src="{{asset('admin_theme/images/logo.png')}}" width="80" alt="Logo"></a> --}}
    <a href="{{url('admin/dashboard')}}" class="aside-logo"><img class="img-fluid" src="{{asset('/assets/img/goaly-logo.png')}}" width="100" alt="Gemezz"></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">

    <ul class="nav nav-aside">
      <li class="nav-label">Main Menu</li>
      <li class="nav-item {{'admin/dashboard' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/dashboard')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dashboard</span></a></li>

      <!-- <li class="nav-label mg-t-25">Domain</li> -->
      <!-- <li class="nav-item {{'admin/domain/add'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/domain/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Team List</span></a></li> -->
      <li class="nav-item {{'admin/prediction'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/prediction')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Prediction Matches</span></a></li>

      <!-- <li class="nav-label mg-t-25">Game</li> -->
      <li class="nav-item {{'game/admin/create' == request()->path() ? 'active' : ''}}"><a href="{{route('predictionquestion')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Prediction Question</span></a></li>
      <!-- <li class="nav-item {{'game/admin/list' == request()->path() ? 'active' : ''}}"><a href="{{url('game/admin/list')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>User Prediction</span></a></li> -->


      <!-- <li class="nav-label mg-t-25">Category</li> -->
      <li class="nav-item {{'admin/banners' == request()->path() ? 'active' : ''}}"><a href="{{route('banner')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Banner</span></a></li>
      <li class="nav-item {{'admin/reward/list' == request()->path() ? 'active' : ''}}"><a href="{{route('rewardList')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Reward </span></a></li>


      <!-- <li class="nav-label mg-t-25">Competition</li> -->
      <li class="nav-item {{'admin/competition/addcompetition' == request()->path() ? 'active' : ''}}"><a href="{{route('userreward')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Reward Exchange</span></a></li>


      {{-- <li class="nav-label mg-t-25"><a href="{{url('admin/winners')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Winners</span></a></li> --}}

      {{-- <li class="nav-label mg-t-25"><a href="{{url('admin/leaderboard')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Leader Board</span></a></li> --}}

      <!-- <li class="nav-label mg-t-25">Reward</li> -->
      <!-- <li class="nav-item {{'/admin/reward/add' == request()->path() ? 'active' : ''}}"><a href="{{route('faq')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>FAQ</span></a></li> -->
      <!-- <li class="nav-item {{'admin/privacypolicy' == request()->path() ? 'active' : ''}}"><a href="{{route('privacy')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Privacy Policy</span></a></li> -->

      <!-- <li class="nav-label mg-t-25">Language</li> -->
      <li class="nav-item {{'admin/language/add' == request()->path() ? 'active' : ''}}"><a href="{{route('termservices')}}" class="nav-link"><i data-feather="plus-circle"></i><span>Terms Of Service </span></a></li>
      <!-- <li class="nav-item {{'admin/language/all' == request()->path() ? 'active' : ''}}"><a href="{{route('prizelist')}}" class="nav-link"><i data-feather="bar-chart-2"></i><span> Prize List</span></a></li> -->

      {{-- <li class="nav-label mg-t-25">User</li> --}}
      {{-- <li class="nav-item"><a href="{{url('admin/domain/add')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add</span></a></li> --}}
      <!-- <li class="nav-item {{'admin/users' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/users')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>How To Play</span></a></li> -->

      <!-- <li class="nav-item {{'admin/users' == request()->path() ? 'active' : ''}}"><a href="{{url('admin/banners')}}" class="nav-link"><i data-feather="bar-chart-2"></i><span>Contest TOC </span></a></li> -->

      <li class="nav-item {{'admin/winners/managment' == request()->path() ? 'active' : ''}}"><a href="{{route('name')}}" class="nav-link"><i data-feather="bar-chart-2"></i><span>Winner Management</span></a></li>


      <!-- <li class="nav-item {{'admin/winners' == request()->path() ? 'active' : ''}}"><a href="{{route('winners')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>Winner List</span></a></li> -->
      <li class="nav-item {{'admin/users' == request()->path() ? 'active' : ''}}"><a href="{{route('news')}}" class="nav-link"><i data-feather="bar-chart-2"></i> <span>News Management</span></a></li>

    </ul>
  </div>
  </aside>