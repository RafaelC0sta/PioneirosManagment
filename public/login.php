<?php 
    session_start();
    include '../private/connection.php';

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM login where username = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $pioneiro = $resultado->fetch_assoc();

        if ($pioneiro && $pioneiro['password'] === $password) {
            $_SESSION['pioneiro'] = $username;
            header("Location: ../public/karol.php");
            exit;
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
<?php include("header.php") ?>
<body>
    <div class="body">
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