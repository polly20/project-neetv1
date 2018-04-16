@extends('layout.app')
<?php
$ssl = false;
?>
@section('css')
@endsection

@section('content')
    <section class="content">

        {{--<button class="btn btn-light btn--icon-text" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-create-subject"><i class="zmdi zmdi-plus"></i> Add Subject</button>--}}

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Question</h4>
                <h6 class="card-subtitle">Create your question here.</h6>

                <div class="tab-container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#question_panel" role="tab">Question</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#answer_a_panel" role="tab">Choice A</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#answer_b_panel" role="tab">Choice B</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#answer_c_panel" role="tab">Choice C</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#answer_d_panel" role="tab">Choice D</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="question_panel" role="tabpanel">
                            @include('admin.question.panel.question_panel')
                        </div>
                        <div class="tab-pane fade" id="answer_a_panel" role="tabpanel">
                            @include('admin.question.panel.answer_a_panel')
                        </div>
                        <div class="tab-pane fade" id="answer_b_panel" role="tabpanel">
                            @include('admin.question.panel.answer_b_panel')
                        </div>
                        <div class="tab-pane fade" id="answer_c_panel" role="tabpanel">
                            @include('admin.question.panel.answer_c_panel')
                        </div>
                        <div class="tab-pane fade" id="answer_d_panel" role="tabpanel">
                            @include('admin.question.panel.answer_d_panel')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-create-topic" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Add Topic</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h3 class="card-body__title">Subject</h3>
                            <select class="form-control" name = "c_subject_uid" id = "c_subject_uid" required>
                                @if($subjects['status'] == 404)
                                    <option value = "0">No Subject Available</option>
                                @else
                                    <option value = "0">Select an Option</option>
                                    @foreach($subjects['result'] as $subject)
                                        <option value = "{{ $subject['Id'] }}">{{ $subject['subject_name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group class_number_group" style = "display: none;">
                            <h3 class="card-body__title">Class #: (Syllabus)</h3>
                            <select class="form-control" name = "c_class_number" id = "c_class_number" required>
                                @if($syllabus['status'] == 404)
                                    <option value = "0">No Subject Available</option>
                                @else
                                    <option value = "0">Select an Option</option>
                                    @foreach($syllabus['result'] as $sy)
                                        <option value = "{{ $sy->Id }}">{{ $sy->class_number }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group unit_number_group" style = "display: none;">
                            <h3 class="card-body__title">Unit Number</h3>
                            <input type="text" class="form-control" name = "c_unit_number" id = "c_unit_number" placeholder="Type your unit number" required />
                            <i class="form-group__bar"></i>
                        </div>
                        <div class="form-group topic_name_group" style = "display: none;">
                            <h3 class="card-body__title">Topic Name</h3>
                            <input type="text" class="form-control" name = "c_topic_name" id = "c_topic_name" placeholder="Type your topic name" required />
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flash-message"></div>
                        <input type ="submit" onclick="create_topic()" class="btn btn-light" id = "btn-save-topic" value = "Save">
                        <a href = "{{ route('topics') }}" class="btn btn-link">Close</a>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </section>

@endsection

@section('scripts')

    <!-- Vendors: Data tables -->
    <script src="/vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
