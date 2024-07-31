<?php 

try {
    $conn = new pdo ('mysql:host=localhost; dbname=test', 'root', '');
} catch (PDOException $e){
    echo "Erro ao conectar: Erro " . $e->getMessage();
}