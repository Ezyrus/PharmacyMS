<?php
include 'dbConnection.php';
session_start();
$adminLogged = $_SESSION['adminLogged'];

if (empty($adminLogged)) {
    header('Location:/PharmacyMS/index.php');
}
$admin_sql = "SELECT * FROM `admin` where `admin_username` = '$adminLogged'";
$admin_result = mysqli_query($connection, $admin_sql);
$adminLogged_Fullname = "";
while ($admin_row = mysqli_fetch_array($admin_result)) {
    $adminLogged_Fullname = $admin_row['admin_fullname'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>

    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php include 'sidebar.php'; ?>

    <div class="wrapper">
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><i class="fas fa-solid fa-capsules fa-xl"></i> Medicines</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="medicine" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Price (₱)</th>
                                                <th>Stocks</th>
                                                <th>Company</th>
                                                <th>Date Manufactured</th>
                                                <th>Date of Expiration</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $medicine_query = "SELECT * FROM medicine";
                                            $medicine_result = mysqli_query($connection, $medicine_query);
                                            while ($medicine_row = mysqli_fetch_array($medicine_result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $medicine_row['medicine_id']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_name']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_price']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_stocks']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_company']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_manufacturedDate']; ?></td>
                                                    <td><?php echo $medicine_row['medicine_expirationDate']; ?></td>
                                                    <td class="project-actions text-right">
                                                        <button class="btn btn-info btn-sm" data-role="updateTableBtn" data-bs-toggle="modal" data-id="<?php echo $medicine_row['medicine_id']; ?>" data-bs-target="#updateMedicineModal">
                                                            <i class="fas fa-pencil-alt mr-2"></i>Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" data-role="deleteTableBtn" data-id="<?php echo $medicine_row['medicine_id']; ?>">
                                                            <i class="fas fa-trash mr-2"></i>Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Price (₱)</th>
                                                <th>Stocks</th>
                                                <th>Company</th>
                                                <th>Date Manufactured</th>
                                                <th>Date of Expiration</th>
                                                <th></th>
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

    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Update Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form id="updateMedicineForm">
                        <input type="number" class="form-control align-self-end" id="update_medicineId" name="update_medicineId" style="cursor: not-allowed; width: 50px;" hidden>
                </div>

                <div class="modal-body">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-solid fa-capsules fa-xl mr-2"></i> Medicine Name
                            </span>
                        </div>
                        <input type="text" class="form-control" id="update_medicineName" name="update_medicineName" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-sharp fa-solid fa-dollar-sign fa-xl mr-2"></i> Price
                            </span>
                        </div>
                        <input type="number" class="form-control" id="update_medicinePrice" name="update_medicinePrice" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-light fa-boxes fa-xl mr-2"></i> Stocks
                            </span>
                        </div>
                        <input type="number" class="form-control" id="update_medicineStocks" name="update_medicineStocks" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-solid fa-building fa-xl mr-2"></i> Company
                            </span>
                        </div>
                        <input type="text" class="form-control" id="update_medicineCompany" name="update_medicineCompany" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-solid fa-calendar-plus mr-2"></i> Date Manufactured
                            </span>
                        </div>
                        <input type="date" class="form-control" id="update_medicineDateManufactured" name="update_medicineDateManufactured" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-times fa-xl mr-2"></i> Expiration Date
                            </span>
                        </div>
                        <input type="date" class="form-control" id="update_medicineDateExpiration" name="update_medicineDateExpiration" required>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-outline-success">Save Changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        $("#medicine").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#medicine_wrapper .col-md-6:eq(0)');

        $(document).on('click', 'button[data-role=deleteTableBtn]', function(e) {
            e.preventDefault();
            var medicineId = $(this).attr('data-id');

            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                dangerMode: true,
                reverseButtons: true,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'actions/medicine_delete.php',
                        data: {
                            medicineId: medicineId
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: "Medicine has been deleted!",
                                icon: "success",
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred: ' + error);
                        }
                    });
                }
            });
        });

        $(document).on('click', 'button[data-role=updateTableBtn]', function(e) {
            e.preventDefault();

            var medicineId = $(this).attr('data-id');
            $.ajax({
                url: 'actions/medicine_row.php',
                type: 'POST',
                data: {
                    medicineId: medicineId
                },
                dataType: 'json',
                success: function(response) {
                    $('#update_medicineId').val(response.medicine_id);
                    $('#update_medicineName').val(response.medicine_name);
                    $('#update_medicinePrice').val(response.medicine_price);
                    $('#update_medicineStocks').val(response.medicine_stocks);
                    $('#update_medicineCompany').val(response.medicine_company);
                    $('#update_medicineDateManufactured').val(response.medicine_manufacturedDate);
                    $('#update_medicineDateExpiration').val(response.medicine_expirationDate);
                },
            });
        });

        $('#updateMedicineForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'actions/medicine_update.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#updateMedicineModal').modal('hide');
                    Swal.fire({
                            text: response.message,
                            icon: response.icon,
                        })
                        .then(() => {
                            location.reload();
                        });
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    </script>
</body>

</html>