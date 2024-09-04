<?php
    require __DIR__ . '/connect.php';

    session_start();

    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $_GET['key']);
    $stmt->execute();
    $data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Gerenciador de Tarefas</title>
</head>

<body>

    <div class="details-container">
        <div class="header">
            <h1><?php echo $data[0]['task_name']; ?></h1>
        </div>

        <div class="row">
            <div class="details">
                <dl>
                    <dt>Descrição da Tarefa:</dt>
                    <dd><?php echo $data[0]['task_description'] ?></dd>
                    <dt>Data da Tarefa:</dt>
                    <dd><?php echo $data[0]['task_date']; ?></dd>
                </dl>
            </div>
            <div class="image">
                <img src="uploads/<?php echo $data[0]['task_image']; ?>" alt="Imagem tarefa">
            </div>
        </div>
        <div class="footer">
            <p>Desenvolvido por @Nanda e @Amanda</p>
        </div>
    </div>

</body>

</html>
