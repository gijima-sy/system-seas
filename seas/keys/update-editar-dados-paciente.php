<?php
session_start();

$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso'] );

require_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../vision/form-cadastro-pacientes.php');
    exit;
}
   
        $id = trim(filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT ));
        $usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
        $email = trim( filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $senha = $_POST['senha'] ?? '';


        $senha_hash = $_POST['senha_hash'] ?? null;
        $erros = [];

       $stmt = $pdo -> prepare('SELECT 1 FROM pacientes WHERE email = :email AND id  <> :id LIMIT 1');
       $stmt->execute([':email' => $email, ':id' => $id]);
       if ($stmt ->fetchColumn()) {
            $erros[] = 'Este e-mail já está cadstrado.';
       }
       
       if (strlen($senha) > 0) {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
       }

       if ($erros) {
            $_SESSION['erros'] = $erros;
            header('location: ../vision/form-editar-dados.php?id='.$id);
            exit;
       }

       $update_parcial = 'UPDATE pacientes SET usuario = :usuario, email = :email';
       $parametros_do_update = [ ':usuario' => $usuario, ':email'=> $email, 'id'=> $id];

       if ($senha_hash) {
            $update_parcial.=', senha = :senha';
            $parametros_do_update[':senha'] = $senha_hash;
       }

       $update_parcial.= ' WHERE id = :id';

       $stmt = $pdo ->prepare($update_parcial);
       $stmt ->execute($parametros_do_update);

       $_SESSION['sucesso'] = 'Dados atualizados com sucesso!';
       header('location: ../vision/painel-adm.php');







       


        // if(isset($_POST['usuario']) && isset($_POST['email'])) {
        //     $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE usuario = ? AND id != ?");
        //     $stmt->execute([$usuario]);
        //     if ($stmt->fetchColumn() > 0) {
        //         $mensagem1 = "Este usuário já está cadastrado.";
        //         header('Location: ../vision/form-editar-dados.php');
        //         exit;
        //     } else {
        //         $mensagem1 = "  ";    
        //     }
                

        //     $stmt = $pdo->prepare("SELECT COUNT(*) FROM pacientes WHERE email = ?");
        //     $stmt->execute([$email]);
        //     if ($stmt->fetchColumn() > 0) {
        //         $mensagem2 = "Este e-mail já está cadastrado.";
        //         header('Location: ../vision/form-cadastro-pacientes.php');
        //         exit;
        //     } else {
        //         $mensagem2 = " ";
        //     }
        //      if(strlen($senha) > 0){
        //     $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        //     header('Location: ../vision/form-cadastro-pacientes.php');
        //     exit;
        // } else {
        //     $mensagem3 = "Senha em branco";
        // }


        //     if($mensagem1 === " " && $mensagem2 == " " && $mensagem3 == " " ) {


        //        
        //         header('location: painel-adm.php');


                
//             } else {
//                 header("location: ../vision/painel-adm.php"); 
//             }




            
// } else {
//     header("location: ../vision/form-cadastro-pacientes.php"); 
// } 

