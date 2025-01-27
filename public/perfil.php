<?php
    require "../private/checkLogin.php";
    
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
    <title>Perfil</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include("header.php"); ?>
<body>
    <div class="body">
        <h1>Perfil - <?= htmlspecialchars($nome); ?></h1>
    </div>
</body>
</html>