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

<link rel="stylesheet" href="css/header.css">
<header>
    <button class="botao-menu" id="botao_menu">
        ☰
    </button>
    <ul class="menu_esquerda" id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="equipas.php">Equipas</a></li>
        <li><a href="apoio.php">Resumos</a></li>
    </ul>
    <ul class="menu_direita" id="menu">
        <li><p style="color: white;"><?= htmlspecialchars($primeiroNome); ?></p></li>
        <li><a href="../private/logout.php">logout</a></li>
    </ul>
</header>
<script>
    // este javascript faz com que apareça o botao no lado do header (em mobile)
    const menuToggle = document.getElementById('botao_menu');
    const menu = document.querySelectorAll('#menu');

    menuToggle.addEventListener('click', () => {
        menu.forEach(menuItem => menuItem.classList.toggle('show'));
    });
</script>