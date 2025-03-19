<?php 
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbusing = "pioneirosmanagmentdb";

    $connection = new mysqli($dbserver, $dbuser, $dbpassword, $dbusing);

    if ($connection->connect_error) {
        die("Falha na conexão: " . $connection->connect_error);
    }
?>