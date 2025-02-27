<?php
    require '../../../private/checkLogin.php';
    require '../../../private/connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Adicionar Atividade</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<?php include('../../header.php'); ?>
<body class="bg-gray-100">
    <div class="flex justify-center py-10">
        <section class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 w-full max-w-3xl">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Adicionar Atividade</h2>
            <form action="../../../private/add_atividade.php" method="post">
                <label class="block text-sm font-medium text-gray-700 mb-1">Presencas:</label>
                <button type="button" id="toggleTable" class="bg-blue-400 text-white py-2 px-4 rounded-md mb-4 hover:bg-blue-500">
                    Mostrar tabela
                </button>
                <div id="tabelaPresencas" class="hidden">
                    <?php
                        $selectPioneiros = "SELECT * FROM pioneiros ORDER BY equipa ASC";
                        $result = $connection->query($selectPioneiros);

                        if ($result && $result->num_rows > 0):
                    ?>
                    <table class="w-full min-w-full border-collapse border">
                        <thead class="bg-gray-600 text-white">
                            <th class="p-4 text-center">Nome</th>
                            <th class="p-4 text-center">Presente</th>
                            <th class="p-4 text-center">Falta</th>
                        </thead>

                        <tbody class="divide-y">
                            <?php 
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='p-4 text-center' data-label='Nome'>" . htmlspecialchars($row['nome']) . "</td>";
                                    echo "<td class='p-4 text-center' data-label='Presente' id='presente'><input type='checkbox' name='presente[]' value='{$row['id']}'></td>";
                                    echo "<td class='p-4 text-center' data-label='Falta' id='falta'><input type='checkbox' name='falta[]' value='{$row['id']}'></td>";
                                    echo "</tr>";
                                }
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="sm:flex gap-4 pt-4">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Data de Inicio:</label>
                        <input type="date" name="data_inicio" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>

                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Data de Fim:</label>
                        <input type="date" name="data_fim" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>

                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Noites de Campo:</label>
                        <input type="number" name="noites_campo" id="noites_campo" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>
                </div>
                
                <div class="sm:flex gap-4">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Local da Atividade:</label>
                        <input type="text" name="local" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>

                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tema:</label>
                        <input type="text" name="tema" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>
                </div>
                
                <label class="block text-sm font-medium text-gray-700 mb-1">Imaginario:</label>
                <textarea id="imaginario" name="imaginario" rows="3" cols="50" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Ementa</label>
                <textarea id="ementa" name="ementa" rows="3" cols="50" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <input type="submit" value="Adicionar" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </form>
        </section>
    </div>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("input[type='checkbox']").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                let row = this.closest("tr");
                let checkboxes = row.querySelectorAll("input[type='checkbox']");

                checkboxes.forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });
            });
        });
    });

    document.getElementById("toggleTable").addEventListener("click", function() {
        var tabela = document.getElementById("tabelaPresencas");
        if (tabela.classList.contains("hidden")) {
            tabela.classList.remove("hidden");
            this.textContent = "Ocultar Presenças";
        } else {
            tabela.classList.add("hidden");
            this.textContent = "Mostrar Presenças";
        }
    });
</script>