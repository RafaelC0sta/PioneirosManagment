<?php 
    require '../private/checkLogin.php';
    require '../private/connection.php';

    $id = $_GET['id']; 
    $sql = "SELECT * FROM pioneiros WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
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
        <section class="formAdd">
            <form action="../private/update_pioneiro.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <label>Nome do Pioneiro: </label>
                <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>

                <label>Numero de Identificacao do CNE: </label>
                <input type="number" name="id_cne" value="<?php echo $row['id_cne']; ?>"><br>

                <label>Data de Nascimento: </label>
                <input type="date" name="dt_nascimento" value="<?php echo $row['dt_nascimento']; ?>"><br>

                <label>Equipa: </label>
                <input type="text" name="equipa" value="<?= htmlspecialchars($row['equipa']); ?>" readonly><br>
                
                <label for="cargo">Cargo:</label>
                <select id="cargo" name="cargo">
                    <option value="guia" <?php echo $row['cargo'] == 'Guia' ? 'selected' : ''; ?> >Guia</option>
                    <option value="subguia" <?php echo $row['cargo'] == 'Subguia' ? 'selected' : ''; ?> >Sub-Guia</option>
                    <option value="secretario" <?php echo $row['cargo'] == 'Secretario' ? 'selected' : ''; ?> >Secretário</option>
                    <option value="tesoureiro" <?php echo $row['cargo'] == 'Tesoureiro' ? 'selected' : ''; ?> >Tesoureiro</option>
                    <option value="guardamaterial" <?php echo $row['cargo'] == 'Guardamaterial' ? 'selected' : ''; ?> >Guarda Material</option>
                    <option value="cozinheiro" <?php echo $row['cargo'] == 'Cozinheiro' ? 'selected' : ''; ?> >Cozinheiro</option>
                    <option value="socorrista" <?php echo $row['cargo'] == 'Socorrista' ? 'selected' : ''; ?> >Socorrista</option>
                    <option value="animador" <?php echo $row['cargo'] == 'Animador' ? 'selected' : ''; ?> >Animador</option>
                </select><br>

                <label for="etapaprogresso">Etapa do Progresso</label>
                <select id="etapaprogresso" name="etapaprogresso" value="<?php echo $row['etapa_progresso'] ?>">
                    <option value="desprendimento" <?php echo $row['etapa_progresso'] == 'Desprendimento' ? 'selected' : ''; ?> >Desprendimento</option>
                    <option value="conhecimento" <?php echo $row['etapa_progresso'] == 'Conhecimento' ? 'selected' : ''; ?> >Conhecimento</option>
                    <option value="vontade" <?php echo $row['etapa_progresso'] == 'Vontade' ? 'selected' : ''; ?> >Vontade</option>
                    <option value="construcao" <?php echo $row['etapa_progresso'] == 'Construcao' ? 'selected' : ''; ?> >Construção</option>
                </select><br>

                <label>Noites de Campo: </label>
                <input type="number" name="noitescampo" id="noitescampo" value="<?php echo $row['noites_campo']; ?>"><br>
                
                <label>Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50"><?php echo htmlspecialchars($row['observacoes']); ?></textarea><br>

                <input type="submit" value="Editar" class="botao">
            </form>
        </section>
        
    </div>
</body>
</html>