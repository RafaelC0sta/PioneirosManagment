<?php
    require "../private/checkLogin.php";

    $nome = $_SESSION['pioneiro'];
    $cargo = $_SESSION['cargo'];
    $equipa = $_SESSION['equipa'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht=device-widht, initial-scale=1, shrink-to-fit=no">
    <title>Pioneiros Managment</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="p-6">
        <h1 class="text-3xl font-bold">Olá, <?= htmlspecialchars($nome); ?>!</h1>
        <h2 class="text-lg">Cargo: <?= htmlspecialchars($cargo); ?></h2>
        <h2 class="text-lg">Equipa: <?= htmlspecialchars($equipa); ?></h2>

        <div class="infos">
            <br>
            <h2 class="text-xl font-bold">Contactos:</h2>
            <h3 class="text-lg">Email:</h3><p>geral.543@escutismo.pt</p>
            <h3 class="text-lg">Telefone:</h3><p>962549417</p>
            <br>
            <h3 class="text-lg">Localização:</h3>
            <p>Rua Dom José de Alarcão,<br>2805-319 Cova da Piedade</p>
            <a href="https://maps.app.goo.gl/ey9WgGeswhyht3Um7" target="_blank">Ver mapa</a>
        </div>
    </div>
</body>
</html>