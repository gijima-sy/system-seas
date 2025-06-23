<?php
    $mensagem_de_usuario = "";
    $mensagem_de_email = "";
    $mensagem_de_senha = "";
    
    include_once "../keys/conexao.php";

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

            <div class="input-box">
                <p>    
                    <h2><?php echo $mensagem_de_usuario;?></h1>
                    <label>Nome de Usuario:</label>
                    <input type="text" name="usuario" id="usuario-id"  placeholder="Digite seu nome de usuario:">
                </p>
            </div>

            <div class="input-box">
                <p>
                    <h2><?php echo $mensagem_de_email;?></h2>
                    <label> Email:</label>
                    <input type="email" name="email" id="email-id"  placeholder="Digite seu e-mail:">
                </p> 
            </div>

            <div class="input-box">
            
                <p>
                    <h2><?php echo $mensagem_de_senha;?></h2>
                    <label>Senha:</label>
                    <input  type="password" name="senha" id="senha-id"  placeholder="Digite sua senha:">
                </p>
                    
            </div>
            <p>
                <input type="submit" class="login" value="cadastrar">
            </p>



        </form>
    </main>
</body>
</html>