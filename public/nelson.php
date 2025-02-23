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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Nelson Mandela</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="../public/js/funcoes.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <!-- Este ecra vai ser para mostrar os pioneiros da Nelson -->
    <div class="p-6">
        <div class="max-w-[1450px] mx-auto">
            <h2 class="text-3xl font-bold">Nelson Mandela</h2>

            <div class="mt-6 bg-white shadow-sm rounded-md overflow-hidden">
                <div class="overflow-x-auto">
                <?php 
                    $selectPioneiros = "SELECT * FROM pioneiros where equipa='Nelson Mandela' order by cargo asc";
                    $result = $connection->query($selectPioneiros);

                    if ($result && $result->num_rows > 0):
                ?>
                    <table class="w-full min-w-full border-collapse">
                        <thead class="bg-gray-600 text-white">
                            <tr>
                                <th class="p-4 text-center">Nome</th>
                                <th class="p-4 text-center">Id do CNE</th>
                                <th class="p-4 text-center">Data de Nascimento</th>
                                <th class="p-4 text-center">Cargo</th>
                                <th class="p-4 text-center">Etapa de Progresso</th>
                                <th class="p-4 text-center">Noites de Campo</th>
                                <th class="p-4 text-center">Observações</th>
                                <?php if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Nelson Mandela"): ?>
                                    <th colspan="2">Ações</th>
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            <?php 
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='hover:bg-gray-100'>";
                                    echo "<td class='p-4 text-center' data-label='Nome'>" . htmlspecialchars($row['nome']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Id do CNE'>" . htmlspecialchars($row['id_cne']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Data de Nascimento'>" . htmlspecialchars($row['dt_nascimento']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Cargo'>" . htmlspecialchars($row['cargo']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Etapa de Progresso'>" . htmlspecialchars($row['etapa_progresso']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Noites de Campo'>" . htmlspecialchars($row['noites_campo']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Observações'>" . htmlspecialchars($row['observacoes']) . "</td>";
                                    
                                    // Exibir a coluna "editar" apenas se a condição for verdadeira
                                    if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Nelson Mandela") {
                                        echo "<td data-label='Ações'><a href='form_update.php?id=" . htmlspecialchars($row['id']) . "'><div class='icon'><img src='../images/editing.png' alt='edit_icon' style='width: 25px;'></div></a></td>";
                                        echo "<td data-label='Ações'><a href='#' onclick=confirmDelete(" . htmlspecialchars($row['id']) . ")><img alt='deleteIcon' src='../images/delete.png' style='width: 25px;'></a></td>";
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
                </div>
            </div>

            <div class="mt-6">
                <?php if (($cargo === "Guia" || $cargo === "Subguia") && $equipa === "Nelson Mandela"): ?>
                    <a href="#" class="bg-blue-400 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-500">
                        Adicionar Pioneiro
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>