<?php
include 'dbConnection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

<body class="hold-transition login-page">

    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2><i class="fas fa-solid fa-syringe fa-xl"></i> Pharmacy Management System</h2>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-secondary">Sign in to start your session.</p>

                <form id="admin_logInForm" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">

                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>

                </form>

                <!-- <p class="mb-0">
                    <a href="register.php" class="text-center text-decoration-none">Register a new membership</a>
                </p> -->
            </div>

        </div>

    </div>

    <div id="admin_LogInSuccess" class="alert alert-success d-none position-absolute top-0 start-25 m-2" role="alert" style="z-index: 10">
        Admin Successfully Logged-In
    </div>

    <div id="admin_LogInFailed" class="alert alert-danger d-none position-absolute top-0 start-25 m-2" role="alert" style="z-index: 5">
        Incorrect Credentials
    </div>

    <script>
        $(document).ready(function() {
            $('#admin_logInForm').on('submit', function(e) {
                e.preventDefault()
                $.ajax({
                    type: 'POST',
                    url: 'actions/admin_validation.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {

                            $("#admin_LogInSuccess").hide().removeClass("d-none").addClass("d-block").fadeIn("slow");
                            setTimeout(function() {
                                location.replace("dashboard.php");
                            }, 1000);

                        } else {
                            $("#admin_LogInFailed").hide().removeClass("d-none").addClass("d-block").fadeIn("slow");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });
    </script>
</body>

</html>