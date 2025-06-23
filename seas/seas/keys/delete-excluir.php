<?php
    include_once "./conexao.php";

        try {
            $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT );
            
            if (!$id) {
                throw new Exception("ID inválido.");
            }

            $delete = $pdo -> prepare("DELETE FROM pacientes WHERE id = :id");
            $delete -> bindvalue(':id', $id, PDO::PARAM_STR);
            $delete -> execute();
        
            header('location: ../vision/painel-adm.php');
            exit;

        } catch (PDOException $e) {
            echo "Erro no banco de dados:" . $e->getMessage();  
        } catch(Exception $e) {
             echo "Erro :" . $e->getMessage();  
        }
?>