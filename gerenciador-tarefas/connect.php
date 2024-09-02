<?php 

try {
    $conn = new PDO('mysql:host=localhost; dbname=test1', 'root', '');
} catch (PDOException $e){
    echo "Erro ao conectar: Erro " . $e->getMessage();
}
?>
