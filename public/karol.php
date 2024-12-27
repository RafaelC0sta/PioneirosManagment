<?php 
    require '../private/checkLogin.php';
    require '../private/connection.php';

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
            <h2>Karol</h2>
            <?php 
                $selectPioneiros = "SELECT * FROM pioneiros where equipa='Karol Wojtyla'";
                $result = $connection->query($selectPioneiros);

                if ($result->num_rows > 0) {
                    echo "<table class='tabelasPioneiros'>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Id do CNE</th>
                                    <th>Data de Nascimento</th>
                                    <th>Cargo</th>
                                    <th>Etapa de Progresso</th>
                                    <th>Noites de Campo</th>
                                    <th>Doenças</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td data-label='Nome'>{$row['nome']}</td>
                                <td data-label='Id do CNE'>{$row['id_cne']}</td>
                                <td data-label='Data de Nascimento'>{$row['dt_nascimento']}</td>
                                <td data-label='Cargo'>{$row['cargo']}</td>
                                <td data-label='Etapa de Progresso'>{$row['etapa_progresso']}</td>
                                <td data-label='Noites de Campo'>{$row['noites_campo']}</td>
                                <td data-label='Doenças'>{$row['doencas']}</td>
                                <td>
                                    <a href='form_update.php?id={$row['id']}'>editar</a>
                                </td>
                            </tr>";
                    }
                    echo "</tbody></table>";
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