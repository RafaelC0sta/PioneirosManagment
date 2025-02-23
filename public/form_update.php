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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Adicionar Pioneiro</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<?php include('header.php'); ?>
<body class="bg-gray-100">
    <div class="flex justify-center py-10">
        <section class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 w-full max-w-3xl">
            <form action="../private/update_pioneiro.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Pioneiro: </label>
                <input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-2">Numero de Identificacao do CNE: </label>
                <input type="number" name="id_cne" value="<?php echo $row['id_cne']; ?>" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento: </label>
                <input type="date" name="dt_nascimento" value="<?php echo $row['dt_nascimento']; ?>" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>

                <label class="block text-sm font-medium text-gray-700 mb-2">Equipa: </label>
                <input type="text" name="equipa" value="<?= htmlspecialchars($row['equipa']); ?>" readonly class="w-full p-3 border border-gray-300 rounded-md text-gray-800 bg-gray-100 mb-4"><br>
                
                <label for="cargo" class="block text-sm font-medium text-gray-700 mb-2">Cargo:</label>
                <select id="cargo" name="cargo" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="guia" <?php echo $row['cargo'] == 'Guia' ? 'selected' : ''; ?>>Guia</option>
                    <option value="subguia" <?php echo $row['cargo'] == 'Subguia' ? 'selected' : ''; ?>>Sub-Guia</option>
                    <option value="secretario" <?php echo $row['cargo'] == 'Secretario' ? 'selected' : ''; ?>>Secretário</option>
                    <option value="tesoureiro" <?php echo $row['cargo'] == 'Tesoureiro' ? 'selected' : ''; ?>>Tesoureiro</option>
                    <option value="guardamaterial" <?php echo $row['cargo'] == 'Guardamaterial' ? 'selected' : ''; ?>>Guarda Material</option>
                    <option value="cozinheiro" <?php echo $row['cargo'] == 'Cozinheiro' ? 'selected' : ''; ?>>Cozinheiro</option>
                    <option value="socorrista" <?php echo $row['cargo'] == 'Socorrista' ? 'selected' : ''; ?>>Socorrista</option>
                    <option value="animador" <?php echo $row['cargo'] == 'Animador' ? 'selected' : ''; ?>>Animador</option>
                </select><br>

                <label for="etapaprogresso" class="block text-sm font-medium text-gray-700 mb-2">Etapa do Progresso</label>
                <select id="etapaprogresso" name="etapaprogresso" value="<?php echo $row['etapa_progresso'] ?>" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="desprendimento" <?php echo $row['etapa_progresso'] == 'Desprendimento' ? 'selected' : ''; ?>>Desprendimento</option>
                    <option value="conhecimento" <?php echo $row['etapa_progresso'] == 'Conhecimento' ? 'selected' : ''; ?>>Conhecimento</option>
                    <option value="vontade" <?php echo $row['etapa_progresso'] == 'Vontade' ? 'selected' : ''; ?>>Vontade</option>
                    <option value="construcao" <?php echo $row['etapa_progresso'] == 'Construcao' ? 'selected' : ''; ?>>Construção</option>
                </select><br>

                <label class="block text-sm font-medium text-gray-700 mb-2">Noites de Campo: </label>
                <input type="number" name="noitescampo" id="noitescampo" value="<?php echo $row['noites_campo']; ?>" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><br>
                
                <label class="block text-sm font-medium text-gray-700 mb-2">Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="3" cols="50" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 mb-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"><?php echo htmlspecialchars($row['observacoes']); ?></textarea><br>

                <input type="submit" value="Editar" class="w-full bg-blue-400 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </form>
        </section>
    </div>
</body>
</html>
