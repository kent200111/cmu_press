@extends('layouts.app')
@section('content')

<html>

<head>
    <title>Manage Instructional Materials</title>
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <br>
        <a class="btn btn-primary" onClick="showAddInstructionalMaterialModal()" href="javascript:void(0)">
            <i class="fas fa-plus"></i> Add Instructional Material
        </a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Instructional Materials</h3>
            </div>
            <div class="card-body">
                <!-- INSTRUCTIONAL MATERIALS TABLE -->
                <table class="table table-bordered table-striped" id="InstructionalMaterialsTable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Authors</th>
                            <th>Category</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- INSTRUCTIONAL MATERIALS TABLE -->
            </div>
        </div>
    </div>
    <br>



    <!-- ADD INSTRUCTIONAL MATERIAL MODAL -->
    <div class="modal fade" id="AddInstructionalMaterialModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Instructional Material</h4>
                </div>
                <div class="modal-body">
                    <!-- ADD INSTRUCTIONAL MATERIAL FORM -->
                    <form id="AddInstructionalMaterialForm" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <!-- LEFT SIDE -->
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="code">Code</label>
                                                <input type="text" class="form-control" name="code"
                                                    placeholder="Enter Code" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="Enter Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="authors">Authors</label>
                                                <select multiple="multiple" class="select2 form-control" name="authors"
                                                    data-placeholder="Select Authors" style="width: 100%;" required>
                                                    <option>Author 1</option>
                                                    <option>Author 2</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="select2 form-control" name="category"
                                                    data-placeholder="Select Category" style="width: 100%;" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    <option>Book</option>
                                                    <option>Creative Book</option>
                                                    <option>Monograph</option>
                                                    <option>Module</option>
                                                    <option>Laboratory Manual/Workbook</option>
                                                    <option>Learning Guide</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="college">College</label>
                                                <select class="select2 form-control" name="college"
                                                    data-placeholder="Select College" style="width: 100%;">
                                                    <option value="" disabled selected>Select College</option>
                                                    <option>College of Agriculture</option>
                                                    <option>College of Arts and Sciences</option>
                                                    <option>College of Business and Management</option>
                                                    <option>College of Education</option>
                                                    <option>College of Engineering</option>
                                                    <option>College of Forestry and Environmental Sciences
                                                    </option>
                                                    <option>College of Human Ecology</option>
                                                    <option>College of Information Sciences and Computing
                                                    </option>
                                                    <option>College of Nursing</option>
                                                    <option>College of Veterinary Medicine</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- LEFT SIDE -->
                                    <!-- RIGHT SIDE -->
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="publisher">Publisher</label>
                                                <select class="select2 form-control" name="publisher"
                                                    data-placeholder="Select Publisher" style="width: 100%;">
                                                    <option value="" disabled selected>Select Publisher</option>
                                                    <option>University Press</option>
                                                    <option>Consigned Material</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edition">Edition</label>
                                                <input type="text" class="form-control" name="edition"
                                                    placeholder="Enter Edition">
                                            </div>
                                            <div class="form-group">
                                                <label for="isbn">ISBN</label>
                                                <input type="text" class="form-control" name="isbn"
                                                    placeholder="Enter ISBN">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" name="description"
                                                    placeholder="Enter Description" style="height: 124px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- RIGHT SIDE -->
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-danger"
                                    onClick="hideAddInstructionalMaterialModal()"
                                    href="javascript:void(0)">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <!-- ADD INSTRUCTIONAL MATERIAL FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- ADD INSTRUCTIONAL MATERIAL MODAL -->









    <script>
    function showAddInstructionalMaterialModal() {
        $('#AddInstructionalMaterialModal').modal('show');
    }

    function hideAddInstructionalMaterialModal() {
        $('#AddInstructionalMaterialForm')[0].reset();
        $('#AddInstructionalMaterialModal').modal('hide');
    }

    function refreshInstructionalMaterialsTable() {
        $.ajax({
            url: "{{ route('instructional_materials.index') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var table = $('#InstructionalMaterialsTable').DataTable();
                var existingRows = table.rows().remove().draw(false);
                data.forEach(function(im) {
                    var authors = '';
                    if (im.authors.length > 1) {
                        authors += im.authors[0].last_name + ' et al.<br>';
                    } else {
                        authors += im.authors[0].last_name + '<br>';
                    }
                    table.row.add([
                        im.code,
                        im.title,
                        authors,
                        im.category.name,
                        '<div class="text-center">' +
                        '<a href="#" class="edit" title="Edit" data-toggle="tooltip" data-id="' +
                        im.id + '" onclick="showEditInstructionalMaterialModal(' + im.id +
                        ')"><i class="material-icons">&#xE254;</i></a>' +
                        '<a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="' +
                        im.id + '"><i class="material-icons">&#xE872;</i></a>' +
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
        $('#InstructionalMaterialsTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": false,
            "buttons": ["copy", "excel", "pdf", "print"],
            "pageLength": 8
        }).buttons().container().appendTo('#InstructionalMaterialsTable_wrapper .col-md-6:eq(0)');
        refreshInstructionalMaterialsTable();
    });
    </script>
</body>

</html>
@endsection