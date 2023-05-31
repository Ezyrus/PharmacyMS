<?php
    include '../dbConnection.php';

   session_destroy();
   header('Location:/PharmacyMS/index.php');
?>