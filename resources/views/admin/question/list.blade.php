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
    <h1>Subject {{ $subject["name"] }}</h1>

    <div class="actions">
      <a href="{{ url('/question/subject/add/' . $subject['name']) }}" class="actions__item zmdi zmdi-plus-circle"></a>
      <a href="{{ url('/question/subject/' . $subject['name']) }}" class="actions__item zmdi zmdi-refresh"></a>

      <!-- <div class="dropdown actions__item">
        <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="" class="dropdown-item">Refresh</a>
          <a href="" class="dropdown-item">Manage Widgets</a>
          <a href="" class="dropdown-item">Settings</a>
        </div>
      </div> -->
    </div>
  </header>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Question Lists</h4>
      <!-- <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->

      <div class="table-responsive">
        <table id="data-table-questions" class="table">
        <thead>
          <tr>
            <th style="width: 80px;">#</th>
            <th style="width: 200px;">Subject</th>
            <th>Question</th>
            <th style="width: 130px;">Status</th>
            <th style="width: 130px;">Date Added</th>
            <th style="width: 150px;">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
    </div>
  </div>

  <footer class="footer hidden-xs-down">
    <p>© Super Admin Responsive. All rights reserved.</p>
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
<script src="{{ asset('js/jquery.dataTables.min.js', $ssl) }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js', $ssl) }}"></script>
<script src="{{ asset('js/buttons.print.min.js', $ssl) }}"></script>
<script src="{{ asset('js/jszip.min.js', $ssl) }}"></script>
<script src="{{ asset('js/buttons.html5.min.js', $ssl) }}"></script>
<script>
  $(document).ready(function() {
    var subject = "{{ $subject['name'] }}";

    var subject_id = 0;
    switch (subject) {
      case "biology":
        subject_id = 1;
        break;
      case "chemistry":
        subject_id = 2;
        break;
      default:
        subject_id = 3;
        break;

    }

    var url = '/question/subject/get/' + subject_id;
    $.ajax({
        dataType: 'json',
        type:'GET',
        url: url,
        beforeSend: function () {
          console.log("Thinking...");
        }
    }).done(function(json){
        console.log(json);
        if(json.status == 200) {
          var html = "";
          $(json.data).each(function(k, d) {
            // console.log(d);
            html+="<tr>";
            html+="<td>"+d.Id+"</td>";
            html+="<td>"+d.subject_id+"</td>";
            html+="<td>"+d.question +"</td>";
            html+="<td>"+d.status+"</td>";
            html+="<td>"+d.created_at+"</td>";
            html+="<td>";
            html+="<a href='#' class='actions__item zmdi zmdi-edit' title='Edit'></a>";
            html+="<a href='#' class='actions__item zmdi zmdi-delete' title='Delete'></a>";
            html+="</td>";
            html+="</tr>";
          });
          // console.log(html);
          $("#data-table-questions > tbody").empty().prepend(html);
        }
    });

  });

</script>
@endsection
