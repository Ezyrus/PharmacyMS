<?php
    include '../dbConnection.php';
   
    $sql = "SELECT * FROM `medicine`";
    $result = mysqli_query($connection, $sql);
    
    $medicines = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $medicines[] = array('value' => $row['medicine_name']);
    }
    
    echo json_encode($medicines);
    
?>   
