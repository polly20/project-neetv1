@extends('layout.app')
<?php
$ssl = false;
?>
@section('css')
    <style>
        .dataTables_buttons {
            display: none;
        }
    </style>
@endsection

@section('content')
    <section class="content">

        <button class="btn btn-light btn--icon-text" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-create-sub-topic"><i class="zmdi zmdi-plus"></i> Add Sub Topic</button>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Topic Lists</h4>

                <div class="table-responsive">
                    <table id="{{ $sub_topics['status'] == 404 ? '' : 'data-table'}}"  class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub Topic Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($sub_topics['status'] == 404)
                            <tr><td colspan="6" style = "text-align: center;">{{ $sub_topics['result'] }}</td></tr>
                        @else
                            <?php $count = 1; ?>
                            @foreach($sub_topics['result'] as $sub_topic)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $sub_topic->sub_topic_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" data-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu--icon dropdown-menu-right">
                                                <a href="" onclick="edit_sub_topic('{{ $sub_topic->Id }}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-update-sub-topic" class="dropdown-item"><i class="zmdi zmdi-edit"></i> Edit Sub Topic</a>
                                                <div class="dropdown-divider"></div>
                                                <button onclick="delete_sub_topic('{{ $sub_topics['topic_id'] }}','{{ $sub_topic->Id }}')" class="dropdown-item"><i class="zmdi zmdi-delete"></i> Delete Sub Topic</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="modal-create-sub-topic" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Add Sub Topic</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="card-body__title">Description</h3>
                                    <textarea class="form-control" name = "c_sub_topic_name" id = "c_sub_topic_name" rows="5" placeholder="Type your sub topic"></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="flash-message"></div>
                                <input type="hidden" class="form-control" name = "c_topic_id" id = "c_topic_id" value = "{{ $sub_topics['topic_id'] }}" />
                                <input type ="submit" onclick="create_sub_topic()" class="btn btn-light" id = "btn-save-sub-topic" value = "Save">
                                <a href = "{{ route('subtopics', ['topic_id' => $sub_topics['topic_id']]) }}" class="btn btn-link">Close</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-update-sub-topic" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Update Sub Topic</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="card-body__title">Description</h3>
                                    <textarea class="form-control" name = "u_sub_topic_name" id = "u_sub_topic_name" rows="5" placeholder="Type your sub topic"></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="flash-message"></div>
                                <input type="hidden" class="form-control" name = "u_sub_topic_id" id = "u_sub_topic_id" />
                                <input type ="submit" onclick="update_sub_topic()" class="btn btn-light" id = "btn-update-sub-subject" value = "Save Changes">
                                <a href = "{{ route('subtopics', ['topic_id' => $sub_topics['topic_id']]) }}" class="btn btn-link">Close</a>
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
