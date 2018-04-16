@extends('layout.app')
<?php
$ssl = false;
?>
@section('css')
@endsection

@section('content')
    <section class="content">

        <button class="btn btn-light btn--icon-text" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-create-topic"><i class="zmdi zmdi-plus"></i> Add Topic</button>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Topic Lists</h4>

                <div class="table-responsive">
                    <table id="{{ $topics['status'] == 404 ? '' : 'data-table'}}"  class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Name</th>
                            <th>Unit #</th>
                            <th>Topic Name</th>
                            <th>Syllabus</th>
                            <th>Total Sub-topics</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($topics['status'] == 404)
                            <tr><td colspan="6" style = "text-align: center;">{{ $topics['result'] }}</td></tr>
                        @else
                            <?php $count = 1; ?>
                            @foreach($topics['result'] as $topic)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $topic['subject_name'] }}</td>
                                    <td>{{ $topic['unit_number'] }}</td>
                                    <td>{{ $topic['topic_name'] }}</td>
                                    <td>{{ $topic['class_number'] }}</td>
                                    <td>{{ $topic['sub_topic_count'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" data-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu--icon dropdown-menu-right">
                                                <a href="/topics/{{ $topic['Id'] }}/sub" class="dropdown-item"><i class="zmdi zmdi-search"></i> View Sub-topics</a>
                                                <a href="" onclick="edit_topic('{{ $topic['Id'] }}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-update-topic" class="dropdown-item"><i class="zmdi zmdi-edit"></i> Edit Topic</a>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="delete_topic('{{ $topic['Id'] }}')" class="dropdown-item"><i class="zmdi zmdi-delete"></i> Delete Topic</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
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

                <div class="modal fade" id="modal-update-topic" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Update Topic</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="card-body__title">Subject</h3>
                                    <select class="form-control" name = "u_subject_uid" id = "u_subject_uid" required>
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
                                <div class="form-group">
                                    <h3 class="card-body__title">Class #: (Syllabus)</h3>
                                    <select class="form-control" name = "u_class_number" id = "u_class_number" required>
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
                                <div class="form-group">
                                    <h3 class="card-body__title">Unit Number</h3>
                                    <input type="text" class="form-control" name = "u_unit_number" id = "u_unit_number" placeholder="Type your unit number" required />
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="form-group">
                                    <h3 class="card-body__title">Topic Name</h3>
                                    <input type="text" class="form-control" name = "u_topic_name" id = "u_topic_name" placeholder="Type your topic name" required />
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="flash-message"></div>
                                <input type="hidden" class="form-control" name = "u_topic_id" id = "u_topic_id" />
                                <input type ="submit" onclick="update_topic()" class="btn btn-light" id = "btn-update-topic" value = "Save Changes">
                                <a href = "{{ route('topics') }}" class="btn btn-link">Close</a>
                            </div>
                        </div>
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
