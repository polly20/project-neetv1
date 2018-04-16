@extends('layout.app')
<?php
$ssl = false;
?>
@section('css')
@endsection

@section('content')
    <section class="content">

        <button class="btn btn-light btn--icon-text" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-create-subject"><i class="zmdi zmdi-plus"></i> Add Subject</button>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subject Lists</h4>

                <div class="table-responsive">
                    <table id="{{ $subjects['status'] == 404 ? '' : 'data-table'}}"  class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Total Questions</th>
                                <th>Total Topics</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($subjects['status'] == 404)
                            <tr><td colspan="6" style = "text-align: center;">{{ $subjects['result'] }}</td></tr>
                        @else
                            <?php $count = 1; ?>
                            @foreach($subjects['result'] as $subject)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $subject['subject_code'] }}</td>
                                    <td>{{ $subject['subject_name'] }}</td>
                                    <td>0</td>
                                    <td>{{ $subject['topic_count'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" data-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu--icon dropdown-menu-right">
                                                <a href="/topics/{{ $subject['subject_name'] }}" class="dropdown-item"><i class="zmdi zmdi-search"></i> View Topics</a>
                                                <a href="" onclick="edit_subject('{{ $subject['Id'] }}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-update-subject" class="dropdown-item"><i class="zmdi zmdi-edit"></i> Edit Subject</a>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="delete_subject('{{ $subject['Id'] }}')" class="dropdown-item"><i class="zmdi zmdi-delete"></i> Delete Subject</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="modal-create-subject" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Add Subject</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="card-body__title">Subject Code</h3>
                                    <input type="text" class="form-control" name = "c_subject_code" id = "c_subject_code" placeholder="Type your subject code" required />
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="form-group">
                                    <h3 class="card-body__title">Subject Name</h3>
                                    <input type="text" class="form-control" name = "c_subject_name" id = "c_subject_name" placeholder="Type your subject name" required />
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="flash-message"></div>
                                <input type ="submit" onclick="create_subject()" class="btn btn-light" id = "btn-save-subject" value = "Save">
                                <a href = "{{ route('subjects') }}" class="btn btn-link">Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-update-subject" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Update Subject</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="card-body__title">Subject Code</h3>
                                    <input type="text" class="form-control" name = "u_subject_code" id = "u_subject_code" placeholder="Type your subject code" required />
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="form-group">
                                    <h3 class="card-body__title">Subject Name</h3>
                                    <input type="text" class="form-control" name = "u_subject_name" id = "u_subject_name" placeholder="Type your subject name" required />
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="flash-message"></div>
                                <input type="hidden" class="form-control" name = "u_subject_id" id = "u_subject_id" />
                                <input type ="submit" onclick="update_subject()" class="btn btn-light" id = "btn-update-subject" value = "Save Changes">
                                <a href = "{{ route('subjects') }}" class="btn btn-link">Close</a>
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
