<?php
    include '../dbConnection.php';
    session_start();
 
    $response = array(
        'status' => false, 
        'icon' => '',
        'message' => ''
    );  

    $medicineName = htmlentities($_POST['medicineName']);
    $medicinePrice = htmlentities($_POST['medicinePrice']);
    $medicineStocks = htmlentities($_POST['medicineStocks']);
    $medicineCompany = htmlentities($_POST['medicineCompany']);
    $medicineDateManufactured = htmlentities($_POST['medicineDateManufactured']);
    $medicineDateExpiration = htmlentities($_POST['medicineDateExpiration']);

    $sql = "INSERT INTO `medicine` (`medicine_name`, `medicine_price`, `medicine_manufacturedDate`, `medicine_expirationDate`, `medicine_stocks`, `medicine_company`) VALUES ('$medicineName','$medicinePrice', '$medicineDateManufactured', '$medicineDateExpiration', '$medicineStocks', '$medicineCompany')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $response['status'] = true;
        $response['icon'] = "success";
        $response['message'] = "Medicine has been successfully added.";
    }

    echo json_encode($response);
