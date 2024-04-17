@extends('frontend.layouts.app')

@section('content')

<main class="main_container" id="mainContainer">
    <div class="login_page mt_1">
        <div class="login_form">
            <form method="POST" role="form" action="{{ route('login') }}">
                @csrf
                <h1 class="primary center">Welcome to Mirror Me Fashion</h1>
                <h2 class="center mt_1">Login to your account.</h2>
                <input type="email" name="email" required placeholder="Email" id="loginEmail" autocomplete="off" />
                @if ($errors->has('email'))
                <span class="invalid_feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
                <input class="login_password" type="password" required placeholder="Password" name="password" id="pass" autocomplete="off" />
                <img src="{{static_asset('assets/img/login/hide_pass.png')}}" onclick="togglePasswordVisibility()" id="showPassWord">
                <span id="vaildPass"></span>
                @if ($errors->has('password'))
                <span class="invalid_feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
                <div class="action">
                    <div class="form_group">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="">Remember Me</label>

                    </div>
                    <div class="forget_pass">
                        @if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null)
                        @endif

                        <a href="{{ route('password.request') }}" class="message">{{translate('Forgot password ?')}}</a>
                    </div>
                </div>
                <button type="submit">SIGN IN</button>

            </form>
        </div>
    </div>
</main>



@endsection


