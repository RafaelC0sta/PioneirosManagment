<?php
    require "../private/checkLogin.php";
    
    if (isset($_SESSION['pioneiro'])) {
        $nome = $_SESSION['pioneiro'];
        //$noites_campo = $_SESSION['noites_campo'];
    } else {
        $nome = "";
        //$noites_campo = "";
    }
    $noites_campo = 27;

    $insigniaAntes = "";
    $progress_container_width = 0;
    
    if ($noites_campo <= 25) {
        $progress_container_width = 25;
        $insigniaAntes = "../images/25.jpg";
    } else if ($noites_campo > 25 && $noites_campo <= 50) {
        $progress_container_width = 50;
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
        Noites Campo:

       
        <div class="progress-container" style="width: <?php echo $progress_container_width ?>%;">
            <div class="progress-bar" style="width: <?php echo $noites_campo?>%;">
                 <?php echo $noites_campo?>
            </div>
        </div> 
        <img src="<?php echo $insigniaAntes ?>" alt="insigniaAntes" style="width: 5%;">
    </div>
</body>
</html>