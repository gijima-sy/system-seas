 <!-- <?php

    // include_once "conexao.php";
   

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     try {
    //         $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
    //         $medicamento = trim(filter_input(INPUT_POST,'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
    //         $dose = trim(filter_input(INPUT_POST,'dose', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    //         $horario = trim(filter_input(INPUT_POST,'horario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));



    //         if (isset($usuario) && isset($medicamento) && isset($dose) && isset($horario)) {
    //             $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ?");
    //             $stmt->execute([$usuario]);
    //             if ($stmt->fetchColumn() === 1){
                    
    //                 $update = $pdo -> prepare("UPDATE rotinas SET usuario = :usuario, dose = :dose , medicamento = :medicamento, horario = :horario WHERE id = :id");
                    

    //                 $update -> bindvalue(':id', $id, PDO::PARAM_STR);
    //                 $update -> bindvalue(':usuario', $usuario, PDO::PARAM_STR);
    //                 $update -> bindvalue(':medicamento', $medicamento, PDO::PARAM_STR);
    //                 $update -> bindvalue(':dose', $dose, PDO::PARAM_STR);
    //                 $update -> bindvalue(':horario', $horario, PDO::PARAM_STR);
    //                 $update -> execute();

            

    //                 header('Location: ../vision/painel-rotinas.php');
    //                 exit;
                            


    //         }

    //     } catch (PDOException $e) {
    //             die('erro na edição');
    //     }
    // }
?>  -->


<?php
session_start();
require_once 'conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $id   = filter_input(INPUT_POST, 'id',  FILTER_VALIDATE_INT);
        $usuario  = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $medicamento = filter_input(INPUT_POST, 'medicamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dose  = filter_input(INPUT_POST, 'dose',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $horario  = filter_input(INPUT_POST, 'horario',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if ($id && $usuario && $medicamento && $dose && $horario) {


            $stmt = $pdo->prepare("SELECT 1 FROM pacientes WHERE usuario = :usuario LIMIT 1");
            $stmt->execute([':usuario' => $usuario]);

            if ($stmt->rowCount() > 0) {


                $update = $pdo->prepare(
                    "UPDATE rotinas SET usuario = :usuario, medicamento = :medicamento, dose = :dose,horario = :horario WHERE id = :id");

                $update->bindValue(':id',  $id,PDO::PARAM_INT);
                $update->bindValue(':usuario',  $usuario,PDO::PARAM_STR);
                $update->bindValue(':medicamento', $medicamento, PDO::PARAM_STR);
                $update->bindValue(':dose',  $dose,  PDO::PARAM_STR);
                $update->bindValue(':horario', $horario, PDO::PARAM_STR);
                $update->execute();


                if ($update->rowCount()) {
                    $_SESSION['id_rotina_editada'] = $id;
                    $_SESSION['nome'] = $usuario;
                }

                header('Location: ../vision/painel-rotinas.php');
                exit;
            } else {
                echo 'Usuário não encontrado.';
            }
        } else {
            echo 'Dados incompletos ou inválidos.';
        }

    } catch (PDOException $e) {
        die('Erro na edição: ' . $e->getMessage());
    }
}

