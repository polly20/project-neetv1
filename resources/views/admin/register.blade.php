<?php
$ssl = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body data-sa-theme="1">
<div class="login">
    <div class="page-loader">
        <div class="page-loader__spinner">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <!-- Register -->
    <div class="login__block active" id="l-register">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Create an account

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/login">Already have an account?</a>
                        {{--<a class="dropdown-item" href="">Forgot password?</a>--}}
                    </div>
                </div>
            </div>
        </div>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="login__block__body">
                <div class="form-group">
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group--centered">
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email Address" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group form-group--centered">
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Confirm Password" name="password_confirmation" required>
                </div>

                {{--<div class="form-group">--}}
                {{--<label class="custom-control custom-checkbox">--}}
                {{--<input type="checkbox" class="custom-control-input">--}}
                {{--<span class="custom-control-indicator"></span>--}}
                {{--<span class="custom-control-description">Accept the license agreement</span>--}}
                {{--</label>--}}
                {{--</div>--}}

                <button type="submit" class="btn btn--icon login__block__btn">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>

        </form>

    </div>

    <!-- Forgot Password -->
    <div class="login__block" id="l-forget-password">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Forgot Password?

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                        <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <p class="mb-5">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="form-group">
                <input type="text" class="form-control text-center" placeholder="Email Address">
            </div>

            <a href="index.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></a>
        </div>
    </div>
</div>

<!-- Javascript -->
<!-- Vendors -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- App functions and actions -->
<script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>