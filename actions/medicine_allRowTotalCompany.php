<?php
include '../dbConnection.php';

$response = array(
    'status' => false,
    'mostMentionedCompany' => '',
    'companyCount' => ''
);

$sql = "SELECT medicine_company, COUNT(medicine_company) AS count FROM `medicine` GROUP BY medicine_company ORDER BY count DESC LIMIT 1";
$result = mysqli_query($connection, $sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) {
    $row = mysqli_fetch_assoc($result);
    $companyCount = $row['count'];

    if ($companyCount > 1) {
        $response["status"] = true;
        $response["mostMentionedCompany"] = $row['medicine_company'];
        $response["companyCount"] = $companyCount . 'x';
    }
}

echo json_encode($response);
?>
