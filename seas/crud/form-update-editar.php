<?php
    include_once "conexao.php";

    $id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
    $consulta = $pdo->prepare("SELECT * FROM pacientes WHERE id = :id");
    $consulta->bindValue(':id', $id, PDO:: PARAM_INT);
    $consulta->execute();

    $linha_de_exibir = $consulta->fetch(PDO:: FETCH_ASSOC );

    $mensagem_de_erro_na_procura = "   ";

    if (!$linha_de_exibir) {
            $mensagem_de_erro_na_procura = "Paciente não encontrado.";
            exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar conta do usuario</title>
</head>
<body>
    <main>
         <h1> Editando conta:</h1>

        <form action="update-editar-funcional.php" method="POST">
            <p>
                <label>Nome de Usuario:</label>
                <input type="text" name="usuario" id="usuario-id" value = "<?php  echo htmlspecialchars($linha_de_exibir['usuario']);?>" >
            </p>
            <p>
                <label> Email:</label>
                <input type="text" name="email" id="email-id" value = "<?php  echo htmlspecialchars($linha_de_exibir['email']) ;?>" >
            </p> 
            <p>
                <label>Senha:</label>
                <input type="text" name="senha" id="senha-id" value = "<?php  echo htmlspecialchars($linha_de_exibir['senha']);?>">
            </p>
            <p>
                <input type="hidden" name="id" value = "<?php  echo htmlspecialchars($linha_de_exibir['id']);?>" >
            </p>
            <p>
                <input type="submit" value="editar">
            </p>
       
            

        </form>

    </main>
   
    
</body>
</html>