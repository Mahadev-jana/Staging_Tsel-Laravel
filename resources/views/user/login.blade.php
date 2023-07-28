<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/util.css') }}">
    
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <title>Login</title>

    <style>
        .login-wrapper {
            background-image: url('assets/img/bg_login.png');
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            background-size: cover;
        }
        .login-wrapper::before {
            content: '';
            background-image: url('assets/img/login_purple_layer.png');
            background-repeat: no-repeat;
            background-position: top left;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 1;
        }
        .login-logo {
            position: relative;
            z-index: 9;
        }
        .login-card {
            background-color: #FFFFFF;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            border-radius: 5px;
            padding: 24px 18px;
            position: relative;
            z-index: 9;
        }
        a {
            color: #7CD327;
        }
        .login-box-shadow {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.18)
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="container">
            <div class="login-logo text-center" style="margin-top: 40px; margin-bottom: 30px;">
                <img src="{{('assets/img/logo_white.png')}}" alt="Logo"/>
            </div>
            <div class="login-card">
                <div style="margin-bottom: 24px;">
                    <h3 class="mt-0" style="font-weight: bold;">Login</h3>
                    <p class="mb-0" style="opacity: 0.8;">Sign in to continue</p>
                </div>

                @if(Session::has('flash_message_error'))
		            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
		                {{ Session::get('flash_message_error') }}
		            </p>
	            @endif

                <form action="{{ url('/userSubmit') }}" method="post">
                	@csrf
                    <input type="text" class="form-control mb-2 login-box-shadow" name="login" placeholder="Phone Number">
                    
                    <button class="btn btn-block bg-green btn-success login-box-shadow mb-2" style="font-weight: bold;">Login</button>
                    <p class="text-center mb-0">Don't have an account? <a href="{{route('register')}}">Create one</a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>