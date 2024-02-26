@extends('layouts.app')

@section('content')

<section class="content">
    

    <!-- start modal -->

    <section class="content">
    <div class="card-body">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Add Instructional Material
        </button>


        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Instructional Material</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <section class="content">
                            <div class="container-fluid">
                                <div class="card card-default">

                                    <!-- start page -->



                                    <!-- Form aligned to the left -->

                                    <div class="row">
                                        <!-- Form aligned to the left -->
                                        <div class="col-md-6">
                                            <form>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="code">CODE</label>
                                                        <input type="text" class="form-control" id="code"
                                                            placeholder="Enter Code" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title"
                                                            placeholder="Enter Title" required>
                                                    </div>


                                                    <!-- college dropdown  -->
                                                    <div class="form-group">
                                                        <label>College</label>
                                                        <select class="select2 form-control" multiple="multiple"
                                                            data-placeholder="Select College" style="width: 100%;">
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

                                                    <!-- Category Dropdown -->
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="select2 form-control" multiple="multiple"
                                                            data-placeholder="Select Category" style="width: 100%;">
                                                            <option>Book</option>
                                                            <option>Creative Book</option>
                                                            <option>Monograph</option>
                                                            <option>Module</option>
                                                            <option>Laboratory Manual/Workbook</option>
                                                            <option>Learning Guide</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Form aligned to the right -->
                                        <div class="col-md-6">
                                            <form>
                                                <div class="card-body">
                                                    <!-- Publisher Dropdown -->
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="select2 form-control" multiple="multiple"
                                                            data-placeholder="Select Category" style="width: 100%;">
                                                            <option>University Press</option>
                                                            <option>Consigned Material</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edition">Edition</label>
                                                        <input type="text" class="form-control" id="edition"
                                                            placeholder="Enter Edition">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ISBN">ISBN</label>
                                                        <input type="text" class="form-control" id="ISBN"
                                                            placeholder="Enter ISBN">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" id="description"
                                                            placeholder="Enter Description" style="height: 100px;"
                                                            oninput="updateWordsDisplay() "></textarea>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>





                                    <!-- /.card-body -->


                                    <!-- end page -->
                                </div>
                            </div>
                            <section>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
</section>





    <!-- end modal -->




    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Masterlist</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                        
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.5
                            </td>
                            <td>Win 95+</td>
                            <td>5.5</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 6
                            </td>
                            <td>Win 98+</td>
                            <td>6</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>7</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>6</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td class="text-center">
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection