<?php
include '../dbConnection.php';

$response = array(
    'status' => false 
);

$admin_username = htmlentities($_POST["username"]);
$admin_password = htmlentities($_POST["password"]);
$adminLogged = "";

$admin_result = mysqli_query($connection, "SELECT * FROM `admin` WHERE `admin_username` = '$admin_username' AND `admin_password` = '$admin_password' ");

$admin_numRow = mysqli_num_rows($admin_result);

if ($admin_numRow) { 

    while ($row = mysqli_fetch_array($admin_result)) {
        $adminLogged = $row['admin_username'];
         
    }
    $response['status'] = true; 
    session_start();
    $_SESSION['adminLogged'] = $adminLogged;
    
}

echo json_encode($response);
?>