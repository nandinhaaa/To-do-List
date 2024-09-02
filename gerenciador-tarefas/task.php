<?php

require __DIR__ . '/connect.php';

session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirecionar para a página de login se não estiver logado
    exit(); 
}

if (isset($_POST['task_name'])) {
    if ($_POST['task_name'] != "") {

        $file_name = null; // Inicializa a variável para a imagem
        if (isset($_FILES['task_image']) && $_FILES['task_image']['error'] === UPLOAD_ERR_OK) { 
            $ext = strtolower(substr($_FILES['task_image']['name'], -4));
            $file_name = md5(date('Y.m.d.H.i.s')) . $ext;
            $dir = 'uploads/';

            if (move_uploaded_file($_FILES['task_image']['tmp_name'], $dir . $file_name)) {
                // Imagem movida com sucesso
            } else {
                // Erro ao mover a imagem 
                $_SESSION['error'] = "Erro ao fazer upload da imagem.";
                header('Location: index.php');
                exit(); 
            }
        }

        // Obter o ID do usuário logado da sessão
        $userId = $_SESSION['user_id'];

        $stmt = $conn->prepare('INSERT INTO tasks (task_name, task_description, task_image, task_date, user_id) 
                                VALUES (:name, :description, :image, :date, :user_id)');
        $stmt->bindParam('name', $_POST['task_name']);
        $stmt->bindParam('description', $_POST['task_description']);
        $stmt->bindParam('image',  $file_name);
        $stmt->bindParam('date', $_POST['task_date']);
        $stmt->bindParam('user_id', $userId); // Adicionando o user_id à consulta

        if ($stmt->execute()) {
            $_SESSION['success'] = "Tarefa adicionada com sucesso!";
        } else {
            $_SESSION['error'] = "Erro ao adicionar tarefa.";
        }
        header('Location: index.php'); 
        exit(); 
    } else {
        $_SESSION['error'] = "O campo nome da tarefa não pode ser vazio.";
        header('Location: index.php');
        exit(); 
    }
}

if (isset($_GET['key'])) {
    // Obter o ID do usuário logado da sessão
    $userId = $_SESSION['user_id'];

    // Proteger a exclusão com user_id
    $stmt = $conn->prepare('DELETE FROM tasks WHERE id = :id AND user_id = :user_id');
    $stmt->bindParam(':id', $_GET['key']);
    $stmt->bindParam(':user_id', $userId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Tarefa removida com sucesso!";
    } else {
        $_SESSION['error'] = "Erro ao remover tarefa.";
    }
    header('Location: index.php');
    exit(); 
}
?>