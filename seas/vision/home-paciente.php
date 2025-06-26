<?php
require_once '../keys/protection.php'; 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/index.css">
    <title>Bem-vindo ao SEAS</title>
</head>
<body>
<header>
    <nav>
        <a class="logo" href="/">SEAS</a>
        <ul class="nav-list">
            <li><a href="./form-agendamento.php">Novo Agendamento</a></li>
            <li><a href="./form-create-rotina.php">Nova Rotina Médica</a></li>
            <li><a href="/">Fale Conosco</a></li>
            <li>
                <button class="login button-tabela"
                        onclick="location.href='./form-editar-dados-perfil.php?id=<?= $_SESSION['id'] ?>' ">
                    Perfil
                </button>
            </li>
            <li><a href="../keys/logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="container">
        <h2>Bem-vindo, <?= $_SESSION['name'] ?>!</h2>
    </div>
</main>
</body>
</html>