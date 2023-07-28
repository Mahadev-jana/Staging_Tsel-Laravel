<nav class="sideNav bgImg2" style="overflow: hidden;width: 200px;">
    <div>
        <div id="sidenavmenu" style="display: block;height: 100%;width: 520px;position: fixed;z-index: 1;">
            <div class="sidenav" style="background-color: rgb(77, 6, 83); width: 345px; height: 100%; overflow-x: hidden; padding-top: 0px; text-align: initial;">

                @php
                    $UserData = Session::get('UserId');
                @endphp
                
                <div class="sidenav-header block" style="text-align: center;background-color: #9c25a8;padding: 1em;">
                    <img src="{{ asset('assets/img/account.png') }}" alt="" style="width: 60px;">
                    <div class="my-1 text-white">
                        <span class="d-block">Demo Goaly</span>
                    </div>
                    <button class="btn btn-pill btn-success w-75 mt-1"><b>Subscibe</b></button>
                </div>
                
                <ul class="my-2" style="padding: 0;">

                    @if ($UserData)
                        <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('logout')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/logout.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;">Logout</a>
                    </li>
                    @else
                        <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('logined')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/login.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;">Login</a>
                    </li>
                    @endif


                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('home')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/contest.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;"> Contest</a>
                    </li>
                    <!-- <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('reward')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/reward.png') }}" alt="" srewardtyle="width: 25px;height: 25px;margin-right: 1em;"> Rewards</a>
                    </li> -->
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('leaderboard')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/leaderboard.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;"> Leaderboard</a>
                    </li>
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="javascript:void(0)" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/winners.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;">Winners</a>
                    </li>
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="javascript:void(0)" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/language.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;"> Language <span id="language">English</span></a>
                    </li>
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="{{route('faq')}}" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/faq.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;"> FAQ</a>
                    </li>
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="javascript:void(0)" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/privacypolicy.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;">Privacy policyyyy</a>
                    </li>
                    <li style="border-bottom: 1px solid #65156e;padding: 5px 0;">
                        <a href="javascript:void(0)" style="padding: 8px 8px 8px 32px;text-decoration: none;font-size: 11pt;color: #fff;display: block;"><img src="{{ asset('assets/img/term.png') }}" alt="" style="width: 25px;height: 25px;margin-right: 1em;">Terms of Service</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>