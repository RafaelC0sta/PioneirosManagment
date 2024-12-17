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

    $primeiroNome = strtok($nome, " ");

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
    <button class="botao-menu" id="botao_menu">
        ☰
    </button>
    <ul class="menu_esquerda" id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="equipas.php">Equipas</a></li>
        <li><a href="#">Calendário</a></li>
        <li><a href="#">Apoio</a></li>
    </ul>
    <ul class="menu_direita" id="menu">
        <li><p style="color: white;"><?= htmlspecialchars($primeiroNome); ?></p></li>
        <li><a href="../private/logout.php">logout</a></li>
    </ul>
</header>
</html>
<script>
    const menuToggle = document.getElementById('botao_menu');
    const menu = document.querySelectorAll('#menu');

    menuToggle.addEventListener('click', () => {
        menu.forEach(menuItem => menuItem.classList.toggle('show'));
    });
</script>