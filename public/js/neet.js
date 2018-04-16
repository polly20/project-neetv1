$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#c_subject_uid').change(function(){
        $('.class_number_group').fadeIn(1000);
    });

    $('#c_class_number').change(function(){
        $('.unit_number_group').fadeIn(1000, function() {
            $('.topic_name_group').fadeIn(1000);
        });
    });

    /** Question Panel **/
    $('#que_text_btn').click(function(){
        $('#que_text_btn_wrapper').show();
        $('#que_image_btn_wrapper').hide();
    });

    $('#que_image_btn').click(function(){
        $('#que_image_btn_wrapper').show();
        $('#que_text_btn_wrapper').hide();
    });

    $('#que_input').keyup(function(){
        var param = "que";
        var url = '/questions_preview/' + param;
        Cookies.set(param, $(this).val());
        $("#que_input_preview").attr("src", url);
    });

    /** Answer A Panel **/
    $('#ans_a_text_btn').click(function(){
        $('#ans_a_text_btn_wrapper').show();
        $('#ans_a_image_btn_wrapper').hide();
    });

    $('#ans_a_image_btn').click(function(){
        $('#ans_a_image_btn_wrapper').show();
        $('#ans_a_text_btn_wrapper').hide();
    });

    $('#input_ans_a').keyup(function(){
        var param = "ans_a";
        var url = '/questions_preview/' + param;
        Cookies.set(param, $(this).val());
        $("#input_ans_a_preview").attr("src", url);
    });

    /** Answer B Panel **/
    $('#ans_b_text_btn').click(function(){
        $('#ans_b_text_btn_wrapper').show();
        $('#ans_b_image_btn_wrapper').hide();
    });

    $('#ans_b_image_btn').click(function(){
        $('#ans_b_image_btn_wrapper').show();
        $('#ans_b_text_btn_wrapper').hide();
    });

    $('#input_ans_b').keyup(function(){
        var param = "ans_b";
        var url = '/questions_preview/' + param;
        Cookies.set(param, $(this).val());
        $("#input_ans_b_preview").attr("src", url);
    });

    /** Answer C Panel **/
    $('#ans_c_text_btn').click(function(){
        $('#ans_c_text_btn_wrapper').show();
        $('#ans_c_image_btn_wrapper').hide();
    });

    $('#ans_c_image_btn').click(function(){
        $('#ans_c_image_btn_wrapper').show();
        $('#ans_c_text_btn_wrapper').hide();
    });

    $('#input_ans_c').keyup(function(){
        var param = "ans_c";
        var url = '/questions_preview/' + param;
        Cookies.set(param, $(this).val());
        $("#input_ans_c_preview").attr("src", url);
    });

    /** Answer D Panel **/
    $('#ans_d_text_btn').click(function(){
        $('#ans_d_text_btn_wrapper').show();
        $('#ans_d_image_btn_wrapper').hide();
    });

    $('#ans_d_image_btn').click(function(){
        $('#ans_d_image_btn_wrapper').show();
        $('#ans_d_text_btn_wrapper').hide();
    });

    $('#input_ans_d').keyup(function(){
        var param = "ans_d";
        var url = '/questions_preview/' + param;
        Cookies.set(param, $(this).val());
        $("#input_ans_d_preview").attr("src", url);
    });

});

function notify(type, message){
    $.notify({
        icon: "",
        title: '',
        message: message,
        url: ''
    },{
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: {
            x: 20,
            y: 20
        },
        spacing: 10,
        z_index: 1031,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert">' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<button type="button" aria-hidden="true" data-notify="dismiss" class="close"><span>×</span></button>' +
        '</div>'
    });
}

function create_subject() {

    var subject_code = $('#c_subject_code').val();
    var subject_name = $('#c_subject_name').val();

    $.ajax({
        url: '/subjects/store',
        type: 'POST',
        data: {
            subject_code: subject_code, subject_name: subject_name
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);
            if(json.status == 200) {
                $('#c_subject_code').val("");
                $('#c_subject_name').val("");
                $('#btn-save-subject').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }else{
                $('#c_subject_code').val("");
                $('#c_subject_name').val("");
                $('#btn-save-subject').hide();
                $('.flash-message').empty().append('<p class = "failed">'+ json.result +'</p>');
            }
        }
    });
}

function edit_subject(subject_id) {
    $.ajax({
        url: '/subjects/edit/' + subject_id,
        type: 'GET',
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#u_subject_code').val(json.result[0]['subject_code']);
                $('#u_subject_name').val(json.result[0]['subject_name']);
                $('#u_subject_id').val(json.result[0]['Id']);
            }
        }
    });
}

function update_subject() {
    var subject_code = $('#u_subject_code').val();
    var subject_name = $('#u_subject_name').val();
    var subject_id = $('#u_subject_id').val();

    $.ajax({
        url: '/subjects/update',
        type: 'POST',
        data: {
            subject_id: subject_id, subject_code: subject_code, subject_name: subject_name
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#btn-update-subject').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }
        }
    });
}

function delete_subject(subject_id) {
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this subject record!',
        type: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonClass: 'btn btn-light',
        background: 'rgba(0, 0, 0, 0.96)'
    }).then(function(){
        $.ajax({
            url: '/subjects/delete/' + subject_id,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                var json = $.parseJSON(data);

                if(json.status == 404) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'warning',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-sm btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    });
                }

                if(json.status == 200) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    }).then(function(){
                        window.location.href = "/subjects";
                    });
                }
            }
        });
    }).catch(swal.noop);
}

function create_topic() {

    var subject_uid = $('#c_subject_uid').val();
    var syllabus_uid = $('#c_class_number').val();
    var unit_number = $('#c_unit_number').val();
    var topic_name = $('#c_topic_name').val();

    $.ajax({
        url: '/topics/store',
        type: 'POST',
        data: {
            subject_uid: subject_uid, syllabus_uid: syllabus_uid, unit_number: unit_number, topic_name: topic_name
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);
            if(json.status == 200) {
                $('#btn-save-topic').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }else{
                $('#btn-save-topic').hide();
                $('.flash-message').empty().append('<p class = "failed">'+ json.result +'</p>');
            }
        }
    });
}

function edit_topic(topic_id) {
    $.ajax({
        url: '/topics/edit/' + topic_id,
        type: 'GET',
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#u_subject_uid').val(json.result[0]['subject_uid']);
                $('#u_class_number').val(json.result[0]['syllabus_uid']);
                $('#u_unit_number').val(json.result[0]['unit_number']);
                $('#u_topic_name').val(json.result[0]['topic_name']);
                $('#u_topic_id').val(json.result[0]['Id']);
            }
        }
    });
}

function update_topic() {
    var subject_uid = $('#u_subject_uid').val();
    var syllabus_uid = $('#u_class_number').val();
    var unit_number = $('#u_unit_number').val();
    var topic_name = $('#u_topic_name').val();
    var topic_id = $('#u_topic_id').val();

    $.ajax({
        url: '/topics/update',
        type: 'POST',
        data: {
            topic_id: topic_id, subject_uid: subject_uid, syllabus_uid: syllabus_uid, unit_number: unit_number, topic_name: topic_name
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#btn-update-topic').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }
        }
    });
}

function delete_topic(topic_id) {

    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this topic record!',
        type: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonClass: 'btn btn-light',
        background: 'rgba(0, 0, 0, 0.96)'
    }).then(function(){

        $.ajax({
            url: '/topics/delete/' + topic_id,
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                var json = $.parseJSON(data);

                if(json.status == 404) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'warning',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-sm btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    });
                }

                if(json.status == 200) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    }).then(function(){
                        window.location.href = "/topics";
                    });
                }
            }
        });
    }).catch(swal.noop);


}

function create_sub_topic() {

    var sub_topic_name = $('#c_sub_topic_name').val();
    var topic_id = $('#c_topic_id').val();

    $.ajax({
        url: '/topics/store/sub',
        type: 'POST',
        data: {
            sub_topic_name: sub_topic_name, topic_id: topic_id
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);
            if(json.status == 200) {
                $('#btn-save-sub-topic').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }else{
                $('#btn-save-sub-topic').hide();
                $('.flash-message').empty().append('<p class = "failed">'+ json.result +'</p>');
            }
        }
    });
}

function edit_sub_topic(sub_topic_id) {
    $.ajax({
        url: '/topics/edit/' + sub_topic_id + '/sub',
        type: 'GET',
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#u_sub_topic_name').val(json.result[0]['sub_topic_name']);
                $('#u_sub_topic_id').val(json.result[0]['Id']);
            }
        }
    });
}

function update_sub_topic() {
    var sub_topic_name = $('#u_sub_topic_name').val();
    var sub_topic_id = $('#u_sub_topic_id').val();

    $.ajax({
        url: '/topics/update/sub',
        type: 'POST',
        data: {
            sub_topic_id: sub_topic_id, sub_topic_name: sub_topic_name
        },
        dataType: 'text',
        success: function (data) {
            var json = $.parseJSON(data);

            if(json.status == 200) {
                $('#btn-update-sub-subject').hide();
                $('.flash-message').empty().append('<p class = "success">'+ json.result +'</p>');
            }
        }
    });
}

function delete_sub_topic(topic_id, sub_topic_id) {

    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this sub topic record!',
        type: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonClass: 'btn btn-light',
        background: 'rgba(0, 0, 0, 0.96)'
    }).then(function(){

        $.ajax({
            url: '/topics/delete/' + sub_topic_id + '/sub',
            type: 'GET',
            dataType: 'text',
            success: function (data) {
                var json = $.parseJSON(data);

                if(json.status == 404) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'warning',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-sm btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    });
                }

                if(json.status == 200) {
                    swal({
                        title: '',
                        text: json.result,
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-light',
                        background: 'rgba(0, 0, 0, 0.96)'
                    }).then(function(){
                        window.location.href = "/topics/"+ topic_id +"/sub";
                    });
                }
            }
        });
    }).catch(swal.noop);
}