@extends('layouts.app')
@section('content')
<html>

<head>
    <title>Manage Authors</title>
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/toastr/toastr.min.css">
    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="admin/plugins/toastr/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <br>
        <a class="btn btn-primary" onClick="showAddAuthorModal()" href="javascript:void(0)">
            <i class="fas fa-plus"></i> Add Author
        </a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Authors</h3>
            </div>
            <div class="card-body">
                <!-- AUTHORS TABLE -->
                <table class="table table-bordered table-striped" id="AuthorsTable">
                    <thead>
                        <tr>
                            <th>Author Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- AUTHORS TABLE -->
            </div>
        </div>
    </div>
    <br>
    <!-- ADD AUTHOR MODAL -->
    <div class="modal fade" id="AddAuthorModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Author</h4>
                </div>
                <div class="modal-body">
                    <!-- ADD AUTHOR FORM -->
                    <form id="AddAuthorForm" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="Enter First Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" name="middle_name"
                                                    placeholder="Enter Middle Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Enter Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onClick="hideAddAuthorModal()"
                                    href="javascript:void(0)">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <!-- ADD AUTHOR FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- ADD AUTHOR MODAL -->
    <!-- EDIT AUTHOR MODAL -->
    <div class="modal fade" id="EditAuthorModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Author</h4>
                </div>
                <div class="modal-body">
                    <!-- EDIT AUTHOR FORM -->
                    <form id="EditAuthorForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="AuthorId" name="author_id">
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="FirstName" name="first_name"
                                                    placeholder="Enter First Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="MiddleName"
                                                    name="middle_name" placeholder="Enter Middle Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="LastName" name="last_name"
                                                    placeholder="Enter Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onClick="hideEditAuthorModal()"
                                    href="javascript:void(0)">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- EDIT AUTHOR FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT AUTHOR MODAL -->
    <!-- DELETE AUTHOR MODAL -->
    <div class="modal fade" id="DeleteAuthorModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Author</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this author?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="hideDeleteAuthorModal()"
                        href="javascript:void(0)">Cancel</button>
                    <button type="button" class="btn btn-danger" id="DeleteAuthor">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE AUTHOR MODAL -->
    <script>
    function showAddAuthorModal() {
        $('#AddAuthorModal').modal('show');
    }
    function hideAddAuthorModal() {
        $('#AddAuthorForm')[0].reset();
        $('#AddAuthorModal').modal('hide');
    }
    function showEditAuthorModal(authorId) {
        $.ajax({
            url: "{{ route('authors.edit', ':id') }}".replace(':id', authorId),
            type: 'GET',
            dataType: 'json',
            success: function(author) {
                $('#EditAuthorModal #AuthorId').val(author.id);
                $('#EditAuthorModal #FirstName').val(author.first_name);
                $('#EditAuthorModal #MiddleName').val(author.middle_name);
                $('#EditAuthorModal #LastName').val(author.last_name);
                $('#EditAuthorModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    function hideEditAuthorModal() {
        $('#EditAuthorModal').modal('hide');
    }
    function showDeleteAuthorModal() {
        $('#DeleteAuthorModal').modal('show');
    }
    function hideDeleteAuthorModal() {
        $('#DeleteAuthorModal').modal('hide');
    }
    $('#AddAuthorForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('authors.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                hideAddAuthorModal();
                toastr.success('The author has been successfully added!');
                refreshAuthorsTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#EditAuthorForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var authorId = $('#AuthorId').val();
        $.ajax({
            url: "{{ route('authors.update', ':id') }}".replace(':id', authorId),
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                hideEditAuthorModal();
                toastr.success('The author has been successfully updated!');
                refreshAuthorsTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#AuthorsTable').on('click', '.delete', function(event) {
        event.preventDefault();
        var authorId = $(this).data('id');
        showDeleteAuthorModal();
        $('#DeleteAuthor').off().on('click', function() {
            $.ajax({
                url: "{{ route('authors.destroy', ':id') }}".replace(':id', authorId),
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    hideDeleteAuthorModal();
                    toastr.success('The author has been successfully deleted!');
                    refreshAuthorsTable();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error('This author holds other records and cannot be deleted!');
                }
            });
        });
    });
    function refreshAuthorsTable() {
        $.ajax({
            url: "{{ route('authors.index') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var table = $('#AuthorsTable').DataTable();
                var existingRows = table.rows().remove().draw(false);
                data.forEach(function(author) {
                    table.row.add([
                        author.first_name + ' ' + (author.middle_name ? author
                            .middle_name +
                            ' ' : '') + author.last_name,
                        '<div class="text-center">' +
                        '<a href="#" class="edit" title="Edit" data-toggle="tooltip" data-id="' +
                        author.id + '" onclick="showEditAuthorModal(' + author.id +
                        ')"><i class="material-icons">&#xE254;</i></a>' +
                        '<a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="' +
                        author.id + '"><i class="material-icons">&#xE872;</i></a>' +
                        '</div>'
                    ]);
                });
                table.draw();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    $(document).ready(function() {
        $('#AuthorsTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "buttons": ["copy", "excel", "pdf", "print"],
            "pageLength": 8
        }).buttons().container().appendTo('#AuthorsTable_wrapper .col-md-6:eq(0)');
        refreshAuthorsTable();
    });
    </script>
</body>

</html>
@endsection