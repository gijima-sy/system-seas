<?php 

session_start();

include_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $medicamento = trim(filter_input(INPUT_POST,'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $dose = trim(filter_input(INPUT_POST,'dose', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $horario = trim(filter_input(INPUT_POST,'horario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $temErro = false;


        $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = :usuario");
        $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetchColumn() === 0) {
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

        if ($temErro === false) {
            $stmt = $pdo->prepare("INSERT INTO rotinas (usuario, medicamento, dose, horario) VALUES (:usuario, :medicamento, :dose, :horario)");
            $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindValue(':medicamento', $medicamento, PDO::PARAM_STR);
            $stmt->bindValue(':dose', $dose, PDO::PARAM_STR);
            $stmt->bindValue(':horario', $horario, PDO::PARAM_STR);
            $stmt->execute();

            $_SESSION['id'] = $pdo->lastInsertId();
            $_SESSION['nome'] = $usuario;

            header('Location: ../vision/painel-rotinas.php');
            exit;
        } else {
            
            $_SESSION['mensagem_de_super_erro'] = "Você deve ter preenchido algo errado, tente de novo";
            header('Location: ../vision/form-create-rotina.php');
            exit; 
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>



    // include_once "conexao.php";
   

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     try {
    //         $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
    //         $medicamento = trim(filter_input(INPUT_POST,'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
    //         $dose = trim(filter_input(INPUT_POST,'dose', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    //         $horario = trim(filter_input(INPUT_POST,'horario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


    //         $temErro = false;

    //         $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
    //         $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);

    //         if ($stmt->fetchColumn() === 0) {
    //             $mensagem_usuario = "Insira um usuário válido.";
    //             $temErro = true;
    //         }

    //         if (empty($horario)) {
    //             $mensagem_horario = "Insira um horário válido.";
    //             $temErro = true;
    //         }

    //         if (empty($dose)) {
    //             $mensagem_dose = "Insira uma dose válida.";
    //             $temErro = true;
    //         }

    //         if (empty($medicamento)) {
    //             $mensagem_medicamento = "Insira um medicamento válido.";
    //             $temErro = true;
    //         }


    //         if ( $temErro === false) {
    //             $stmt = $pdo->prepare("INSERT INTO rotinas(usuario, medicamento, dose, horario) VALUES (:usuario, :medicamento, :dose, :horario)");
    //             $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
    //             $stmt->bindValue(':medicamento', $medicamento, PDO::PARAM_STR);
    //             $stmt->bindValue(':dose', $dose, PDO::PARAM_STR);
    //             $stmt->bindValue(':horario', $horario, PDO::PARAM_STR);
    //             $stmt->execute();

    //             $_SESSION['id'] = $pdo->lastInsertId();
    //             $_SESSION['nome'] = $usuario;

    //             header('Location: ../vision/painel-rotinas.php');
    //             exit;
    //         } else {
    //             header('location: ../vision/form-create-rotina.php');
    //             $mensagem_de_super_erro = " Você deve ter preenchido algo errado tente de novo";
    //         }

    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //     }
    // }


<!-- 
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         try {
//             $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
//             $medicamento = trim(filter_input(INPUT_POST,'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
//             $dose = trim(filter_input(INPUT_POST,'dose', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
//             $horario = trim(filter_input(INPUT_POST,'horario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


            
//             $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
//             $stmt->execute([$usuario]);
//             if ($stmt->fetchColumn() == 0) {
//                 $mensagem_usuario = "Insira um usuario valido.";
//             }

//             if (empty(trim($horario))) {
//                 $mensagem_horario = "Insira um horario valido";
//             }

//             if (empty(trim($dose))) {
//                 $mensagem_dose = "Insira uma dose valida";
//             }
//              if (empty(trim($medicamento))) {
//                 $mensagem_medimamento = "Insira um medicamento valido";
//             }


//             if ($mensagem_dose === " " &&  $mensagem_medicamento === " " && $mensagem_usuario === " " && $mensagem_horario === "  ") {
//                 $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
//                 $stmt->execute([$usuario]);
//                 if ($stmt->fetchColumn()  == 1) {
//                     $stmt = $pdo->prepare("INSERT INTO rotina_medica(usuario, medicamento, dose, horario) VALUES (:usuario, :medicamento, :dose, :horario)");
//                     $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
//                     $stmt->bindValue(':medicamento', $medicamento, PDO::PARAM_STR);
//                     $stmt->bindValue(':dose', $dose, PDO::PARAM_STR);
//                     $stmt->bindValue(':horario', $horario, PDO::PARAM_STR);
//                     $stmt->execute();

//                     $_SESSION['id'] = $pdo->lastInsertId();
//                     $_SESSION['nome'] = $usuario;

//                     header('Location: ../vision/home-paciente.php');
//                     exit;
//             } else{ 
//                 $erro_fatal = " retorne e tente criar sua rotina";
//             }
   
//         }

//         } catch (PDOException $e) {
//             echo "Erro: " . $e->getMessage();
//         }
// } 
//  ?>  --> 