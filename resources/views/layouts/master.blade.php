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
<body class="bg-grey">
    <div id="app">
        @include('layouts.nav')
        
        <div class="container-fluid no-overflow" >
            <div class="cms-navigation col-lg-2 col-md-2 col-xs-12 vertical-scrollbar no-overflow-x reset-padding bg-main full-height shadow-xs ">

                <div class="row space-inside-up-md ">


                    <!-- content divider -->

                    <div style="height: 4px;" class="col-lg-12 col-md-12 space-inside-xs">
                        <div style="height: 4px;" class="bg-tertiary-darken-xs border-dark border-top"></div>
                    </div>
                    <!-- end of content divider -->

                    @include('layouts.menu')

                    <!-- end of navigation -->
                </div>    
            </div>
            <div class="col-lg-2 col-md-2"></div>


            <!--  all content -->
            <div  class="body transition-normal col-lg-10 col-md-10 col-xs-12 reset-padding bg-grey">
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 space-outside-down-sm">
                        @yield('content')
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript" src="/js/app.js?{{ rand() }}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>