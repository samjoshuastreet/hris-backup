<!doctype html>
<html lang="en">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.components.head')
    <body data-sidebar="dark">
        @if ($message = Session::get('success'))                     
            <script>
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'SUCCESS',
                    text:"{{ session('success') }}",
                    showConfirmButton: true,
                })
            </script>
        @endif

        @if ($message = Session::get('error'))
            <script>   
                Swal.fire({
                    position: 'center-center',
                    icon: 'error',
                    title: 'ERROR',
                    text:"{{ session('success') }}",
                    showConfirmButton: true,
                })
            </script>
        @endif
        <div id="layout-wrapper">
            <header id="page-topbar">
                @include('layouts.components.header')
            </header>
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        @include('layouts.components.sidebar')
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Department List</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus" title="Edit"></i> Department</button>
                                        
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Deparment ID No.</th>
                                                                    <th>Department Name</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($department as $department)
                                                                    <tr data-id="{{$department->id}}" style="cursor: pointer;">
                                                                        <td data-field="id" style="width: 80px">
                                                                            <label id="label_deptid-{{$department->id}}">{{$department->id}}</label>
                                                                            <input type="text" id="department_id-{{$department->id}}" class="form-control" value="{{$department->id}}" hidden disabled>
                                                                        </td>
                                                                        <td data-field="name" style="width: 337.422px;">
                                                                            <label id="label_deptname-{{$department->id}}">{{$department->department_name}}</label>
                                                                            <input type="text" id="department_name-{{$department->id}}" class="form-control" value="{{$department->department_name}}" hidden>
                                                                            <span id="department_name-{{$department->id}}-msg" class="text-danger"></span>
                                                                        </td>
                                                                        <td style="width: 100px">
                                                                           
                                                                            <a class="btn btn-outline-secondary btn-sm edit" id="edit-{{$department->id}}" title="Edit" onclick="editChanges({{$department->id}})">
                                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                                            </a>
                                                                          
                                                                            <a class="btn btn-outline-success btn-sm save" id="save-{{$department->id}}" title="Save" onclick="saveChanges({{$department->id}})" hidden>
                                                                                <i class="fas fa-save" title="Save"></i>
                                                                            </a>
                                                                            <a class="btn btn-outline-warning btn-sm cancel" id="cancel-{{$department->id}}" title="Cancel" onclick="cancelChanges({{$department->id}})" hidden>
                                                                                <i class="bx bx-error" title="Cancel"></i>
                                                                            </a>
                                                                            {{-- <a class="btn btn-outline-danger btn-sm deleteButton" id="delete-{{$department->id}}" title="Delete" data-department-id="{{$department->id}}">
                                                                                <i class="bx bx-trash" title="Delete"></i>
                                                                            </a> --}}
                                                                            <a class="btn btn-outline-danger btn-sm delete" id="delete-{{$department->id}}" title="Delete" onclick="deleteDepartment({{$department->id}})">
                                                                                <i class="bx bx-trash" title="Delete"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- sample modal content -->
                                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="text-align: center">
                                                        {{-- <h6 class="modal-title" id="myModalLabel">Department Information</h6> --}}
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form id="department_form">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <label>Department Name:</label>
                                                                            <input type="text"class="form-control" id="department_name" name="department_name" onkeyup="remove_error(this)" autocomplete="off" placeholder="Enter Department Name">
                                                                            <span id="department_name-msg" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-sm waves-effect waves-light">Save</button>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>  
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                @include('layouts.components.footer')
            </div>
        </div>
        
        @include('layouts.components.script')
    </body>
    <script>
        function remove_error(e){
            var _id = $(e).attr('id');
            $("#" + _id).css('border', '1px solid gray');
            $("#" + _id + "-msg").text('');
        }

        $('#department_form').submit(function(e) {
            e.preventDefault();
            $(".btn").attr("disabled", true);
            let formData = new FormData(this);
            formData.append('_token', `{{ csrf_token() }}`);            
            $.ajax({
                method: 'post',
                url: '/department/store',
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => { 
                    Swal.fire({
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    top.location.href = "/department";
                },
                error: function(reject){
                    $(".btn").attr("disabled", false);
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function (field, messages) {
                        $("#" + field).css('border', '1px solid red');
                        // Display the first error message
                        $("span#" + field + "-msg").text(messages[0]);
                    });
                }
            });
        });
        function editChanges(id){
            $("#department_id-" + id).attr("hidden", false);
            $("#department_name-" + id).attr("hidden", false);

            $("#label_deptid-" + id).attr("hidden", true);
            $("#label_deptname-" + id).attr("hidden", true);

            $("#edit-" + id).attr("hidden", true);
            $("#delete-" + id).attr("hidden", true);
            $("#save-" + id).attr("hidden", false);
            $("#cancel-" + id).attr("hidden", false);
        }

        function saveChanges(id) {
            var department_name = $("#department_name-" + id).val();
            $.ajax({
                method: 'post',
                url: '/department/update/' + id,
                data: {
                    department_name: department_name,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => { 
                    Swal.fire({
                        position: 'center-center',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: true,
                        timer: 1200,
                    });
                    window.location.href = "/department";
                },
                error: function(reject){
                    $(".btn").attr("disabled", false);
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function (field, messages) {
                        $("#" + field).css('border', '1px solid red');
                        // Display the first error message
                        $("span#" + field + "-msg").text(messages[0]);
                    });
                }
            });
        }

        function cancelChanges(id){
            $("#department_id-" + id).attr("hidden", true);
            $("#department_name-" + id).attr("hidden", true);

            $("#label_deptid-" + id).attr("hidden", false);
            $("#label_deptname-" + id).attr("hidden", false);

            $("#edit-" + id).attr("hidden", false);
            $("#delete-" + id).attr("hidden", false);
            $("#save-" + id).attr("hidden", true);
            $("#cancel-" + id).attr("hidden", true);
        }

        function deleteDepartment(id){
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this department!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '/department/delete/' + id,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Department deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            top.location.href = "/department";
                        },
                        error: function (reject) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error deleting department',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        }
    </script>
</html>