<?php
    require '../private/checkLogin.php';

    $username = $_SESSION['pioneiro'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pioneiros Managment</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include("header.php"); ?>
<body>
    <div class="body">
        <h1>Olá, <?= htmlspecialchars($username); ?>!</h1>
    </div>
</body>
</html>