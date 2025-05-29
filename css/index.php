<?php
    session_start();
    include('conexao.php');

    $mensagem = "bem-vindo ao seas e de inicio a sua saude mental";

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);


        if (strlen($email) == 0) {
            echo 'Preencha o seu e-mail, para prosseguir';
        } else if (strlen($senha) == 0) {
            echo 'Preencha a sua senha, para prosseguir';
        } else {
            $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE email = :email");
            $stmt->bindValue('email', $email);
            $stmt->execute();
            $pacientes = $stmt->fetch();

            if ($pacientes && $senha === $pacientes['senha']) { 
                $_SESSION['id'] = $pacientes['id'];
                $_SESSION['nome'] = $pacientes['nome'];

                header("Location: painel.php");
                exit;
            } else {
                $mensagem ="Dados de login inválidos";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />  
    <title>login</title>
</head>
<body>
    <main class = "container">
        <form action="" method="POST">
            <h1>Acesse sua conta!! </h1>
            <h5 ><?php echo $mensagem; ?> </h5>
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
                <p>Ops... não tenho conta! <a href="cadastre-se.php">Sem problema, crie sua conta aqui!</a></p>
            </div>
        </form>
    </main>
</body>
</html>