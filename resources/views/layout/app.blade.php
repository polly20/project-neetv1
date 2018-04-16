<?php
  $ssl = false;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Neet101 Admin 2.0</title>
        @yield('css')
        <link rel="stylesheet" href="{{ asset('css/app.css', $ssl) }}">
        <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css', $ssl) }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css', $ssl) }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.scrollbar.css', $ssl) }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- <script type="text/javascript" async
          src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML">
        </script> -->

        <!-- <script type="text/javascript" async
          src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML">
        </script> -->

    </head>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            @include('admin.header')

            @include('admin.sidebar')

            @yield('content')
        </main>
    </body>


    <script src="{{ asset('js/jquery.min.js', $ssl) }}"></script>
    <script src="{{ asset('js/jquery.scrollbar.min.js', $ssl) }}"></script>
    <script src="{{ asset('js/jquery-scrollLock.min.js', $ssl) }}"></script>

    @yield('scripts')

    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <!-- App functions and actions -->
    <script src="{{ asset('js/app.min.js', $ssl) }}"></script>
    <script src="{{ asset('js/neet.js', $ssl) }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

</html>
