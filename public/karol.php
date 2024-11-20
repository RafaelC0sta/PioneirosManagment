<?php 
    require '../private/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karol</title>
</head>
<body>
    <!-- Este ecra vai ser para mostrar os pioneiros da Karol -->
    <div class="tabelaPioneiros">
        <h3>Karol</h3>
        <?php 
            $selectPioneiros = "SELECT * FROM pioneiros where equipa='Karol Wojtyla'";
            $result = $connection->query($selectPioneiros);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Id do CNE</th>
                            <th>Data de Nascimento</th>
                            <th>Equipa</th>
                            <th>Cargo</th>
                            <th>Etapa de Progresso</th>
                            <th>Noites de Campo</th>
                            <th>Doenças</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['id_cne']}</td>
                            <td>{$row['dt_nascimento']}</td>
                            <td>{$row['equipa']}</td>
                            <td>{$row['cargo']}</td>
                            <td>{$row['etapaprogresso']}</td>
                            <td>{$row['noitescampo']}</td>
                            <td>{$row['doencas']}</td>
                        </tr>";
                }

                echo "</table>";
            }
        ?>
    </div>
    <div class="tabelaPioneiros">
        <h3>Salgueiro</h3>
        <?php 
            $selectPioneiros = "SELECT * FROM pioneiros where equipa='Salgueiro Maia'";
            $result = $connection->query($selectPioneiros);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Id do CNE</th>
                            <th>Data de Nascimento</th>
                            <th>Equipa</th>
                            <th>Cargo</th>
                            <th>Etapa de Progresso</th>
                            <th>Noites de Campo</th>
                            <th>Doenças</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['id_cne']}</td>
                            <td>{$row['dt_nascimento']}</td>
                            <td>{$row['equipa']}</td>
                            <td>{$row['cargo']}</td>
                            <td>{$row['etapaprogresso']}</td>
                            <td>{$row['noitescampo']}</td>
                            <td>{$row['doencas']}</td>
                        </tr>";
                }

                echo "</table>";
            }
        ?>
    </div>
    <div class="tabelaPioneiros">
        <h3>Nelson</h3>
        <?php 
            $selectPioneiros = "SELECT * FROM pioneiros where equipa='Nelson Mandela'";
            $result = $connection->query($selectPioneiros);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Id do CNE</th>
                            <th>Data de Nascimento</th>
                            <th>Equipa</th>
                            <th>Cargo</th>
                            <th>Etapa de Progresso</th>
                            <th>Noites de Campo</th>
                            <th>Doenças</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['id_cne']}</td>
                            <td>{$row['dt_nascimento']}</td>
                            <td>{$row['equipa']}</td>
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
    <button><a href="form_add.php">Adicionar Pioneiro</a></button>
</body>
</html>