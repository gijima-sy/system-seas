<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');


    if ($email === '' || $senha === '') {
        $_SESSION['login_erro'] = 'Preencha e-mail e senha.';
        header('Location: ../vision/login-paciente.php');
        exit;
    }


    $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
    $stmt->bindValue();
    $stmt->execute([':email' => $email]);
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($paciente && password_verify($senha, $paciente['senha'])) {
        $_SESSION['id']   = $paciente['id'];
        $_SESSION['name'] = $paciente['usuario'];
        header('Location: ../vision/home-paciente.php');
        exit;
    }


    $_SESSION['login_erro'] = 'E-mail ou senha incorretos.';
    header('Location: ../vision/login-paciente.php');
    exit;
}



// if (session_status() === PHP_SESSION_NONE) { session_start(); }
// require_once 'conexao.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $email = trim($_POST['email'] ?? '');
//     $senha = trim($_POST['senha'] ?? '');


//     if ($email === '' || $senha === '') {
//         $_SESSION['login_erro'] = 'Preencha e-mail e senha.';
//         header('Location: ../vision/login-paciente.php');
//         exit;
//     }


//     $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
//     $stmt->bindValue();
//     $stmt->execute([':email' => $email]);
//     $paciente = $stmt->fetch(PDO::FETCH_ASSOC);


//     if ($paciente && password_verify($senha, $paciente['senha'])) {
//         $_SESSION['id']   = $paciente['id'];
//         $_SESSION['name'] = $paciente['usuario'];
//         header('Location: ../vision/home-paciente.php');
//         exit;
//     }


//     $_SESSION['login_erro'] = 'E-mail ou senha incorretos.';
//     header('Location: ../vision/login-paciente.php');
//     exit;
// }

