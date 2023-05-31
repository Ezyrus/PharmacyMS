<?php
include 'dbConnection.php';
session_start();
$adminLogged = $_SESSION['adminLogged'];
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
              <h1 class="m-0">Add Medicines</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">

              <div class="card card-secondary card-outline">
                <div class="card-header">
                  <h5 class="m-0"><i class="fas fa-solid fa-tablets fa-sm"></i> Total Medicines</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>

              <div class="card card-secondary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card card-secondary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>

              <div class="card card-secondary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
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

</body>

</html>