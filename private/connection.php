<?php 
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbusing = "pioneirosmanagment";

    $connection = new mysqli($dbserver, $dbuser, $dbpassword, $dbusing);

    if ($connection->connect_error) {
        die("Falha na conexão: " . $connection->connect_error);
    }
?>