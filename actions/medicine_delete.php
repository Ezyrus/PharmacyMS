<?php
    include '../dbConnection.php';
    session_start();

    $medicineId = htmlentities($_POST['medicineId']);
    $sql = "DELETE FROM `medicine` WHERE `medicine_id` = '$medicineId' ";
    $result = mysqli_query($connection, $sql);

    echo json_encode($result);
?>