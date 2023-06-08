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
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">

              <div class="card card-secondary card-outline">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="m-0"><i class="fas fa-solid fa-tablets fa-sm mr-2"></i> Total Medicines</h5>

                  <button type="button" class="btn btn-tool position-absolute end-0" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
                <div class="card-body">
                  <h5 class="card-title">The total number of medicines as of today is <span id="totalMedicines" style="font-style:italic; color:blue;"></span></h5>
                </div>
              </div>

              <div class="card card-secondary card-outline">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="m-0"><i class="fas fa-solid fa-building fa-sm mr-2"></i> Similar Company</h5>

                  <button type="button" class="btn btn-tool position-absolute end-0" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">A company named <span id="similarCompany" style="font-style:italic; color:blue;"></span> provided <span id="similarCompanyCount" style="font-style:italic;  color:blue;"></span> of different types of medicines for the pharmacy.</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card card-secondary card-outline">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="m-0"><i class="fas fa-calendar-times fa-xl mr-2"></i> Expiring this Month</h5>

                  <button type="button" class="btn btn-tool position-absolute end-0" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">A medicine/s named <span id="medicineName" style="font-style:italic; color:blue;"></span> with the number of <span id="medicineNameCount" style="font-style:italic;  color:blue;"></span> is expiring this month of <span id="monthYear" style="font-style:italic;  color:blue;"></span>.</h5>
                </div>
              </div>

              <div class="card card-secondary card-outline">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="m-0"><i class="fas fa-light fa-boxes fa-sm mr-2"></i> Out of Stocks</h5>

                  <button type="button" class="btn btn-tool position-absolute end-0" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">A medicine/s named <span id="medicineNameOutOfStocks" style="font-style:italic; color:blue;"></span> is now out of stocks.</h5>
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
      <strong>Copyright &copy; 2023-2024 <a href="#" class="text-decoration-none">Leinmark Management System</a>.</strong> All rights reserved.
    </footer>
  </div>

  <script>
    $.ajax({
      type: 'POST',
      url: 'actions/medicine_allRow.php',
      dataType: 'json',
      success: function(response) {
        $('#totalMedicines').text(response.length);
      }
    });
    $.ajax({
      type: 'POST',
      url: 'actions/medicine_allRowTotalCompany.php',
      dataType: 'json',
      success: function(response) {
        if (response.status) {
          $('#similarCompany').text(response.mostMentionedCompany);
          $('#similarCompanyCount').text(response.companyCount);
        } else {
          $('#similarCompany').parent().text("No data to show.");
        }
      }
    });
    $.ajax({
      type: 'POST',
      url: 'actions/medicine_expiringThisMonth.php',
      dataType: 'json',
      success: function(response) {
        if (response.status) {
          $('#medicineName').text(response.expiryMedicines);
          $('#medicineNameCount').text(response.expiryCount);
          $('#monthYear').text(response.monthYear);
        } else {
          $('#medicineName').parent().text("No data to show.");
        }
      }
    });

    $.ajax({
      type: 'POST',
      url: 'actions/medicine_oufOfStocks.php',
      dataType: 'json',
      success: function(response) {
        if (response.status) {
          $('#medicineNameOutOfStocks').text(response.zeroStockMedicines);
        } else {
          $('#medicineNameOutOfStocks').parent().text("No data to show.");
        }
      }
    });
  </script>
</body>

</html>