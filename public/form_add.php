<?php 
    require '../private/connection.php';

    if (!isset($_GET['equipa'])) {
        header("Location: ../equipas.php");
        exit;
    }

    $equipa = $_GET['equipa'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pioneiro</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include('header.php'); ?>
<body>
    <div class="body">
        <h2><?= htmlspecialchars($equipa)?></h2>
        <form action="../private/add_pioneiro.php" method="post">
            <label>Nome do Pioneiro: </label><input type="text" name="nome"><br>
            <label>Numero de Identificacao do CNE: </label><input type="number" name="id_cne"><br>
            <label>Data de Nascimento: </label><input type="date" name="dt_nascimento"><br>
            <label>Equipa: </label>
            <input type="text" name="equipa" value="<?= htmlspecialchars($equipa)?>" readonly><br>
            <label for="cargo">Cargo:</label>
            <select id="cargo" name="cargo">
                <option value="guia">Guia</option>
                <option value="subguia">Sub-Guia</option>
                <option value="secretario">Secretário</option>
                <option value="tesoureiro">Tesoureiro</option>
                <option value="guardamaterial">Guarda Material</option>
                <option value="cozinheiro">Cozinheiro</option>
                <option value="socorrista">Socorrista</option>
                <option value="animador">Animador</option>
            </select><br>
            <label for="etapaprogresso">Etapa do Progresso</label>
            <select id="etapaprogresso" name="etapaprogresso">
                <option value="desprendimento">Desprendimento</option>
                <option value="conhecimento">Conhecimento</option>
                <option value="vontade">Vontade</option>
                <option value="construcao">Construção</option>
            </select><br>
            <label>Noites de Campo: </label><input type="number" name="noitescampo" id="noitescampo"><br>
            <label>Doenças:</label><br>
            <textarea id="doencas" name="doencas" rows="3" cols="50"></textarea><br>

            <input type="submit" value="Adicionar" class="botao">
        </form>
    </div>
</body>
</html>