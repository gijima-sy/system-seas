 <?php
    include "../keys/protection.php";
?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/index.css">
    <title>SEAS</title>
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
                <li><a href="/">Agendamento de terapias </a></li>
                <li><a href="./form-create-rotina.php">Rotina Medica</a></li>
                <li><a href="/">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <div class='container'>
            <h2>bem vindo ao painel,<?php echo $_SESSION['nome']; ?></h2>


            <p>
                <a href="../keys/logout.php"> sair </a>
            </p>
         </div>
    </main>
    <script src="./seas/animations/mobile-navbar.js"></script>
    
</body>
</html>