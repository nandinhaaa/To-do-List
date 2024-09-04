<?php
    require __DIR__ . '/connect.php';
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Cadastro</h1>
        </div>
        <div class="form">
            <form action="process_login.php" method="post">
                <label for="username">Usuário:</label>
                <input type="text" name="username" required>
                <label for="password">Senha:</label>
                <input type="password" name="password" required>
                <button type="submit" name="action" value="register">Cadastrar</button>
            </form>
            <div class="cdt">
                <a class="link-aut" href="login.php">Já tem uma conta? Faça login</a> <!-- Link para a página de login -->
            </div>
        </div>
    </div>

</body>

</html>
