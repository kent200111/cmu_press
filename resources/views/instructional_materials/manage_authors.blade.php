<html>
    <head>
        <title>Manage Authors</title>
        <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    @extends('layouts.app')
    @section('content')
    <body>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#author-modal">
                <i class="fas fa-plus"></i> Add Author
            </button>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Authors</h3>
                </div>
                <div class="card-body">
                    <table id="authors-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Author Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form method="post" class="modal fade" id="author-modal"> 
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Author</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name"
                                                    placeholder="Enter First Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                                    placeholder="Enter Middle Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    placeholder="Enter Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div id="success-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success!</h5>
                    </div>
                    <div class="modal-body">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                function index() {
                    $.ajax({
                        url: "{{ route('author.index') }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var tbody = $('#authors-table tbody');
                            tbody.empty();
                            data.forEach(function (author) {
                                var row = $('<tr>');
                                row.append('<td>' + author.first_name + ' ' + (author.middle_name ? author.middle_name + ' ' : '') + author.last_name + '</td>');
                                row.append('<td class="text-center">' +
                                '<a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
                                '<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>' +
                                '</td>');
                                tbody.append(row);
                            });
                            $('#authors-table').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": false,
                                "info": true,
                                "autoWidth": true,
                                "responsive": false,
                                "buttons": ["copy", "excel", "pdf", "print"],
                                "pageLength": 8
                            }).buttons().container().appendTo('#authors-table_wrapper .col-md-6:eq(0)');
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
                index();
            });
        </script>
    </body>
    @endsection
</html>