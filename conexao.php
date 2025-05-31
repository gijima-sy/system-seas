<?php
    try {
    $pdo = new PDO("mysql:host=localhost;dbname=sistema-seas", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
    }
?>