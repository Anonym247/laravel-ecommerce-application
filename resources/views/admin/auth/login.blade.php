<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <title>Login - {{ config('app.name')  }}</title>
</head>
<body>
<section class="material-half-bg">
    <div class="hover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>{{ config('app.name') }}</h1>
    </div>

    <div class="login-box">
        <form action="{{route('admin.login.post')}}" method="post" role="form" class="login-form" autocomplete="off">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label for="email" class="custom-control-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" autofocus value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="password" class="custom-control-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>

            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="remember"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>

        </form>
    </div>
</section>

<script src="{{asset('backend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/js/popper.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/main.js')}}"></script>
<script src="{{asset('backend/js/plugins/pace.min.js')}}"></script>

</body>
</html>
