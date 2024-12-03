<?php
    session_start();

    if (!isset($_SESSION['pioneiro'])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipas</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include("header.php");?>
<body>
    <div class="equipas-list">
        <div class="equipa-card">
            <a href="karol.php">
                <img src="../images/karol.jpg" alt="karol">
                <h2>Karol Wojtyla</h2>
            </a>
        </div>
        <div class="equipa-card">
            <a href="nelson.php">
                <img src="../images/nelson.jpg" alt="nelson">
                <h2>Nelson Mandela</h2>
            </a>
        </div>
        <div class="equipa-card">
            <a href="salgueiro.php">
                <img src="../images/salgueiro.jpg" alt="salgueiro">
                <h2>Salgueiro Maia</h2>
            </a>
        </div>
    </div>
</body>
</html>