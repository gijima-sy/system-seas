<?php
    include('conexao.php');

    if(isset($_POST['email'])) or isset($_POST['senha']){
         
        if(strlen ($_POST['email'])== 0) {
            echo 'preencha o seu  e-mail, para prosseguir';
        } else  if(strlen ($_POST['senha'])== 0){
            echo 'preencha o sua senha, para prosseguir';
        } else {

            $email = $mysqli-> real_escape_string($_POST['email']);
            $senha = $mysqli-> real_escape_string($_POST['senha']);
            
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
            $sql_query = $mysqli-> query($sql_code) or die("falha na execução do codigo SQL" . $mysqli->error);

            $quantidade = $sql_query-> num_rows;

            if($quantidade == 1){

                $usuario = $sql_query-> fetch_assoc();
                if(isset($_SESSION)){
                    session_start();
                }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: painel.php");

            }else{
                echo "Falha ao logar! e-mail ou senha incorretos";
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'rel='stylesheet'> 
<link rel="stylesheet" href="style.css">
</head>
<body>
    
<main class = "container" >
    <form action="" methop ="POST" >
        <h1>acesse sua conta</h1>
       <div class = "input-box" > 
            <P>
                <Label>E-mail:</Label>
                <input type="email" name ="email"  placeholder ="digite seu e-mail:" >
                <i class =" bx bxs-user" ></i>
            </P>
        </div>
        <div class = "input-box">
            <P>
                <Label>Senha:</Label>
                <input type="password" name ="senha" placeholder ="digite sua senha:">
                <i class =" bx bxs-lock-alt" ></i>
            </P>
        </div>
        <div>
            <label class ="remenber-forgot" >
                <input type="checkbox">
                lembre minha senha
            </label>
            <a href="#"> esqueci minha senha</a>
        </div>
        <p>
            <button class = "login" type ="submit">acesse sua conta</button>
        </p>
        <div class = "register-link">
            <p> Ops... não tenho conta! <a href="cadastre-se.php"> sem problema crie sua conta aqui!!</a></p>
        </div>


    </form>
</main>   
</body>
</html>
