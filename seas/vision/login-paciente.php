<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$mensagem2 = $_SESSION['login_erro'] ?? ''; 
unset($_SESSION['login_erro']);  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/forms.css">
    <title>Login – SEAS</title>
</head>
<body>
<main class="container">
    <form action="../keys/login-paciente-funcional.php" method="POST">
        <h1>Acesse sua conta</h1>
        <h2 class="containerh2"><?= htmlspecialchars($mensagem2) ?></h2>

        <div class="input-box">
            <label>E-mail:</label>
            <input type="email" name="email" required placeholder="Digite seu e-mail">
        </div>

        <div class="input-box">
            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="Digite sua senha">
        </div>

        <button class="login" type="submit">Entrar</button>

        <p class="register-link">
            Ops… não tenho conta!
            <a href="./filtro-de-usuarios-cadastro.html">Criar agora</a>
        </p>
    </form>
</main>
</body>
</html>



<!-- ?php

    // if (session_status() === PHP_SESSION_NONE) { 
    //     session_start();
    // }
    // ob_start();  

    // include_once 'conexao.php';  
    // $mensagem2 = '';

 

// ?

<!DOCTYPE html>  
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/forms.css" media="screen" />  
    <title>login</title>
</head>
<body> 
    <main class = "container">
        <form action="../keys/login-paciente-funcional.php" method="POST">
            <h1>Acesse sua conta!! </h1>
            <h5 class='containerh5' >?php  ? </h5>
            <h2 class='containerh2'>?php echo $mensagem2; ?</h2>

            <div class="input-box">
                <p>
                    <label>E-mail:</label>
                    <input type="email" name="email" required placeholder="Digite seu e-mail">
                    <i class="bx bxs-user"></i>
                </p>
            </div>

            <div class="input-box">
                <p>
                    <label>Senha:</label>
                    <input type="password" name="senha" required placeholder="Digite sua senha">
                    <i class="bx bxs-lock-alt"></i>
                </p>
            </div>
 
            <p>
                <button class="login" type="submit" >Acesse sua conta</button>
            </p>

            <div class="register-link">
                <p>Ops... não tenho conta! <a href="./filtro-de-usuarios-cadastro.html">Sem problema, crie sua conta aqui!</a></p>
            </div>
        </form>
    </main>
</body>
</html> -->