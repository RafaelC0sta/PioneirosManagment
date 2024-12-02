<?php
    session_start();
    include 'connection.php';

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM login where username = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $pioneiro = $resultado->fetch_assoc();

        if ($pioneiro && $pioneiro['password'] === $password) {
            $_SESSION['pioneiro'] = $username;
            header("Location: ../public/karol.php");
            exit;
        } else {
            $erro = "Nome ou password incorretos.";
        }
    }
?>