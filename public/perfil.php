<?php
    require "../private/checkLogin.php";
    
    if (isset($_SESSION['pioneiro'])) {
        $nome = $_SESSION['pioneiro'];
        $noites_campo = $_SESSION['noites_campo'];
        $etapa_progresso = $_SESSION['etapa_progresso'];
    } else {
        $nome = "";
        $noites_campo = "";
        $etapa_progresso = "";
    }

    $mostrarMSG = false;
    $insigniaAntes = "";    
    $insigniaDepois = "";
    $checkpoint = 0;
    $min = 0;
    $cor = "";

    $insigniaEtapaAntes = "";
    $insigniaEtapaDepois = "";

    if ($noites_campo <= 25) {
        $checkpoint = 25;
        $min = 0;
        $insigniaDepois = "../images/25.jpg";
        $cor = "522c03";
    } else if ($noites_campo > 25 && $noites_campo <= 50) {
        $insigniaAntes = "../images/25.jpg";
        $insigniaDepois = "../images/50.jpg";
        $min = 25;
        $checkpoint = 50;
        $cor = "fff";
        $corTexto = "black";
    } else if ($noites_campo > 50 && $noites_campo <= 75) {
        $insigniaAntes = "../images/50.jpg";
        $insigniaDepois = "../images/75.jpg";
        $min = 50;
        $checkpoint = 75;
        $cor = "f0db19";
        $corTexto = "black";
    } else if ($noites_campo > 75 && $noites_campo <= 100) {
        $insigniaAntes = "../images/75.jpg";
        $insigniaDepois = "../images/100.jpg";
        $min = 75;
        $checkpoint = 100;
        $cor = "008f0e";
    } else if ($noites_campo > 100 && $noites_campo <= 200) {
        $insigniaAntes = "../images/100.jpg";
        $insigniaDepois = "../images/200.jpg";
        $min = 100;
        $checkpoint = 200;
        $cor = "f76f00";
    } else {
        $mostrarMSG = true;
        $msg = "Ja conseguiste a insignia de 200 noites, queres mais oq ? xD";
    }

    if ($etapa_progresso == "Desprendimento") {
        $insigniaEtapaAntes = "../images/desprendimento.jpg";
        $insigniaEtapaDepois = "../images/conhecimento.jpg";
    } else if ($etapa_progresso == "Conhecimento") {
        $insigniaEtapaAntes = "../images/conhecimento.jpg";
        $insigniaEtapaDepois = "../images/vontade.jpg";
    } else if ($etapa_progresso == "Vontade") {
        $insigniaEtapaAntes = "../images/vontade.jpg";
        $insigniaEtapaDepois = "../images/construcao.jpg";
    } else if ($etapa_progresso == "Construcao") {
        $insigniaEtapaAntes = "../images/vontade.jpg";
        $insigniaEtapaDepois = "../images/construcao.jpg";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Perfil</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<?php include("header.php"); ?>
<body>
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center py-6">Perfil - <?= htmlspecialchars($nome); ?></h1>
        
        <div class="noites-container">
            <div class="text-xl mb-4">
                <strong>Noites de Campo:</strong>
            </div>
            
            <?php if (!$mostrarMSG):?>
            <div class="flex items-center justify-center space-x-4">
                <img src='<?php echo $insigniaAntes ?>' alt='insigniaAntes' class='w-16 h-16'>
                
                <div class="w-full bg-gray-300 rounded-lg h-8 relative">
                    <div class="absolute top-0 left-0 h-full text-center leading-8 font-bold text-white rounded-lg" style="width: <?php echo (($noites_campo - $min) / ($checkpoint - $min)) * 100?>%; background-color: #<?php echo $cor ?>; color: <?php echo $corTexto ?>">
                        <?php echo $noites_campo?>
                    </div>
                </div> 
                
                <img src="<?php echo $insigniaDepois ?>" alt="insigniaDepois" class="w-16 h-16">
            </div>
            <?php 
                else:
                    echo "<div class='text-xl font-bold text-green-500'>$msg</div>";
                endif; 
            ?>
        </div>

        <div class="progresso-container pt-10">
            <div class="text-xl mb-4">
                <strong>Progresso:</strong>
            </div>

            <div class="flex items-center justify-center space-x-4">
                <?php 
                    if ($etapa_progresso == "Construcao") {
                        echo "";
                    } else {
                        echo "<img src='$insigniaEtapaAntes' alt='insgigniaAntes' class='w-16 h-19'>";
                        echo " <div class='w-[35%] text-center text-6xl'>&rarr;</div>";
                    }
                
                ?>
                
                <img src="<?php echo $insigniaEtapaDepois ?>" alt="insiniaDepois" class="w-16 h-19">
            </div>
        </div>
    </div>
</body>
</html>
