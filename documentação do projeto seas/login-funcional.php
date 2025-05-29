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