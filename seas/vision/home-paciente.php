 <?php
    include "../keys/protection.php";
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
                <li><a href="./seas/vision/filtro-de-usuarios-cadastro.html">Sou Novo Aqui </a></li>
                <li><a href="./seas/vision/filtro-de-usuarios-login.html">Já Tenho Uma Conta </a></li>
                <li><a href="../keys/logout.php"></a> SAIR</li>
      
            </ul>
        </nav>
    </header>
    <main> 
        <div class='container'>
            <h2>bem vindo ao painel,<?php echo $_SESSION['nome']; ?></h2>
        </div>
    </main>
    <script src="./seas/animations/mobile-navbar.js"></script>
    
</body>
</html>