<?php
    require "../private/checkLogin.php";
    
    if (isset($_SESSION['pioneiro'])) {
        $nome = $_SESSION['pioneiro'];
        $noites_campo = $_SESSION['noites_campo'];
    } else {
        $nome = "";
        $noites_campo = "";
    }

    //$noites_campo = 51;

    $insigniaAntes = "";    
    $checkpoint = 0;
    $min = 0;
    $cor = "";

    if ($noites_campo <= 25) {
        $checkpoint = 25;
        $min = 0;
        $insigniaAntes = "../images/25.jpg";
        $cor = "522c03";
    } else if ($noites_campo > 25 && $noites_campo <= 50) {
        $insigniaAntes = "50 noites";
        $min = 25;
        $checkpoint = 50;
        $cor = "fff";
        $corTexto = "black";
    } else if ($noites_campo > 50 && $noites_campo <= 75) {
        $insigniaAntes = "75 noites";
        $min = 50;
        $checkpoint = 75;
        $cor = "f0db19";
    } else if ($noites_campo > 75 && $noites_campo <= 100) {
        $insigniaAntes = "100 noites";
        $min = 75;
        $checkpoint = 100;
        $cor = "008f0e";
    } else if ($noites_campo > 100 && $noites_campo <= 200) {
        $insigniaAntes = "200 noites";
        $min = 100;
        $checkpoint = 200;
        $cor = "f76f00";
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

        <div style="width: 40%;">
            <div class="progress-container" style="width: 50%;">
                <div class="progress-bar" style="width: <?php echo (($noites_campo - $min) / ($checkpoint - $min)) * 100?>%; background-color: #<?php echo $cor ?>; color: <?php echo $corTexto ?>">
                    <?php echo $noites_campo?>
                </div>
            </div> 
        </div>
        <img src="<?php echo $insigniaAntes ?>" alt="insigniaAntes" style="width: 5%;">
    </div>
</body>
</html>