<?php    
    session_start();
    $mensagem_usuario = " ";
    $mensagem_horario = " ";
    $mensagem_dose = " ";
    $mensagem_medicamento =" ";
    $mensagem_de_super_erro = " Crie Sua Primeira Rotina Medicamentos No SEAS";

    include_once "../keys/conexao.php";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/forms-r.css" media="screen" />  
    <title>cadastro de usuario</title>
</head>
<body>
    <main class = "container">
        <H1><?php echo   $mensagem_de_super_erro;?> </H1>

        <form  action="../keys/create-rotina-medica.php" method="POST">


            <div class="input-box">
                <p>    
                    <h1><?php echo $mensagem_usuario;?></h1>
                    <label>Nome do Usuario:</label>
                    <input type="text" name="usuario" id="usuario-id"  placeholder="Digite seu nome de usuario:">
                </p>
            </div>
            <div class="input-box">
                <p>    
                    <h1><?php echo $mensagem_medicamento ;?></h1>
                    <label>Nome do Medicamento:</label>
                    <input type="text" name="medicamento" id="medicamento-id"  placeholder="Digite o nome do medicamento:">
                </p>
            </div>

            <div class="input-box">
                <p>
                    <h1><?php echo $mensagem_dose; ?></h1>
                    <label> Dosagem do Remedio:</label>
                    <input type="number" name="dose" id="dose-id"  placeholder="Digite a dose (em gramas) do seu medicamento:">
                </p> 
            </div>

            <div class="input-box">
            
                <p>
                    <h1><?php echo $mensagem_horario ;?></h1>
                    <label> Intervalo para tomar o Remedio:</label>
                    <input type="number" name="horario" id="horario-id"  placeholder="Digite o intervalo de tempo para tomar a medicação:">
                </p>
                    
            </div>
            <p>
                <input type="submit" class="login" value="Criar nova rotina medica">
            </p>
            <div class="register-link">
                <p>Ops... não quero criar uma nova rotina! <a href="./painel-rotinas.php">Sem problema, vejá aquelas que já criou aqui!!</a></p>
            </div>



        </form>
    </main>
</body>
</html>