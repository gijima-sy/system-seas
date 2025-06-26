<?php

    session_start();
    require_once 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('location: ../vision/form-cadastro-pacientes.php');
        exit;
    }

    unset($_SESSION['mensagem_de_usuario'], $_SESSION['mensagem_de_email'], $_SESSION['mensagem_de_senha'], $_SESSION['mensagem_de_erro']);

    $usuario = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $senha = $_POST['senha'] ?? '';

    $temErro = false;
    
    //

    $stmt = $pdo -> prepare('SELECT 1 FROM pacientes WHERE usuario =:usuario LIMIT 1');
    $stmt -> execute([':usuario' => $usuario]);
    if ($stmt->fetchColumn()) {
        $_SESSION['mensagem_de_usuario'] = 'Este usuário já está cadastrado.';
        $temErro = true;
    }

    
    $stmt = $pdo -> prepare('SELECT 1 FROM pacientes WHERE email =:email LIMIT 1');
    $stmt -> execute([':email' => $email]);
    if ($stmt->fetchColumn()) {
        $_SESSION['mensagem_de_email'] = 'Este e-mail já está cadastrado.';
        $temErro = true;
    }


    if (strlen($senha) < 6) {
        $_SESSION['mensagem_de_senha'] = 'senha fraca(mínimo 6 caracteres.)';
        $temErro = true;
    }

    if ($temErro) {
        header('location: ../vision/form-cadastro-pacientes.php');
        exit;
    }

    try {
        $stmt = $pdo -> prepare('INSERT INTO pacientes (usuario,email,senha) VALUES (:usuario,:email,:senha)');
        $stmt->execute([':usuario' => $usuario, ':email' => $email, ':senha' => password_hash($senha, PASSWORD_DEFAULT)]);

        $_SESSION['id'] = $pdo->lastInsertId();
        $_SESSION['name'] = $usuario;

        
        header('location: ../vision/home-paciente.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['mensagem_erro'] = 'Erro ao gravar no banco. Tente novamente.';
        header('Location: ../vision/form-cadastro-pacientes.php');
        exit;
    }


































    // session_start();
    // include_once "conexao.php";

    //  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     try {
    //         $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
    //         $email = trim(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
    //         $senha = trim($_POST['senha'] ?? '');
    //         $senha_hash = password_hash($senha, PASSWORD_DEFAULT);


    //         if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['senha'])) {
    //             $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
    //             $stmt->execute([$usuario]);
    //             if ($stmt->fetchColumn() > 0) {
    //             $mensagem_de_usuario = "Este usuário já está cadastrado.";
    //             header('Location: ../vision/form-cadastro-pacientes.php');
    //             exit;
    //         } else {
    //             $mensagem_de_usuario = " ";    
    //         }
    //         if(strlen($senha) < 6){
    //             $mensagem_de_senha = " senha fraca(minimo de 8 caracteres)";
    //             header('Location: ../vision/form-cadastro-pacientes.php');
    //             exit;
    //         } else {
    //             $mensagem_de_senha = " ";
    //         }

    //         $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE email = ?");
    //         $stmt->execute([$email]);
    //         if ($stmt->fetchColumn() > 0) {
    //             $mensagem_de_email = "Este e-mail já está cadastrado.";
    //             header('Location: ../vision/form-cadastro-pacientes.php');
    //             exit;
    //         } else {
    //             $mensagem_de_email = " ";
    //         }

    //         if($mensagem_de_email === " " && $mensagem_de_senha == " " && $mensagem_de_usuario == " " ) {
    //             $stmt = $pdo->prepare("INSERT INTO pacientes(usuario, email, senha) VALUES (:usuario, :email, :senha)");
    //             $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
    //             $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    //             $stmt->bindValue(':senha', $senha_hash, PDO::PARAM_STR);                    
    //             $stmt->execute();

    //             $_SESSION['id'] = $pdo->lastInsertId();
    //             $_SESSION['nome'] = $usuario;


    //             if (session_status() !== PHP_SESSION_ACTIVE) {
    //                 session_start();
    //                 $_SESSION['id'] = $pdo->lastInsertId();
    //                 $_SESSION['nome'] = $usuario;
    //                 header('location: ../vision/home-paciente.php');
    //             }

    //             // header('Location: ../vision/home-paciente.php');
    //             // exit;
    //         }else {
    //             $mensagem_erro = " Ocorreu algum erro temte novamente";
    //             header("location: ../vision/form-cadastro-pacientes-erro.php");
        
    //         }

    //     } catch (PDOException ) {
    //         echo "Erro: " 
    //     }
        
    // }else {
    //     header("location: ../vision/form-cadastro-pacientes.php");
    // }
    


