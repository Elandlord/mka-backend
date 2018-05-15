<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="login-background">
    <div class="houses-left"></div>
    <div class="houses-right"></div>
    <div class="container space-outside-up-lg">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 space-inside-md">
                <div class="image">
                    <img src="/images/logo-mijnkantoorapp.svg" />            
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-3 shadow-sm reset-padding border-curved" style="background-color: #F3F6F8">
                <div class="bg-light space-outside-down-md border-curved  space-inside-sm">
                    <h2 class="space-inside-xs text-color-main text-center" style="font-size: 24px;">Inloggen • <strong>beheersysteem</strong></h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">                  
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} border-none" style="height: 65px;" placeholder="Emailadres" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong class="space-outside-up-sm">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 col-lg-offset-2 space-outside-up-sm space-outside-down-md">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} border-none" style="height: 65px;" placeholder="Wachtwoord" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong class="space-outside-up-sm">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 col-lg-offset-2 space-outside-down-lg">
                                    <button type="submit" class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light full-width text-bold space-inside-down-sm">
                                        {{ __('Login') }}
                                        <i class="material-icons" style="position: relative; top: 7px; left: 10px;">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-grey border-curved space-inside-md"></div>
           </div>
        </div>
    </div>
</body>

