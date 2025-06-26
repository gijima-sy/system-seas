<?php

    session_start();
    $erros = $_SESSION['erros'] ?? [];
    $sucesso = $_SESSION['sucesso'] ?? null;
    unset($_SESSION['erros'], $_SESSION['sucesso'] );

    
    include_once "../keys/conexao.php";

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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/forms.css" media="screen" />  
    <title>Editar conta do usuario</title>
</head>
<body>
    <main class = "container">
        <form action="../keys/update-editar-dados-paciente-perfil.php" method="POST">
            <h1>Autere sua conta!! </h1>

<?php if($sucesso): ?>
    <h2 class="sucesso"><?= htmlspecialchars($sucesso)?></h2>
<?php endif;?>

<?php if ($erros): ?>
    <ul class="erros">
        <?php foreach ($erros as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
            <div class="input-box">
                <p>
                    <label>Nome de Usuario:</label>
                    <input type="text" name="usuario" id="usuario-id" required placeholder="Digite seu nome de usuario" value = "<?php  echo htmlspecialchars($linha_de_exibir['usuario']);?>" >
                </p>
            </div>

            <div class="input-box">
                <p>
                    <label> Email:</label>
                    <input type="email" name="email" id="email-id" required placeholder="Digite seu e-mail" value = "<?php  echo htmlspecialchars($linha_de_exibir['email']) ;?>" >

                </p>
            </div>

            <div class="input-box">
                <p>
                    <label>Senha:</label>
                    <input type="text" name="senha" id="senha-id" placeholder="Digite sua senha" value = ""> 

                </p>
            </div>

            <p>
                <input type="hidden" name="senha_hash" id="senha_hash-id" value = "<?php  echo htmlspecialchars($linha_de_exibir['senha']) ;?>" >
            </p>

            <p>
                <input type="hidden" name="id" value = "<?php  echo htmlspecialchars($linha_de_exibir['id']);?>" >
            </p>
            <p>
                <input type="submit"  class="login" value="editar">
            </p>
        </form>
    </main>
</body>
</html>