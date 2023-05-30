<?php

    $dbHost = 'localhost';
    $dbName = 'pmsdb';
    $dbUsername = 'root';
    $dbPassword = '';
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    return $connection;

?>