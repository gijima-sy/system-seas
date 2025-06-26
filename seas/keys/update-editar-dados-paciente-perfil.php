<?php

if (session_status() === PHP_SESSION_NONE) { session_start();}
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
     header('location: ../vision/form-cadastro_pacientes.php');
     exit;
}



$id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT );
$usuario = trim(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS ));
$email = trim( filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
$senha = $_POST['senha'] ?? '';

$erros = [];

$stmt = $pdo -> prepare('SELECT 1 FROM pacientes WHERE email = :email AND id  <> :id LIMIT 1');
$stmt->execute([':email' => $email, ':id' => $id]);
if ($stmt ->fetchColumn()) {
     $erros[] = 'Este e-mail já está cadstrado.';
}

$senha_hash = null;
if($senha !== '') {
     if (strlen($senha) < 6) {
          $erros[] = 'Senha muito curta (mínimo 6 caracteres)';
     } else {
          $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
     }
}


if($erros) {
     $_SESSION['erros'] = $erros;
     header('Location: ../vision/form-editar-dados.php?id=' . $id);
     exit;
}
 
$update_parcial = 'UPDATE pacientes SET usuario = :usuario, email = :email';
$parametros_do_update = [':usuario' =>  $usuario, ':email' => $email, ':id' => $id];

if($senha_hash){
     $update_parcial .= ', senha = :senha';
     $parametros_do_update[':senha'] = $senha_hash;
}
$update_parcial .= ' WHERE id = :id';

$stmt = $pdo->prepare($update_parcial);
$stmt->execute($parametros_do_update);

$stmt = $pdo->prepare('SELECT id, usuario FROM pacientes WHERE id = :id');
$stmt->execute([':id' => $id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['id'] = $paciente['id'];
$_SESSION['name'] = $paciente['usuario'];
$_SESSION['sucesso'] = 'Dados atualizados' ;

header('Location: ../vision/home-paciente.php');
exit;

