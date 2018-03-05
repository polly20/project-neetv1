@extends('layout.app')
<?php
  $ssl = false;
?>

@section('css')
<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css', $ssl) }}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css', $ssl) }}">
<link rel="stylesheet" href="{{ asset('css/jquery.scrollbar.css', $ssl) }}">
@endsection

@section('content')
<section class="content">
    <header class="content__title">
        <h1>Subject Lists</h1>

        <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item">Refresh</a>
                        <a href="" class="dropdown-item">Manage Widgets</a>
                        <a href="" class="dropdown-item">Settings</a>
                    </div>
                </div>
            </div>
    </header>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Subject Lists</h4>
            <h6 class="card-subtitle">Just click the <code>row</code> to show all the <code>questions</code>.</h6>
            <table id="tbl_subjects" class="table table-hover mb-0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Total Questions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <th scope="row" data-url="/question/subject/biology">1</th>
                      <td>BIO</td>
                      <td>BIOLOGY</td>
                      <td>25,124</td>
                  </tr>
                  <tr>
                      <th scope="row" data-url="/question/subject/chemistry">2</th>
                      <td>CHE</td>
                      <td>CHEMISTRY</td>
                      <td>35,875</td>
                  </tr>
                  <tr>
                      <th scope="row" data-url="/question/subject/physics">3</th>
                      <td>PHY</td>
                      <td>PHYSICS</td>
                      <td>87,541</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer hidden-xs-down">
        <p>© NEET101 Admin 2.0. All rights reserved.</p>

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
<script src="{{ asset('js/jquery.min.js', $ssl) }}"></script>
<script src="{{ asset('popper.js/dist/umd/popper.min.js', $ssl) }}"></script>
<script src="{{ asset('js/bootstrap.min.js', $ssl) }}"></script>
<script src="{{ asset('js/jquery.scrollbar.min.js', $ssl) }}"></script>
<script src="{{ asset('js/jquery-scrollLock.min.js', $ssl) }}"></script>
<script>
$(document).ready(function() {
  $('#tbl_subjects tr').click(function() {
      var href = $(this).find("th").attr("data-url");
      if(href) {
          window.location = href;
      }
  });
});
</script>
@endsection
