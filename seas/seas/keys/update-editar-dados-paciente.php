
<?php
    include_once "conexao.php";

        try {
            $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT );
            $usuario = filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'];
            $senha_hash = null;


            if (!$email) {
                $mensagem1 = "E-mail invalido.";
            }

            if(!empty($senha)){
                if (strlen($senha) <6) {
                    $mensagem2= "Senha fraca(mín. 6 caracteres)."
                    
                }
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            }

            if (empty($senha) || strlen($senha) < 8) {
                $mensagem3= "Senha fraca(mín. 6 caracteres).";
            }
            if (empty($usuario) || strlen($usuario) < 3) {
                $mensagem4="Usuario invalido(mín. 3 caracteres).";
            }


            $verificando = $pdo->prepare("SELECT COUNT(*)FROM pacientes WHERE usuario = :usuario AND id <> :id ");
            $verificando->execute([':usuario' => $usuario, ':id' => $id]);

            if ($verificando->fetchColumn() > 0) {
                die("Este usuário já está cadastrado.");
            }


        
            $update = $pdo -> prepare("UPDATE pacientes SET usuario = :usuario, email = :email, senha = :senha WHERE id = :id");


            $update -> bindvalue(':id', $id, PDO::PARAM_STR);
            $update -> bindvalue(':usuario', $usuario, PDO::PARAM_STR);
            $update -> bindvalue(':email', $email, PDO::PARAM_STR);
            $update -> bindvalue(':senha', $senha_hash, PDO::PARAM_STR);
            $update -> execute();
        
            header('location: ./vision/painel-.php');

        } catch (PDOException $e) {
            echo "Erro" . $e -> getMessage();    
        }
?>

