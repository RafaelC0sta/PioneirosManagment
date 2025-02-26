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
            <form action="../private/add_atividade.php" method="post">
                <label class="block text-sm font-medium text-gray-700 mb-1">Presencas:</label>
                <div class="">
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
                                    echo "<td class='p-4 text-center' data-label='Presente' id='presente'><input type='checkbox'></td>";
                                    echo "<td class='p-4 text-center' data-label='Falta' id='falta'><input type='checkbox'></td>";
                                    echo "</tr>";
                                }
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="sm:flex gap-4 pt-8">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Data de Inicio:</label>
                        <input type="date" name="dt_nascimento" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>

                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Data de Fim:</label>
                        <input type="date" name="dt_nascimento" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>
                </div>
                
                <div class="sm:flex gap-4">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Local da Atividade:</label>
                        <input type="text" name="nome" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>

                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tema:</label>
                        <input type="text" name="nome" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                    </div>
                </div>
                
                <label class="block text-sm font-medium text-gray-700 mb-1">Imaginario:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Ementa</label>
                <input type="text" name="nome" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <input type="submit" value="Adicionar" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </form>
        </section>
    </div>
</body>
</html>