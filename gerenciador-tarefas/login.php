<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login e Cadastro</title>
</head>
<body>

<div class="login">
    
    <div class="container">
    <div class="header">
        <h1>Login</h1>
    </div>
    <div class="form">
        <form action="process_login.php" method="post">
            <label for="username">Usuário:</label>
            <input type="text" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" name="password" required>
            <button type="submit" name="action" value="login">Login</button>
            
        </form>
        <div class="cdt">
            <p class="text">ou</p>
            <a class="link-aut" href="register.php">Crie sua conta</button> <!-- Link para a página de cadastro -->
        </div>
    </div>
</div>
</div>


</body>
</html>
