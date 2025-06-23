<?php

    include 'conexao.php' ;


    $mensagem = "bem-vindo ao seas e de inicio a sua saude mental";
    $mensagem2=" ";

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);


        if (strlen($email) == 0) {
            echo 'Preencha o seu e-mail, para prosseguir';
        } else if (strlen($senha) == 0) {
            echo 'Preencha a sua senha, para prosseguir';
        } else {
            $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $pacientes = $stmt->fetch();

            if ($pacientes && password_verify($senha, $pacientes['senha'])) { 
                $_SESSION['id'] = $pacientes['id'];
                $_SESSION['nome'] = $pacientes['usuario'];

                header("Location: ../vision/home-paciente.php");
                exit;
            } else {
                $mensagem ="  ";
                $mensagem2 =" Dados de login invalidos";
            }
        }
    }
?>