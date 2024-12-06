<?php 
    require '../private/connection.php';
    require '../private/checkLogin.php';

    $cargo = $_SESSION['cargo'];
    $equipa = $_SESSION['equipa'];

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
            <h3>Karol</h3>
            <?php 
                $selectPioneiros = "SELECT nome, id_cne, dt_nascimento, cargo, etapa_progresso, noites_campo, doencas FROM pioneiros where equipa='Karol Wojtyla'";
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
                                <td>{$row['etapa_progresso']}</td>
                                <td>{$row['noites_campo']}</td>
                                <td>{$row['doencas']}</td>
                            </tr>";
                    }

                    echo "</table>";
                }
            ?>
        </div><br>
        
        <div>
            <?php if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Karol Wojtyla"): ?>
                <a href="form_add.php?equipa=Karol Wojtyla"><button class="botao" id="btn_karol" onclick=sendKarol()><span>Adicionar Pioneiro</span></button></a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>