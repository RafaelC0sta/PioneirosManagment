<?php 
    require '../private/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karol</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include('header.php'); ?>
<body>
    <!-- Este ecra vai ser para mostrar os pioneiros da Karol -->
    <div class="body">
        <div class="tabelaPioneiros">
            <h3>Salgueiro</h3>
            <?php 
                $selectPioneiros = "SELECT nome, id_cne, dt_nascimento, cargo, etapaprogresso, noitescampo, doencas FROM salgueiro_maia";
                $result = $connection->query($selectPioneiros);

                if ($result->num_rows > 0) {
                    echo "<table class='tabelasPioneiros'>
                            <tr>
                                <th>Nome</th>
                                <th>Id do CNE</th>
                                <th>Data de Nascimento</th>
                                <th>Cargo</th>
                                <th>Etapa de Progresso</th>
                                <th>Noites de Campo</th>
                                <th>Doenças</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nome']}</td>
                                <td>{$row['id_cne']}</td>
                                <td>{$row['dt_nascimento']}</td>
                                <td>{$row['cargo']}</td>
                                <td>{$row['etapaprogresso']}</td>
                                <td>{$row['noitescampo']}</td>
                                <td>{$row['doencas']}</td>
                            </tr>";
                    }

                    echo "</table>";
                }
            ?>
            <br>
        </div>
        

        <a href="form_add.php"><button class="botao"><span>Adicionar Pioneiro</span></button></a>
    </div>
</body>
</html>