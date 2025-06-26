<?php
    include_once "conexao.php";

    try {
        $usuario = filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha'];

        if (!$email) {
            die("E-mail invalido.");
        }

        if (empty($senha) || strlen($senha) < 8) {
            die("Senha fraca(mín. 6 caracteres).");
        }

        $insert = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE email = ? ");
        $insert->execute([$email]);
        if ($insert->fetchColumn() > 0) {
            die("Este e-maail já está cadastrado.");
        }
    
        $insert = $pdo -> prepare("INSERT INTO pacientes(usuario, email, senha) VALUES (:usuario, :email, :senha)");

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT );

        $insert -> bindvalue(':usuario', $usuario, PDO::PARAM_STR);
        $insert -> bindvalue(':email', $email, PDO::PARAM_STR);
        $insert -> bindvalue(':senha', $senha_hash, PDO::PARAM_STR);
        $insert -> execute();
       
        header('location: index.php');

    } catch (PDOException $e) {
        echo "Erro" . $e -> getMessage();    
    }
?>