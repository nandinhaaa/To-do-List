<?php
    require __DIR__ . '/connect.php';
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    if (!isset($_GET['key'])) {
        header('Location: index.php');
        exit();
    }

    $id = $_GET['key'];

    $stmt = $conn->prepare('SELECT * FROM tasks WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        header('Location: index.php');
        exit();
    }

    if (isset($_POST['update'])) {
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $task_date = $_POST['task_date'];

        $stmt = $conn->prepare('UPDATE tasks SET task_name = :task_name, task_description = :task_description, task_date = :task_date WHERE id = :id');
        $stmt->bindParam(':task_name', $task_name);
        $stmt->bindParam(':task_description', $task_description);
        $stmt->bindParam(':task_date', $task_date);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Tarefa atualizada com sucesso.";
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "Erro ao atualizar tarefa.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar Tarefa</title>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Editar Tarefa</h1>
        </div>
        <div class="form">
            <form action="edit.php?key=<?php echo $id; ?>" method="post">
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" required>
                <label for="task_description">Descrição:</label>
                <input type="text" name="task_description" value="<?php echo htmlspecialchars($task['task_description']); ?>" required>
                <label for="task_date">Data:</label>
                <input type="date" name="task_date" value="<?php echo $task['task_date']; ?>" required>
                <button type="submit" name="update">Atualizar</button>
            </form>
        </div>
        <div class="footer">
            <p><a href="index.php">Voltar</a></p>
        </div>
    </div>

</body>

</html>
