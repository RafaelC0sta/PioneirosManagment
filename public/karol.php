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
    <title>Karol Wojtyla</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include('header.php'); ?>
<body>
    <!-- Este ecra vai ser para mostrar os pioneiros da Karol -->
    <div class="body">
        <div class="tabelaPioneiros">
            <h2>Karol Wojtyla</h2><br>
            <?php 
                $selectPioneiros = "SELECT * FROM pioneiros where equipa='Karol Wojtyla'";
                $result = $connection->query($selectPioneiros);

                if ($result && $result->num_rows > 0):
            ?>
                <table class="tabelasPioneiros">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Id do CNE</th>
                            <th>Data de Nascimento</th>
                            <th>Cargo</th>
                            <th>Etapa de Progresso</th>
                            <th>Noites de Campo</th>
                            <th>Doenças</th>
                            <?php if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Karol Wojtyla"): ?>
                                <th>Ações</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td data-label='Nome'>" . htmlspecialchars($row['nome']) . "</td>";
                                echo "<td data-label='Id do CNE'>" . htmlspecialchars($row['id_cne']) . "</td>";
                                echo "<td data-label='Data de Nascimento'>" . htmlspecialchars($row['dt_nascimento']) . "</td>";
                                echo "<td data-label='Cargo'>" . htmlspecialchars($row['cargo']) . "</td>";
                                echo "<td data-label='Etapa de Progresso'>" . htmlspecialchars($row['etapa_progresso']) . "</td>";
                                echo "<td data-label='Noites de Campo'>" . htmlspecialchars($row['noites_campo']) . "</td>";
                                echo "<td data-label='Doenças'>" . htmlspecialchars($row['doencas']) . "</td>";
                                
                                // Exibir a coluna "editar" apenas se a condição for verdadeira
                                if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Karol Wojtyla") {
                                    echo "<td data-label='Ações'><a href='form_update.php?id=" . htmlspecialchars($row['id']) . "'>editar</a></td>";
                                }
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    else:
                        echo "<p>Nao foram encontrados pioneiros nesta equipa</p>";
                    endif;
                ?>
        </div><br>
        <div>
            <?php if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Karol Wojtyla"): ?>
                <a href="form_add.php?equipa=Karol Wojtyla"><button class="botao" id="btn_karol"><span>Adicionar Pioneiro</span></button></a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>