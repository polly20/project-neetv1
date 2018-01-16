@extends('layout.main')

@section('content')
<div class="jumbotron">
  <h1>Your question</h1>
  <p class="lead">{!! $question["Question"] !!}</p>

  <form action="/v1/teacher/question/execute">

    <div class="form-group">
      <label for="pwd">Answer A:</label>
      <input type="text" class="form-control" id="email">
    </div>

    <div class="form-group">
      <label for="pwd">Answer B:</label>
      <input type="text" class="form-control" id="email">
    </div>

    <div class="form-group">
      <label for="pwd">Answer C:</label>
      <input type="text" class="form-control" id="email">
    </div>

    <div class="form-group">
      <label for="pwd">Answer D:</label>
      <input type="text" class="form-control" id="email">
    </div>


    <div class="form-group">
      <label for="email">Right Answer:</label>
      <select class="form-control" id="subject" name="subject">
       <option value="1">Answer A</option>
       <option value="2">Answer B</option>
       <option value="3">Answer C</option>
       <option value="3">Answer D</option>
     </select>
    </div>

    <div style="width: 100%;">
      <button type="submit" class="btn btn-primary pull-right">Next &raquo;</button>
    </div>



  </form>

</div>
@endsection
