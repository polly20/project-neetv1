@extends('layout.main')

@section('content')
<div class="jumbotron">
  <h1>Set your question</h1>
  <p class="lead">This example is a quick exercise to create a question.</p>
  <form action="/v1/teacher/question/execute" method="post">
 {{ csrf_field() }}
    <div class="form-group">
      <label for="subject">Subject:</label>
      <select class="form-control" id="subject" name="subject">
       <option value="1">Biology</option>
       <option value="2">Chemistry</option>
       <option value="3">Physics</option>
     </select>
    </div>
    <div class="form-group">
      <label for="question">Question:</label>
      <textarea type="text" class="form-control" id="question" name="question"></textarea>
    </div>
    <div style="width: 100%;">
      <button type="submit" class="btn btn-primary pull-right">Next &raquo;</button>
    </div>
  </form>
</div>
<script>

// $(document).ready( function() {
//     $.ajax({
//         url: "http://neet.dev.local/v1/teacher/get-biology/4",
//         dataType: "text",
//         beforeSend: function () {
//           $("#question").val("Please wait....");
//         },
//         success: function(parseJson) {
//               var json = $.parseJSON(parseJson);
//               $(json.data).each(function(k, v) {
//                   $("#question").val(v.question);
//               })
//         }
//     });
//   } )

</script>
@endsection
