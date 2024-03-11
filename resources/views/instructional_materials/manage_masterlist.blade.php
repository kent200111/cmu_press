@extends('layouts.app')
@section('content')
<html>

<head>
    <title>Manage Instructional Materials</title>
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
                            <th class="text-center">Actions</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Authors</th>
                            <th>Category</th>
                            <th>College</th>
                            <th>Publisher</th>
                            <th>Edition</th>
                            <th>ISBN</th>
                            <th>Description</th>
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
                                                <select multiple="multiple" class="select2 form-control"
                                                    name="authors[]" data-placeholder="Select Authors"
                                                    style="width: 100%;" required>
                                                    @foreach($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->first_name }}
                                                        {{ $author->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="select2 form-control" name="category"
                                                    data-placeholder="Select Category" style="width: 100%;" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="college">College</label>
                                                <select class="select2 form-control" name="college"
                                                    data-placeholder="Select College" style="width: 100%;">
                                                    <option value="" disabled selected>Select College</option>
                                                    <option value=" "></option>
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
                                                    <option value=" "></option>
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
    <!-- EDIT INSTRUCTIONAL MATERIAL MODAL -->
    <div class="modal fade" id="EditInstructionalMaterialModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Instructional Material</h4>
                </div>
                <div class="modal-body">
                    <!-- EDIT INSTRUCTIONAL MATERIAL FORM -->
                    <form id="EditInstructionalMaterialForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="InstructionalMaterialId" name="instructional_material_id">
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <!-- LEFT SIDE -->
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="code">Code</label>
                                                <input type="text" class="form-control" id="Code" name="code"
                                                    placeholder="Enter Code" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="Title" name="title"
                                                    placeholder="Enter Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="authors">Authors</label>
                                                <select multiple="multiple" class="select2 form-control" id="Authors"
                                                    name="authors[]" data-placeholder="Select Authors"
                                                    style="width: 100%;" required>
                                                    @foreach($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->first_name }}
                                                        {{ $author->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="select2 form-control" id="Category" name="category"
                                                    data-placeholder="Select Category" style="width: 100%;" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="college">College</label>
                                                <select class="select2 form-control" id="College" name="college"
                                                    data-placeholder="Select College" style="width: 100%;">
                                                    <option value="" disabled selected>Select College</option>
                                                    <option value=" "></option>
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
                                                <select class="select2 form-control" id="Publisher" name="publisher"
                                                    data-placeholder="Select Publisher" style="width: 100%;">
                                                    <option value="" disabled selected>Select Publisher</option>
                                                    <option value=" "></option>
                                                    <option>University Press</option>
                                                    <option>Consigned Material</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edition">Edition</label>
                                                <input type="text" class="form-control" id="Edition" name="edition"
                                                    placeholder="Enter Edition">
                                            </div>
                                            <div class="form-group">
                                                <label for="isbn">ISBN</label>
                                                <input type="text" class="form-control" id="Isbn" name="isbn"
                                                    placeholder="Enter ISBN">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" id="Description"
                                                    name="description" placeholder="Enter Description"
                                                    style="height: 124px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- RIGHT SIDE -->
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-danger"
                                    onClick="hideEditInstructionalMaterialModal()"
                                    href="javascript:void(0)">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- EDIT INSTRUCTIONAL MATERIAL FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT INSTRUCTIONAL MATERIAL MODAL -->
    <!-- DELETE INSTRUCTIONAL MATERIAL MODAL -->
    <div class="modal fade" id="DeleteInstructionalMaterialModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Instructional Material</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this instructional material?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="hideDeleteInstructionalMaterialModal()"
                        href="javascript:void(0)">Cancel</button>
                    <button type="button" class="btn btn-danger" id="DeleteInstructionalMaterial">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE INSTRUCTIONAL MATERIAL MODAL -->
    <script>
    function showAddInstructionalMaterialModal() {
        $('#AddInstructionalMaterialModal').modal('show');
    }
    function hideAddInstructionalMaterialModal() {
        $('#AddInstructionalMaterialForm')[0].reset();
        $('#AddInstructionalMaterialModal select').val(null).trigger('change');
        $('#AddInstructionalMaterialModal').modal('hide');
    }
    function showEditInstructionalMaterialModal(instructionalMaterialId) {
        $.ajax({
            url: "{{ route('instructional_materials.edit', ':id') }}".replace(':id', instructionalMaterialId),
            type: 'GET',
            dataType: 'json',
            success: function(instructionalMaterial) {
                $('#EditInstructionalMaterialModal #InstructionalMaterialId').val(instructionalMaterial.id);
                $('#EditInstructionalMaterialModal #Code').val(instructionalMaterial.code);
                $('#EditInstructionalMaterialModal #Title').val(instructionalMaterial.title);
                $('#EditInstructionalMaterialModal #Category').val(instructionalMaterial.category_id)
                    .trigger('change');
                $('#EditInstructionalMaterialModal #College').val(instructionalMaterial.college).trigger(
                    'change');
                $('#EditInstructionalMaterialModal #Publisher').val(instructionalMaterial.publisher)
                    .trigger('change');
                $('#EditInstructionalMaterialModal #Edition').val(instructionalMaterial.edition);
                $('#EditInstructionalMaterialModal #Isbn').val(instructionalMaterial.isbn);
                $('#EditInstructionalMaterialModal #Description').val(instructionalMaterial.description);
                var authorsSelect = $('#EditInstructionalMaterialModal #Authors');
                authorsSelect.find('option').each(function() {
                    var authorId = $(this).val();
                    $(this).prop('selected', instructionalMaterial.authors.some(function(author) {
                        return author.id == authorId;
                    }));
                });
                authorsSelect.trigger('change');
                $('#EditInstructionalMaterialModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    function hideEditInstructionalMaterialModal() {
        $('#EditInstructionalMaterialModal').modal('hide');
    }
    function showDeleteInstructionalMaterialModal() {
        $('#DeleteInstructionalMaterialModal').modal('show');
    }
    function hideDeleteInstructionalMaterialModal() {
        $('#DeleteInstructionalMaterialModal').modal('hide');
    }
    $('#AddInstructionalMaterialForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('instructional_materials.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                var successMessage = response.success;
                console.log(successMessage);
                hideAddInstructionalMaterialModal();
                toastr.success(successMessage);
                refreshInstructionalMaterialsTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#EditInstructionalMaterialForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var instructionalMaterialId = $('#InstructionalMaterialId').val();
        $.ajax({
            url: "{{ route('instructional_materials.update', ':id') }}".replace(':id',
                instructionalMaterialId),
            type: 'POST',
            data: formData,
            success: function(response) {
                var successMessage = response.success;
                console.log(successMessage);
                hideEditInstructionalMaterialModal();
                toastr.success(successMessage);
                refreshInstructionalMaterialsTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#InstructionalMaterialsTable').on('click', '.delete', function(event) {
        event.preventDefault();
        var instructionalMaterialId = $(this).data('id');
        showDeleteInstructionalMaterialModal();
        $('#DeleteInstructionalMaterial').off().on('click', function() {
            $.ajax({
                url: "{{ route('instructional_materials.destroy', ':id') }}".replace(':id',
                    instructionalMaterialId),
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    var successMessage = response.success;
                    console.log(successMessage);
                    hideDeleteInstructionalMaterialModal();
                    toastr.success(successMessage);
                    refreshInstructionalMaterialsTable();
                },
                error: function(xhr, status, error) {
                    var errorMessage = JSON.parse(xhr.responseText).error;
                    console.error(errorMessage);
                    toastr.error(errorMessage);
                }
            });
        });
    });
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
                        '<div class="text-center">' +
                        '<a href="#" class="edit" title="Edit" data-toggle="tooltip" data-id="' +
                        im.id + '" onclick="showEditInstructionalMaterialModal(' + im.id +
                        ')"><i class="material-icons">&#xE254;</i></a>' +
                        '<a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="' +
                        im.id + '"><i class="material-icons">&#xE872;</i></a>' +
                        '</div>',
                        im.code,
                        im.title,
                        authors,
                        im.category.name,
                        im.college,
                        im.publisher,
                        im.edition,
                        im.isbn,
                        im.description
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
            "responsive": true,
            "buttons": ["copy", "excel", "pdf", "print"],
            "pageLength": 8
        }).buttons().container().appendTo('#InstructionalMaterialsTable_wrapper .col-md-6:eq(0)');
        refreshInstructionalMaterialsTable();
    });
    </script>
</body>

</html>
@endsection