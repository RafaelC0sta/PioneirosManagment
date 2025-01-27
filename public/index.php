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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pioneiros Managment</title>
    <link rel="stylesheet" href="/pioneirosequipas/public/css/index.css">
</head>
<?php include("header.php"); ?>
<body>
    <div class="body">
        <h1>Olá, <?= htmlspecialchars($nome); ?>!</h1>
        <h2>Cargo: <?= htmlspecialchars($cargo); ?></h2>
        <h2>Equipa: <?= htmlspecialchars($equipa); ?></h2>
        <br><br><br><br>
        <div class="infos">
            <h2>Contactos:</h2>
            <h3>email:</h3><p>geral.543@escutismo.pt</p>
            <h3>telefone:</h3><p>962549417</p>
            <br>    
            <h3>Localização:</h3>
            <p>Rua Dom José de Alarcão,<br>2805-319 Cova da Piedade</p>
            <a href="https://maps.app.goo.gl/ey9WgGeswhyht3Um7" target="_blank">Ver mapa</a>
        </div>
    </div>
</body>
</html>