<?php
    session_start();
    include_once "conexao.php";

    $mensagem_de_email = " ";
    $mensagem_de_senha = " ";
    $mensagem_de_usuario = " ";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
            $email = trim(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
            $senha = trim($_POST['senha'] ?? '');


            
            if (!trim($email)) {
                $mensagem_de_email = "E-mail inválido.";
            }

            if (empty(trim($senha)) || strlen(trim($senha)) < 6) {
                $mensagem_de_senha = "Senha fraca (mínimo 6 caracteres).";
            }

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
            $stmt->execute([$usuario]);
            if ($stmt->fetchColumn() > 0) {
                $mensagem_de_usuario = "Este usuário já está cadastrado.";
            }

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetchColumn() > 0) {
                $mensagem_de_email = "Este e-mail já está cadastrado.";
            }

            if ($mensagem_de_email === " " && $mensagem_de_senha === " " && $mensagem_de_usuario === " ") {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO pacientes(usuario, email, senha) VALUES (:usuario, :email, :senha)");
                $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':senha', $senha_hash, PDO::PARAM_STR);
                $stmt->execute();

                $_SESSION['id'] = $pdo->lastInsertId();
                $_SESSION['nome'] = $usuario;

                header('Location: ../vision/home-paciente.php');
                exit;
   
            }

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
} 

//     include_once "./conexao.php";



//         if (!$email) {
//             $mensagem_de_email = " E-mail invalido.";
//         }

//         if (empty($senha) || strlen($senha) < 6) {
//             $mensagem_de_senha = " Senha fraca(a senha deve conter 6 caracteres ou mais).";
//         }

//         $insert = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ? ");
//         $insert->execute([$usuario]);
//         if ($insert->fetchColumn() > 0) {
//              $mensagem_de_usuario = "Este usuario já está cadastrado. ";
//         }

//         $insert = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE email = ? ");
//         $insert->execute([$email]);
//         if ($insert->fetchColumn() > 0) {
//             $mensagem_de_email = "Este e-mail já está cadastrado.";
//         }
//         if ($mensagem_de_email===" " && $mensagem_de_senha ===" " && $mensagem_de_usuario === " ") {
            
//             $insert = $pdo -> prepare("INSERT INTO pacientes(usuario, email, senha) VALUES (:usuario, :email, :senha)");

//             $senha_hash = password_hash($senha, PASSWORD_DEFAULT );

//             $insert -> bindvalue(':usuario', $usuario, PDO::PARAM_STR);
//             $insert -> bindvalue(':email', $email, PDO::PARAM_STR);
//             $insert -> bindvalue(':senha', $senha_hash, PDO::PARAM_STR);
//             $insert -> execute();
        
//             if (session_status() !== PHP_SESSION_ACTIVE) {
//                 session_start();
//                 $_SESSION['id'] = $pdo->lastInsertId();
//                 $_SESSION['nome'] = $usuario;
//                 header('location: ../vision/home-paciente.php');
//             }

            
//         }
//     } catch (PDOException $e) {
//         echo "Erro" . $e -> getMessage();    
//     }
// // ?> 
