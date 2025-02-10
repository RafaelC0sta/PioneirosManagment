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
            $queryCargoEquipa = "SELECT nome, cargo, equipa, noites_campo FROM pioneiros WHERE id = ?";
            $stmt2 = $connection->prepare($queryCargoEquipa);
            $stmt2->bind_param("i", $login['id_pioneiro']);
            $stmt2->execute();
        
            $resultadoCargoEquipa = $stmt2->get_result();
            $pioneiroInfo = $resultadoCargoEquipa->fetch_assoc();
            if ($pioneiroInfo) {
                $_SESSION['pioneiro'] = $pioneiroInfo['nome'];
                $_SESSION['cargo'] = $pioneiroInfo['cargo'];
                $_SESSION['equipa'] = $pioneiroInfo['equipa'];
                $_SESSION['noites_campo'] = $pioneiroInfo['noites_campo'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="loginBg">
    <div class="loginFlex">
        <section class="login">
            <div class="loginForm">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Login">
                </form>
            </div>
            <br>
            <?php if ($erro): ?>
                <p style="color: red;"><?=htmlspecialchars($erro) ?></p>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>