 <?php
    include "../keys/protection.php";
    if (!isset($_SESSION['id'])) {
        header('Location: ../vision/login-paciente.php');
        exit;
    }
 
?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/index.css">
    <title>Bem Vindo Ao SEAS</title>
</head>
<body>
    <header> 
        <nav>
            <a class="logo" href="/"> SEAS </a>
            <div class="mobile-menu">
                <div  class="line1"></div>
                <div  class="line2"></div>
                <div  class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="./seas/vision/">Criar um novo Agendamento</a></li>
                <li><a href="./form-create-rotina.php">Criar Uma nova Rotina medica </a></li>
                <li><a href="/">Fale Conosco</a></li>
                <li><button class="login button-tabela" onclick="location.href='./form-editar-dados-perfil.php?id=<?=  $_SESSION['id']?>'" class="btn">Perfil</button> </li>
                <li><a href="../keys/logout.php">SAIR</a></li>
            </ul>
        </nav>
    </header>
    <main> 
        <div class='container'>
            <h2>bem vindo ao painel,<?php echo $_SESSION['nome']; ?></h2>
            <h2>Bem vindo ao painel, <?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?></h2>
        </div>
        <div class='container'>
            <h2>Bem-vindo ao painel, <?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?>!</h2>
        </div>

    </main>
    <script src="./seas/animations/mobile-navbar.js"></script>
    
</body>
</html>