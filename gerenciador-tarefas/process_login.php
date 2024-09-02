<?php
require __DIR__ . '/connect.php';
session_start();

if (isset($_POST['action'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($_POST['action'] == 'register') {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword); 

        if ($stmt->execute()) {
            $_SESSION['success'] = "Usuário cadastrado com sucesso.";
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['error'] = "Erro ao cadastrar usuário.";
            header('Location: register.php');
            exit();
        }
    } elseif ($_POST['action'] == 'login') {
        // Login de usuário
        $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparação de senha segura com password_verify():
        if ($user && password_verify($password, $user['password'])) { 
            $_SESSION['username'] = $username; 
            
            // Define a variável de sessão com o ID do usuário:
            $_SESSION['user_id'] = $user['id']; 

            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "Usuário ou senha incorretos.";
            header('Location: login.php');
            exit();
        }  
    } 
} else {
    header('Location: login.php');
    exit();
}
?>