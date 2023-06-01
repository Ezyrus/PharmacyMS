<?php
include '../dbConnection.php';
date_default_timezone_set('Asia/Manila');
$today = date('F Y');

$response = array(
    'status' => false,
    'monthYear' => $today,
    'expiryCount' => 0,
    'expiryMedicines' => []
);

$expiryMonthYear = date('Y-m'); 
$sql = "SELECT medicine_name FROM `medicine` WHERE DATE_FORMAT(medicine_expirationDate, '%Y-%m') = '$expiryMonthYear'";
$result = mysqli_query($connection, $sql);

if ($result) {
    $response['status'] = true;
    $response['expiryCount'] = mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response['expiryMedicines'][] = $row['medicine_name'];
        }
    } else {
        $response['status'] = false;
    }
}

echo json_encode($response);
