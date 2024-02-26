@extends('layouts.app')

@section('content')

<section class="content">
    

    <!-- start modal -->

    <section class="content">
    <div class="card-body">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Add Batch
        </button>

        <!-- Modal form -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Batch</h4>
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
                                                        <label>Material</label>
                                                        <select class="form-control select2" style="width: 100%;" required>
                                                            <option>Material from database</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Batch Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Enter Batch Name" required>
                                                    </div>

                                                    <!-- Date Picker -->
                                                    <div class="form-group">
                                                        <label>Date:</label>
                                                        <div class="input-group date" id="reservationdate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#reservationdate" />
                                                            <div class="input-group-append"
                                                                data-target="#reservationdate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Form aligned to the right -->
                                        <div class="col-md-6">
                                            <form>
                                                <div class="card-body">
                                                <div class="form-group">
                                                        <label for="cost">Production Cost</label>
                                                        <input type="text" class="form-control" id="cost"
                                                            placeholder="Enter Production Cost" required>
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label for="price">Product Price</label>
                                                        <input type="text" class="form-control" id="price"
                                                            placeholder="Enter Product Price" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="quantity">Product Quantity</label>
                                                        <input type="text" class="form-control" id="quantity"
                                                            placeholder="Enter Product Quantity" required>
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
                <h3 class="card-title">Manage Batches</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Instructional Material</th>
                            <th>Batch Name</th>
                            <th>production Date</th>
                            <th>Production Cost</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
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
                            <td>5</td>
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
                            <td>5</td>
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
                                Explorer 6
                            </td>
                            <td>Win 98+</td>
                            <td>6</td>
                            <td>5</td>
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
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>7</td>
                            <td>5</td>
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
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>6</td>
                            <td>5</td>
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
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td>5</td>
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
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>5</td>
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
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>5</td>
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
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td>5</td>
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