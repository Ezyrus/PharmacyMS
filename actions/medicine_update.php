<?php
    include '../dbConnection.php';

    $response = array(
        'status' => false, 
        'icon' => '',
        'message' => ''
    );  
    $medicineId = htmlentities($_POST['update_medicineId']);
    $medicineName = htmlentities($_POST['update_medicineName']);
    $medicinePrice = htmlentities($_POST['update_medicinePrice']);
    $medicineStocks = htmlentities($_POST['update_medicineStocks']);
    $medicineCompany = htmlentities($_POST['update_medicineCompany']);
    $medicineDateManufactured = htmlentities($_POST['update_medicineDateManufactured']);
    $medicineDateExpiration = htmlentities($_POST['update_medicineDateExpiration']);

    $sql = "UPDATE `medicine` SET `medicine_name` = '$medicineName', `medicine_price` = '$medicinePrice', `medicine_company` = '$medicineCompany', `medicine_stocks` = '$medicineStocks', `medicine_manufacturedDate` = '$medicineDateManufactured', `medicine_expirationDate` = '$medicineDateExpiration' WHERE `medicine_id` = '$medicineId'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $response['status'] = true;
        $response['icon'] = "success";
        $response['message'] = "Medicine has been successfully updated.";
    }

    echo json_encode($response);
