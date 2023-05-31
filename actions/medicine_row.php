<?php
    include '../dbConnection.php';

    $medicineId = htmlentities($_POST['medicineId']);
    $sql = "SELECT * FROM `medicine` WHERE `medicine_id` = '$medicineId' ";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
?>