@extends('layouts.app')
@section('content')
<section class="content">
    <!-- start modal -->
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#author-modal">
                <i class="fas fa-plus"></i> Add Author
            </button>
            <div class="modal fade" id="author-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Author</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('author.add') }}">
                                @csrf
                                <div class="container-fluid">
                                    <div class="card card-default">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="Enter First Name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle_name">Middle Name</label>
                                                        <input type="text" class="form-control" id="middle_name"
                                                            name="middle_name" placeholder="Enter Middle Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="Enter Last Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end modal -->
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
</section>
@endsection