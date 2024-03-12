@extends('layouts.app')
@section('content')
<html>

<head>
    <title>Purchase History</title>
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
        <a class="btn btn-primary" onClick="showNewPurchaseModal()" href="javascript:void(0)">
            <i class="fas fa-plus"></i> New Purchase
        </a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Purchase History</h3>
            </div>
            <div class="card-body">
                <!-- PURCHASES TABLE -->
                <table class="table table-bordered table-striped" id="PurchasesTable">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Instructional Material</th>
                            <th>IM Batch</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Date Sold</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- PURCHASES TABLE -->
            </div>
        </div>
    </div>
    <br>
    <!-- NEW PURCHASE MODAL -->
    <div class="modal fade" id="NewPurchaseModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Purchase</h4>
                </div>
                <div class="modal-body">
                    <!-- NEW PURCHASE FORM -->
                    <form id="NewPurchaseForm" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="customer_name">Customer Name</label>
                                                <input type="text" class="form-control" name="customer_name"
                                                    placeholder="Enter Customer Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="instructional_material">Instructional Material</label>
                                                <select class="select2 form-control" id="InstructionalMaterial"
                                                    name="instructional_material"
                                                    data-placeholder="Select Instructional Material"
                                                    style="width: 100%;" required>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="im_batch">IM Batch</label>
                                                <select class="select2 form-control" id="ImBatch" name="im_batch"
                                                    data-placeholder="Select IM Batch" style="width: 100%;" required>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" readonly class="form-control" id="Price"
                                                    name="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <select class="select2 form-control" id="Quantity" name="quantity"
                                                    data-placeholder="Select Quantity" style="width: 100%;" required>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="total_price">Total Price</label>
                                                <input type="text" readonly class="form-control" id="TotalPrice"
                                                    name="total_price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-danger" onClick="hideNewPurchaseModal()"
                                    href="javascript:void(0)">Cancel</button>
                                <button type="submit" class="btn btn-primary">Record Purchase</button>
                            </div>
                        </div>
                    </form>
                    <!-- NEW PURCHASE FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- NEW PURCHASE MODAL -->
    <script type="text/javascript">
    function showNewPurchaseModal() {
        $.ajax({
            url: "{{ route('purchases.create') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var selectInstructionalMaterial = $('#InstructionalMaterial');
                selectInstructionalMaterial.empty();
                response.forEach(function(im) {
                    selectInstructionalMaterial.append('<option value="' + im.id + '">' + im.title +
                        '</option>');
                });
                $('#NewPurchaseModal').modal('show');
                selectInstructionalMaterial.val(null).trigger('change');
                selectInstructionalMaterial.select2();
                $('#InstructionalMaterial').on('change', function() {
                    $('#TotalPrice').val(null);
                    var imId = $(this).val();
                    if (imId) {
                        var selectedInstructionalMaterial = response.find(function(im) {
                            return im.id == imId;
                        });
                        var batches = selectedInstructionalMaterial.batches;
                        var selectImBatch = $('#ImBatch');
                        selectImBatch.empty();
                        batches.forEach(function(batch) {
                            selectImBatch.append('<option value="' + batch.id + '">' + batch
                                .name + '</option>');
                        });
                        selectImBatch.val(null).trigger('change');
                        selectImBatch.select2();
                    }
                });
                $('#ImBatch').on('change', function() {
                    $('#TotalPrice').val(null);
                    var batchId = $(this).val();
                    if (batchId) {
                        var selectedInstructionalMaterial = response.find(function(im) {
                            return im.id == $('#InstructionalMaterial').val();
                        });
                        var selectedBatch = selectedInstructionalMaterial.batches.find(function(
                            batch) {
                            return batch.id == batchId;
                        });
                        $('#Price').val(selectedBatch.price.toFixed(2));
                        var selectQuantity = $('#Quantity');
                        selectQuantity.empty();
                        for (var i = 1; i <= selectedBatch.available_stocks; i++) {
                            selectQuantity.append('<option value="' + i + '">' + i + '</option>');
                        }
                        selectQuantity.val(null).trigger('change');
                        selectQuantity.select2();
                    } else {
                        $('#Price').val(null);
                        $('#Quantity').empty();
                    }
                });
                $('#Price, #Quantity').on('input', function() {
                    var price = parseFloat($('#Price').val()) || 0;
                    var quantity = parseInt($('#Quantity').val()) || 0;
                    var totalPrice = price * quantity;
                    $('#TotalPrice').val(totalPrice.toFixed(2));
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    function hideNewPurchaseModal() {
        $('#NewPurchaseModal').modal('hide');
    }
    $('#NewPurchaseForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('purchases.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                var successMessage = response.success;
                console.log(successMessage);
                hideNewPurchaseModal();
                toastr.success(successMessage);
                refreshPurchasesTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    function refreshPurchasesTable() {
        $.ajax({
            url: "{{ route('purchases.index') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var table = $('#PurchasesTable').DataTable();
                var existingRows = table.rows().remove().draw(false);
                data.forEach(function(purchase) {
                    var formattedDateSold = new Date(purchase.date_sold);
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    var formattedDateSoldString = formattedDateSold.toLocaleDateString('en-US',
                        options);
                    var totalPrice = purchase.batch.price.toFixed(2) * purchase.quantity;
                    table.row.add([
                        purchase.customer_name,
                        purchase.im.title,
                        purchase.batch.name,
                        purchase.batch.price.toFixed(2),
                        purchase.quantity,
                        formattedDateSoldString,
                        totalPrice.toFixed(2)
                    ]);
                });
                table.draw();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    function NumbersOnly(inputField) {
        var pattern = /^[0-9]+$/;
        var inputValue = inputField.value;
        if (!pattern.test(inputValue)) {
            inputField.value = inputValue.replace(/[^0-9]/g, '');
        }
    }
    $(document).ready(function() {
        $('#PurchasesTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "buttons": ["copy", "excel", "pdf", "print"],
            "pageLength": 8
        }).buttons().container().appendTo('#PurchasesTable_wrapper .col-md-6:eq(0)');
        refreshPurchasesTable();
        $('#NewPurchaseModal').on('hidden.bs.modal', function(e) {
            $('#NewPurchaseForm')[0].reset();
            $('#NewPurchaseModal select').val(null).trigger('change');
        });
    });
    </script>
</body>

</html>
@endsection