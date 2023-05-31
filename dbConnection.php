<?php

    $dbHost = 'localhost';
    $dbName = 'pmsdb';
    $dbUsername = 'root';
    $dbPassword = '';
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) ;

    if (!$connection) {
        die("Can't connect to the database server. Error: " . mysqli_connect_error());
    }
