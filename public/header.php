<?php
    // este if foi para resolver um pequeno bug -> overflow de requests para o login
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $session = isset($_SESSION['pioneiro']);

    if ($session) {
        $nome = $_SESSION['pioneiro'];
        $cargo = $_SESSION['cargo'];
    } else {
        $nome = "";
        $cargo = "";
    }

    $primeiroNome = strtok($nome, " ");
?>

<link rel="stylesheet" href="/pioneirosequipas/public/css/header.css">
<header>
    <?php 
        if ($session): 
    ?>
        <button class="botao-menu" id="botao_menu">
            ☰
        </button>
        <ul class="menu_esquerda" id="menu">
            <li><a href="/pioneirosequipas/public/">Home</a></li>
            <li><a href="/pioneirosequipas/public/equipas.php">Equipas</a></li>
            <li><a href="/pioneirosequipas/public/apoio.php">Resumos</a></li>
            <li><a href="/pioneirosequipas/public/cargos/<?=$cargo.'/'?>"><?=htmlspecialchars($cargo) ?></a></li>
        </ul>
        <ul class="menu_direita" id="menu">
            <li><a href="/pioneirosequipas/public/perfil.php" color: white;"><?= htmlspecialchars($primeiroNome); ?></a></li>
            <li><a href="/pioneirosequipas/private/logout.php">logout</a></li>
        </ul>
    <?php
        else:
            echo "<div class='menu_meio'><h1>Pioneiros Managment</h1></div>";
        endif;
    ?>
</header>
<script>
    // este javascript faz com que apareça o botao no lado do header (em mobile)
    const menuToggle = document.getElementById('botao_menu');
    const menu = document.querySelectorAll('#menu');

    menuToggle.addEventListener('click', () => {
        menu.forEach(menuItem => menuItem.classList.toggle('show'));
    });
</script>