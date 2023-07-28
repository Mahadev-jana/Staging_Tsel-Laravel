<!-- <div class="menu">
    <div class="menu-link">
        <a href="{{route('home')}}"><img src="{{ asset('assets/img/icon-menu-home.png') }}"></a>
        <span class="text-grey">Home</span>
    </div>    
    <div class="menu-link">
        <a href="{{route('contest')}}"><img src="{{ asset('assets/img/Group 162.png') }}"></a>
        <span class="text-purple">Contest</span>
    </div>
    <div class="menu-link">
        <a href="{{route('matches')}}"><img src="{{ asset('assets/img/Group 168.png') }}"></a>
        <span class="text-grey">Matches</span>
    </div>
    <div class="menu-link">
        <a href="{{route('league')}}"><img src="{{ asset('assets/img/Group 167.png') }}"></a>
        <span class="text-grey">League</span>
    </div>
    <div class="menu-link">
        <a href="{{route('news')}}"><img src="{{ asset('assets/img/Group 166.png') }}"></a>
        <span class="text-grey">News</span>
    </div>
</div> -->
<div class="menu">
    <div class="menu-link {{ request()->route()->getName() === 'home' ? 'active' : '' }}">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/icon-menu-home' . (request()->route()->getName() === 'home' ? '-active' : '') . '.png') }}"></a>
        <span class="{{ request()->route()->getName() === 'home' ? 'text-purple' : 'text-grey' }}">Home</span>
    </div>    
    <div class="menu-link {{ request()->route()->getName() === 'contest' ? 'active' : '' }}">
        <a href="{{ route('contest') }}"><img src="{{ asset('assets/img/Group 169' . (request()->route()->getName() === 'contest' ? '-active' : '') . '.png') }}"></a>
        <span class="{{ request()->route()->getName() === 'contest' ? 'text-purple' : 'text-grey' }}">Contest</span>
    </div>
    <div class="menu-link {{ request()->route()->getName() === 'matches' ? 'active' : '' }}">
        <a href="{{ route('matches') }}"><img src="{{ asset('assets/img/Group 168' . (request()->route()->getName() === 'matches' ? '-active' : '') . '.png') }}"></a>
        <span class="{{ request()->route()->getName() === 'matches' ? 'text-purple' : 'text-grey' }}">Matches</span>
    </div>
    <div class="menu-link {{ request()->route()->getName() === 'league' ? 'active' : '' }}">
        <a href="{{ route('league') }}"><img src="{{ asset('assets/img/Group 167' . (request()->route()->getName() === 'league' ? '-active' : '') . '.png') }}"></a>
        <span class="{{ request()->route()->getName() === 'league' ? 'text-purple' : 'text-grey' }}">League</span>
    </div>
    <div class="menu-link {{ request()->route()->getName() === 'newss' ? 'active' : '' }}">
        <a href="{{ route('newss') }}"><img src="{{ asset('assets/img/Group 166' . (request()->route()->getName() === 'newss' ? '-active' : '') . '.png') }}"></a>
        <span class="{{ request()->route()->getName() === 'newss' ? 'text-purple' : 'text-grey' }}">News</span>
    </div>
</div>