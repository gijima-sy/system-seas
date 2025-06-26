<?php
    if (session_status() === PHP_SESSION_NONE) { session_start();}


    $mensagem_de_usuario = $_SESSION['mensagem_de_usuario'] ?? '';
    $mensagem_de_email = $_SESSION['mensagem_de_email'] ?? '';
    $mensagem_de_senha = $_SESSION['mensagem_de_senha'] ?? '';
    $mensagem_erro = $_SESSION['mensagem_erro'] ?? '';
    
    // usend($_SESSION['mensagem_de_usuario'], $_SESSION['mensagem_de_email'], $_SESSION['mensagem_de_senha'], $_SESSION['mensagem_erro'] );

    unset($_SESSION['mensagem_de_usuario'],
      $_SESSION['mensagem_de_email'],
      $_SESSION['mensagem_de_senha'],
      $_SESSION['mensagem_erro']);
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
        <form  action="../keys/create-cadastro-pacientes.php" method="POST">
        <form action="" method="POST">

            <h5 class='containerh5' ><?= htmlspecialchars($mensagem_erro) ?> </h5>


            <div class="input-box">
                <p>    
                    <p><?= htmlspecialchars($mensagem_de_usuario)?></p>
                    <label>Nome de Usuario:</label>
                    <input type="text" name="usuario" id="usuario-id" required  placeholder="Digite seu nome de usuario:">
                </p>
            </div>

            <div class="input-box">
                <p>
                    <p><?=  htmlspecialchars($mensagem_de_email)?></p>
                    <label> Email:</label>
                    <input type="email" name="email" id="email-id" required placeholder="Digite seu e-mail:">
                </p> 
            </div>

            <div class="input-box">
            
                <p>
                    <p><?= htmlspecialchars($mensagem_de_senha)?></p>
                    <label>Senha:</label>
                    <input  type="password" name="senha" id="senha-id" required placeholder="Digite sua senha:">
                </p>
                    
            </div>
            <p>
                <input type="submit" class="login" value="cadastrar">
            </p>

        </form>
    </main>
</body>
</html> 