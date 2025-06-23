 <?php

    include_once "conexao.php";
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
            $medicamento = trim(filter_input(INPUT_POST,'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
            $dose = trim(filter_input(INPUT_POST,'dose', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $horario = trim(filter_input(INPUT_POST,'horario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


            $temErro = false;

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
            $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);

            if ($stmt->fetchColumn() == 0) {
                $mensagem_usuario = "Insira um usuário válido.";
                $temErro = true;
            }

            if (empty($horario)) {
                $mensagem_horario = "Insira um horário válido.";
                $temErro = true;
            } 

            if (empty($dose)) {
                $mensagem_dose = "Insira uma dose válida.";
                $temErro = true;
            }

            if (empty($medicamento)) {
                $mensagem_medicamento = "Insira um medicamento válido.";
                $temErro = true;
            }


            if ( $temErro === false) {
                $update = $pdo -> prepare("UPDATE rotinas SET usuario = :usuario, medicamento = :medicamento, dose = :dose, horario = :horario WHERE id = :id");
                $update -> bindvalue(':id', $id, PDO::PARAM_STR);
                $update -> bindvalue(':usuario', $usuario, PDO::PARAM_STR);
                $update -> bindvalue(':medicamento', $medicamento, PDO::PARAM_STR);
                $update -> bindvalue(':dose', $dose, PDO::PARAM_STR);
                $update -> bindvalue(':horario', $horario, PDO::PARAM_STR);
                $update -> execute();


                $_SESSION['id'] = $pdo->lastInsertId();
                $_SESSION['nome'] = $usuario;

                header('Location: ../vision/painel-rotinas.php');
                exit;
            } 

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
?>

