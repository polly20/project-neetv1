@extends('layout.app')
<?php
  $ssl = false;
?>

@section('css')

<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css', $ssl) }}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css', $ssl) }}">
<link rel="stylesheet" href="{{ asset('css/jquery.scrollbar.css', $ssl) }}">
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css', $ssl) }}">
@endsection

@section('content')
<section class="content">
   <div class="content__inner">
       <!-- <header class="content__title">
           <h1>Form Elements</h1>

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
       </header> -->

       <div class="card">
           <div class="card-body">
             <div class="actions">
                 <!-- <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                 <a href="" class="actions__item zmdi zmdi-check-all"></a> -->

                 <div class="dropdown actions__item">
                     <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                     <div class="dropdown-menu dropdown-menu-right">
                         <a href="#" onclick="location.reload();" class="dropdown-item">Reset</a>
                     </div>
                 </div>
             </div>

               <h4 class="card-title">Question</h4>
               <h6 class="card-subtitle">Form control which supports multiple lines of text. Change 'rows' attribute as necessary.</h6>

               <div class="form-group">
                   <textarea class="form-control" rows="5" id="question" name="question" placeholder="Let us type some lorem ipsum...."></textarea>
                   <i class="form-group__bar"></i>
               </div>

           </div>
       </div>

       <div class="card">

           <div class="card-body">
               <h4 class="card-title">Multiple Answer Options</h4>
               <h6 class="card-subtitle">Form control which supports multiple lines of text. Change 'rows' attribute as necessary.</h6>
           </div>

           <div id="div_answer_options">
             <div class="card-body">
               <h4 class="card-title">Answer Option A</h4>
               <div class="tab-container">
                   <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" data-toggle="tab" href="#textA" role="tab" aria-expanded="true">Text</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#diagramA" role="tab" aria-expanded="false">Image Diagram</a>
                     </li>
                   </ul>
                   <div class="tab-content">
                       <div class="tab-pane fade active show" id="textA" role="tabpanel" aria-expanded="true">
                         <div class="form-group">
                           <p>Type Your Answer</p>
                           <textarea class="form-control" id="textareaA" name="options[]" rows="10" placeholder="Let us type some lorem ipsum...."></textarea>
                           <br />
                           <p>Type Your Answer Preview</p>
                           <iframe id="iframePreviewA" style="width: 100%;" frameBorder="0"></iframe>
                           <i class="form-group__bar"></i>
                         </div>
                       </div>
                       <div class="tab-pane fade" id="diagramA" role="tabpanel" aria-expanded="false">
                         <div class="form-group">
                           <p>Upload image diagram</p>
                           <input type="file" name="diagrams[]" accept=".jpg, .png, .jpeg" />
                           <i class="form-group__bar"></i>
                         </div>
                       </div>
                   </div>
               </div>
             </div>
           </div>
           <button id="btnAddOption" type="button" class="btn btn-light"><i class="zmdi zmdi-plus-circle"></i> Add Answer Option</button>
           <button id="btnNoAddOption" type="button" class="btn btn-light" style="display: none;"><i class="zmdi zmdi-plus-circle"></i> Add Answer Option</button>
           <p style="text-align:center; margin: 5px 0 5px 0;">OR</p>
           <button id="btnSave" type="button" class="btn btn-success"><i class="zmdi zmdi-check-all"></i> Save</button>
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
<script src="{{ asset('js/autosize.min.js', $ssl) }}"></script>
<script src="{{ asset('js/sweetalert2.all.js', $ssl) }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<script>

 //  ClassicEditor
 // .create( document.querySelector( '#textareaA' ) )
 // .catch( error => {
 //   console.error( error );
 //  });

  $(document).ready(function() {

    // var subject = "{{ $subject['name'] }}";
    // var subject_id = 0;
    // switch (subject) {
    //   case "biology":
    //     subject_id = 1;
    //     break;
    //   case "chemistry":
    //     subject_id = 2;
    //     break;
    //   default:
    //     subject_id = 3;
    //     break;
    // }

    $('#tbl_subjects tr').click(function() {
        var href = $(this).find("th").attr("data-url");
        if(href) {
            window.location = href;
        }
    });

    var letters = ['A', 'B', 'C', 'D'];
    var caches = [];
    var count = 1;
    $('#btnAddOption').click(function() {

      if(count >= letters.length) {
        return false;
      }

      if(count == (letters.length - 1)) {
        $("#btnAddOption").hide();
        $("#btnNoAddOption").show();
        $('#btnNoAddOption').click(function(){
          box_alert("Oops", "You cannot add more answer option.", "warning");
        });
      }

      caches[0] = $("#textareaA").val();
      caches[1] = $("#textareaB").val();
      caches[2] = $("#textareaC").val();
      caches[3] = $("#textareaD").val();

      var content = $("#div_answer_options").html();
      var text = "<div class='card-body'>";
      text += "<h4 class='card-title'>Answer Option "+ letters[count] +" | <a href='#'><i class='zmdi zmdi-delete'></i></a></h4>";
      text += "<div class='tab-container'>";
      text += "<ul class='nav nav-tabs' role='tablist'>";
      text += "<li class='nav-item'>";
      text += "<a class='nav-link active' data-toggle='tab' href='#text"+ letters[count] +"' role='tab' aria-expanded='true'>Text</a>";
      text += "</li>";
      text += "<li class='nav-item'>";
      text += "<a class='nav-link' data-toggle='tab' href='#diagram"+ letters[count] +"' role='tab' aria-expanded='false'>Image Diagram</a>";
      text += "</li>";
      text += "</ul>";

      text += "<div class='tab-content'>";

      text += "<div class='tab-pane fade active show' id='text"+ letters[count] +"' role='tabpanel' aria-expanded='true'>";
      text += "<div class='form-group'>";
      text += "<p>Type your answer</p>";
      text += "<textarea class='form-control' id='textarea"+ letters[count] +"' name='options[]' rows='5' placeholder='Let us type some lorem ipsum....'></textarea>";
      text += "<br /> ";
      text += "<p>Type Your Answer Preview</p>";
      text += "<iframe id='iframePreview"+ letters[count] +"' style='width: 100%;' frameBorder='0'></iframe>";
      text += "<i class='form-group__bar'></i>";
      text += "</div>";
      text += "</div>";

      text += "<div class='tab-pane fade' id='diagram"+ letters[count] +"' role='tabpanel' aria-expanded='false'>";
      text += "<div class='form-group'>";
      text += "<p>Upload image diagram</p>";
      text += "<input type='file' name='diagrams[]' accept='.jpg, .png, .jpeg' />";
      text += "<i class='form-group__bar'></i>";
      text += "</div>";
      text += "</div>";

      text += "</div";
      text += "</div";

      var new_content = content + text;
      $("#div_answer_options").empty().prepend(new_content);

      $( "#textareaA").keyup(function() {
        update_preview("A");
      });
      $( "#textareaB").keyup(function() {
        update_preview("B");
      });
      $( "#textareaC").keyup(function() {
        update_preview("C");
      });
      $( "#textareaD").keyup(function() {
        update_preview("D");
      });

      $("#textareaA").val(caches[0]);
      $("#textareaB").val(caches[1]);
      $("#textareaC").val(caches[2]);
      $("#textareaD").val(caches[3]);

      count++;
    });

    $('#btnSave').click(function() {
      var Q = $("#question").val();
      var A = $("#textareaA").val();
      var B = $("#textareaB").val();
      var C = $("#textareaC").val();
      var D = $("#textareaD").val();

      var url = '/question/add-with-answers-and-diagram';
      var data = { subject:subject_id, question:Q, A:A, B:B, C:C, D:D };
      $.ajax({
          dataType: 'json',
          type:'GET',
          url: url,
          data: data,
          beforeSend: function () {
            console.log("Sample.....");
          }
      }).done(function(json){
          console.log(json);
          if(json.status == 200) {
            box_alert("Good Job", "You have added question", "success");

            setInterval(function () { location.reload() }, 3000);
          }
      });
    })

    popuplate_preview();
    $( "#textareaA" ).keyup(function() {
      update_preview("A");
    });

  });

  function update_preview(letter) {
    var sample = $("#textarea" + letter).val();
    var url = '/charles/sample/mathjs/post';
    var data = { val : sample };
    $.ajax({
        dataType: 'json',
        type:'GET',
        url: url,
        data: data,
        beforeSend: function () {
          console.log("Sample.....");
        }
    }).done(function(json){
        console.log(json);
        if(json.status == 200) {
          popuplate_preview(letter, json.id);
        }
    });
  }

  function popuplate_preview(letter, id) {
    var sample = $("#textarea"+letter).val();
    var url = '/charles/sample/mathjs/get/'+id;
    console.log(letter);
    $("#iframePreview"+letter).attr("src", url);
  }

  function box_alert(title, message, type) {
    swal({
        title: title,
        text: message,
        type: type,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-sm btn-light',
        background: 'rgba(0, 0, 0, 0.96)'
    })
  }

  function one_time_password() {
    swal({
      title: 'Submit email to run ajax request',
      input: 'text',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: (mobile) => {
        return new Promise((resolve) => {
          setTimeout(() => {
            if (mobile === 'taken@example.com') {
              swal.showValidationError(
                'This email is already taken.'
              )
            }
            resolve()
          }, 2000)
        })
      },
      allowOutsideClick: () => !swal.isLoading()
    }).then((result) => {
      if (result.value) {
        swal({
          type: 'success',
          title: 'Ajax request finished!',
          html: 'Submitted email: ' + result.value
        })
      }
    })
  }
</script>

@endsection
