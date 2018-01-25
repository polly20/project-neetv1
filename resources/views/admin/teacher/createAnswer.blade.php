@extends('layout.main')

@section('content')
<div class="jumbotron">
  <h1>Your question</h1>
  <p class="lead">{!! $question["Question"] !!}</p>

  <form action="/v1/teacher/answer/execute"  method="get">

    <input type="text" class="form-control" id="id" name="question" value="{!! $question["Id"] !!}">

    <div class="form-group">
      <label for="pwd">Answer A:</label>
      <input type="text" class="form-control" id="a" name="answers[]" placeholder="Enter your answer for A">
    </div>

    <div class="form-group">
      <label for="pwd">Answer B:</label>
      <input type="text" class="form-control" id="b" name="answers[]" placeholder="Enter your answer for B">
    </div>

    <div class="form-group">
      <label for="pwd">Answer C:</label>
      <input type="text" class="form-control" id="c" name="answers[]" placeholder="Enter your answer for C">
    </div>

    <div class="form-group">
      <label for="pwd">Answer D:</label>
      <input type="text" class="form-control" id="c" name="answers[]" placeholder="Enter your answer for D">
    </div>

    <div class="form-group">
      <label for="email">Right Answer:</label>
      <select class="form-control" id="answer" name="answer">
       <option value="0">Answer A</option>
       <option value="1">Answer B</option>
       <option value="2">Answer C</option>
       <option value="3">Answer D</option>
     </select>
    </div>

    <div style="width: 100%;">
      <button type="submit" class="btn btn-primary pull-right">Next &raquo;</button>
    </div>

  </form>

</div>
@endsection
