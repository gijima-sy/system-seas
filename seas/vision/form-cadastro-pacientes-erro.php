<?php

    session_start();
    $mensagem_erro = $_SESSION['mensagem_erro'] ?? '';
    $mensagem_de_email = $_SESSION['mensagem_de_email'] ?? '';
    $mensagem_de_senha = $_SESSION['mensagem_de_senha'] ?? '';
    $mensagem_de_usuario = $_SESSION['mensagem_de_usuario'] ?? '';

    unset($_SESSION['mensagem_erro'], $_SESSION['mensagem_de_email'], $_SESSION['mensagem_de_senha'], $_SESSION['mensagem_erro']);
 


?>
<!DOCTYPE html>  
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/forms.css" media="screen" />  
    <title>cadastro de usuario</title>
</head>
<body> 
    <main class = "container">
        <H1> Crie Sua Primeira Conta No SEAS </H1>
    

        <form action="../keys/create-cadastro-pacientes.php" method="POST">

            <?php if ($mensagem_erro): ?>
                <p class="erro"><?= htmlspecialchars($mensagem_erro) ?></p>
            <?php endif; ?>
            <div class="input-box">
                <?php if ($mensagem_de_usuario): ?>
                    <p class="erro"><?= htmlspecialchars($mensagem_de_usuario) ?></p>
                <?php endif; ?>
                <label>Nome de usuário:</label>
                <input type="text" name="usuario" required placeholder="Digite seu nome de usuário">
            </div>

            <div class="input-box">
                <?php if ($mensagem_de_email): ?>
                    <p class="erro"><?= htmlspecialchars($mensagem_de_email) ?></p>
                <?php endif; ?>
                <label>E-mail:</label>
                <input type="email" name="email" required placeholder="Digite seu e-mail">
            </div>

            <div class="input-box">
                <?php if ($mensagem_de_senha): ?>
                    <p class="erro"><?= htmlspecialchars($mensagem_de_senha) ?></p>
                <?php endif; ?>
                <label>Senha:</label>
                <input type="password" name="senha" required placeholder="Mínimo 8 caracteres">
            </div>

            <input type="submit" class="login" value="Cadastrar">
        </form>
    </main>
</body>
</html>