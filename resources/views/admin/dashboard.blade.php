@extends('layout.app')
<?php
$ssl = false;
?>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css', $ssl) }}">
@endsection

@section('content')
<section class="content">
    <header class="content__title">
        <h1>Dashboard</h1>
        <small>Welcome to the unique SuperAdmin web app experience!</small>
    </header>

    <div class="row quick-stats">
        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>987,459</h2>
                    <small>Total Leads Recieved</small>
                </div>

                <div class="quick-stats__chart peity-bar">6,4,8,6,5,6,7,8,3,5,9</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>356,785K</h2>
                    <small>Total Website Clicks</small>
                </div>

                <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>$58,778</h2>
                    <small>Total Sales Orders</small>
                </div>

                <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2>214</h2>
                    <small>Total Support Tickets</small>
                </div>

                <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Server Process</h4>
            <h6 class="card-subtitle">Maecenas faucibus mollis interdum porttitor</h6>

            <div class="flot-chart flot-dynamic"></div>
            <div class="flot-chart-legends flot-chart-legends--dynamic"></div>
        </div>
    </div>

    <footer class="footer hidden-xs-down">
        <p>© NEET101 Admin. All rights reserved.</p>

        <ul class="nav footer__nav">
            <a class="nav-link" href="">Homepage</a>

            <a class="nav-link" href="">Company</a>

            <a class="nav-link" href="">Support</a>

            <a class="nav-link" href="">News</a>

            <a class="nav-link" href="">Contacts</a>
        </ul>
    </footer>
</section>
@endsection

@section('scripts')
    <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js', $ssl) }}"></script>
    <script src="{{ asset('js/jquery.flot.js', $ssl) }}"></script>
    <script src="{{ asset('js/jquery.peity.min.js', $ssl) }}"></script>
    <script src="{{ asset('demo/js/flot-charts/dynamic.js', $ssl) }}"></script>
    <script src="{{ asset('demo/js/other-charts.js', $ssl) }}"></script>
@endsection
