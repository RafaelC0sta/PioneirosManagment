<?php 
    session_start();
    include '../private/connection.php';

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $queryUsername = "SELECT * FROM login where username = ?";
        $stmt = $connection->prepare($queryUsername);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $login = $resultado->fetch_assoc();

        if ($login && $login['password'] === $password) {
            //$queryCargoEquipa = "SELECT nome, cargo, equipa, noites_campo, etapa_progresso FROM pioneiros WHERE id = ?";
            $queryCargoEquipa = "SELECT p.nome, c.cargo, e.equipa, noites_campo, ep.etapa_progresso from pioneiros as p
            join cargos as c on p.cargo_fk = c.cargo_id
            join equipas as e on p.equipa_fk = e.equipa_id
            join etapas_progresso as ep on p.etapa_progresso_fk = ep.etapa_id
            where p.id = ?";
            $stmt2 = $connection->prepare($queryCargoEquipa);
            $stmt2->bind_param("i", $login['pioneiro_id']);
            $stmt2->execute();
        
            $resultadoCargoEquipa = $stmt2->get_result();
            $pioneiroInfo = $resultadoCargoEquipa->fetch_assoc();
            if ($pioneiroInfo) {
                $_SESSION['pioneiro'] = $pioneiroInfo['nome'];
                $_SESSION['cargo'] = $pioneiroInfo['cargo'];
                $_SESSION['equipa'] = $pioneiroInfo['equipa'];
                $_SESSION['noites_campo'] = $pioneiroInfo['noites_campo'];
                $_SESSION['etapa_progresso'] = $pioneiroInfo['etapa_progresso'];
                header("Location: ../public/index.php");
                exit;
            } else {
                $erro = "Cargo ou equipa não encontrados para o pioneiro.";
            }
        } else {
            $erro = "Nome ou password incorretos.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-cover bg-center flex items-center justify-center h-screen" style="background-image: url('../images/bgDale.png');">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
        <section class="text-center">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Login</h2>
                <form action="login.php" method="post" class="space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-600 mb-2">Username</label>
                        <input type="text" name="username" id="username" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-md text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <input type="submit" value="Login" class="w-full p-3 bg-blue-500 text-white font-semibold rounded-md cursor-pointer hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    </div>
                </form>
            </div>

            <?php if ($erro): ?>
                <p class="text-red-500"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>
