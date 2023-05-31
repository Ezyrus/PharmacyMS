<?php
include 'dbConnection.php';
session_start();
$adminLogged = $_SESSION['adminLogged'];

if (empty($adminLogged)) {
  header('Location:/Zaptics/index.php');
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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'sidebar.php'; ?>

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><i class="fas fa-solid fa-book-medical fa-xl"></i> Add Medicines</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Input addon -->
            <div>
              <div class="col-md-6">

                <form id="addMedicineForm">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-solid fa-capsules fa-xl mr-2"></i> Medicine Name
                      </span>
                    </div>
                    <input type="text" class="form-control" id="medicineName" name="medicineName" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-sharp fa-solid fa-dollar-sign fa-xl mr-2"></i> Price
                      </span>
                    </div>
                    <input type="number" class="form-control" id="medicinePrice" name="medicinePrice" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-light fa-boxes fa-xl mr-2"></i> Stocks
                      </span>
                    </div>
                    <input type="number" class="form-control" id="medicineStocks" name="medicineStocks" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-solid fa-building fa-xl mr-2"></i> Company
                      </span>
                    </div>
                    <input type="text" class="form-control" id="medicineCompany" name="medicineCompany" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-solid fa-calendar-plus mr-2"></i> Date Manufactured
                      </span>
                    </div>
                    <input type="date" class="form-control" id="medicineDateManufactured" name="medicineDateManufactured" required>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-calendar-times fa-xl mr-2"></i> Expiration Date
                      </span>
                    </div>
                    <input type="date" class="form-control" id="medicineDateExpiration" name="medicineDateExpiration" required>
                  </div>

                  <button type="submit" class="btn btn-block btn-outline-success">Insert Medicine</button>
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
        Software Engineering
      </div>
      <strong>Copyright &copy; 2023-2024 <a href="#" class="text-decoration-none">Pharmacy Management System</a>.</strong> All rights reserved.
    </footer>
  </div>


  <script>
    $('#addMedicineForm').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'actions/medicine_add.php',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          Swal.fire({
            text: response.message,
            icon: response.icon,
            showCancelButton: false,
            showConfirmButton: true,
            confirmButtonText: "OK",
            allowOutsideClick: false,
          }).then(() => {
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