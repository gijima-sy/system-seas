<?php
    // session_start();
    // require_once 'conexao.php' ;


    // $mensagem = "bem-vindo ao seas e de inicio a sua saude mental";
    // $mensagem2=" ";

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $email = trim($_POST['email'] ?? '');
    //     $senha = trim($_POST['senha'] ?? '');        
    // }

    // if($email === '' || $senha === ''){
    //     $mensagem2 = 'Preencha e-mail e senha para prosseguir';
    // } else{
    //     $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
    //     $stmt->execute([':email' => $email]);
    //     $paciente = $stmt -> fetch(PDO::FETCH_ASSOC);

    //     if ($paciente && password_verify($senha, $paciente['senha'])) {
    //         $_SESSION['id'] = $paciente['id'];
    //         $_SESSION['nome']  = $paciente['usuario'];
    //         header('location: ../vision/home-paciente.php');
    //     } else{
    //         $mensagem2 = 'E-mail ou senha incorretos.';
    //     }
    // }



    require_once 'conexao.php';

    $mensagem2 = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if ($email === '' || $senha === '') {
            $mensagem2 = 'Preencha e-mail e senha para prosseguir';
        } else {
            $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($paciente && password_verify($senha, $paciente['senha'])) {
                $_SESSION['id'] = $paciente['id'];
                $_SESSION['nome'] = $paciente['usuario'];
                header('Location: ../vision/home-paciente.php');
                exit;
            } else {
                $mensagem2 = 'E-mail ou senha incorretos.';
            }
        }
    }
    ?>
