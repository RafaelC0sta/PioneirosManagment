<?php
    // este if foi para resolver um pequeno bug -> overflow de requests para o login
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['pioneiro'])) {
        $nome = $_SESSION['pioneiro'];
    } else {
        $nome = "";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<header>
    <ul class="menu_esquerda">
        <li><a href="index.php">Home</a></li>
        <li><a href="equipas.php">Equipas</a></li>
        <li><a href="#">Calendário</a></li>
        <li><a href="#">Apoio</a></li>
    </ul>
    <ul class="menu_direita">
        <li><p style="color: white;"><?= htmlspecialchars($nome); ?></p></li>
        <li><a href="../private/logout.php">logout</a></li>
    </ul>
</header>
</html>