@extends('layout.main')

@section('content')
<div class="jumbotron">
  <h1>Set your question</h1>
  <p class="lead">This example is a quick exercise to create a question.</p>

  <form action="/v1/teacher/question/execute">

    <div class="form-group">
      <label for="email">Subject:</label>
      <select class="form-control" id="subject" name="subject">
       <option value="1">Biology</option>
       <option value="2">Chemistry</option>
       <option value="3">Physics</option>
     </select>
    </div>

    <div class="form-group">
      <label for="pwd">Question:</label>
      <textarea type="password" class="form-control" id="question" name="question"></textarea>
    </div>

    <div style="width: 100%;">
      <button type="submit" class="btn btn-primary pull-right">Next &raquo;</button>
    </div>

  </form>

</div>
@endsection
