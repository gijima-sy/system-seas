<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname="sistema_seas", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
}
?>

