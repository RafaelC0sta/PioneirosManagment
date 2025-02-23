<?php 
    require '../private/checkLogin.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Adicionar Pioneiro</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<?php include('header.php'); ?>
<body class="bg-gray-100">
    <div class="flex justify-center py-10">
        <section class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 w-full max-w-3xl">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4"><?= htmlspecialchars($equipa)?></h2>
            <form action="../private/add_pioneiro.php" method="post">
                
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Pioneiro:</label>
                <input type="text" name="nome" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Numero de Identificacao do CNE:</label>
                <input type="number" name="id_cne" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento:</label>
                <input type="date" name="dt_nascimento" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Equipa:</label>
                <input type="text" name="equipa" value="<?= htmlspecialchars($equipa)?>" readonly class="w-full p-3 border border-gray-300 rounded-md text-gray-800 bg-gray-100 mb-4"><br>
                
                <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">Cargo:</label>
                <select id="cargo" name="cargo" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="guia">Guia</option>
                    <option value="subguia">Sub-Guia</option>
                    <option value="secretario">Secretário</option>
                    <option value="tesoureiro">Tesoureiro</option>
                    <option value="guardamaterial">Guarda Material</option>
                    <option value="cozinheiro">Cozinheiro</option>
                    <option value="socorrista">Socorrista</option>
                    <option value="animador">Animador</option>
                </select><br>

                <label for="etapaprogresso" class="block text-sm font-medium text-gray-700 mb-1">Etapa do Progresso</label>
                <select id="etapaprogresso" name="etapaprogresso" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="desprendimento">Desprendimento</option>
                    <option value="conhecimento">Conhecimento</option>
                    <option value="vontade">Vontade</option>
                    <option value="construcao">Construção</option>
                </select><br>

                <label class="block text-sm font-medium text-gray-700 mb-1">Noites de Campo:</label>
                <input type="number" name="noitescampo" id="noitescampo" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                
                <label class="block text-sm font-medium text-gray-700 mb-1">Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50" required class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea><br>

                <input type="submit" value="Adicionar" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </form>
        </section>
    </div>
</body>
</html>
