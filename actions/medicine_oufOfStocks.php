<?php
include '../dbConnection.php';

$response = array(
    'status' => false,
    'zeroStockMedicines' => []
);

$sql = "SELECT medicine_name FROM `medicine` WHERE medicine_stocks = 0";
$result = mysqli_query($connection, $sql);

if ($result) {
    $response['status'] = true;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response['zeroStockMedicines'][] = $row['medicine_name'];
        }
    } else {
        $response['status'] = false;
    }
}

echo json_encode($response);
?>
