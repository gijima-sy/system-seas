<?php
    include_once "../keys/protection.php";
    include_once "../keys/conexao.php";
    try {
        $consulta = $pdo->query("SELECT * FROM pacientes");
?>


<!DOCTYPE html>  
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/painel-adm.css" media="screen" />  
    <title>listagem de Usuarios</title>
</head>
<body> 
    <main class = "container">
        <div>
            <h1>Listagem de Usuarios</h1>

        <div>
            <button class="login-b1 login btn-wrapper" onclick="location.href='./filtro-de-usuarios-cadastro.html'" class="btn"> cadastro de usuarios</button>
        </div>
        <div>
            <table  class="tabela-estili">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>usuario</th>
                        <th>email</th>
                        <th>telefone</th>
                        <th>data de nascimento</th>
                        <th>psicologo</th>
                        <th> Nivel</th>
                        <th>Ações(Excluir/Editar)</th>
                    </tr>
                </thead>
<?php 
    while ($linha = $consulta->fetch( PDO::FETCH_ASSOC)) {
    ?>
                <tbody>
                        <tr>
                            <td><?php echo $linha['id'] ;?></td>
                            <td><?php echo $linha['usuario'] ;?></td>
                            <td><?php echo $linha['email'] ;?></td>
                            <td><?php echo $linha['senha'] ;?></td>
                            <td><?php echo $linha['telefone'] ; ?></td>
                            <td><?php echo $linha['data_nasc'] ;?></td>
                            <td><?php echo $linha['psicologo'] ;?></td>
                            <td> <button class="login button-tabela" onclick="location.href='./form-editar-dados.php?id=<?= $linha['id'] ?>'" class="btn">Editar</button> <button class="login button-tabela" onclick="location.href='../keys/delete-excluir.php?id=<?= $linha['id']?>'" class="btn">Excluir</button></td>
                        </tr>
                </tbody>
    <?php
        }
?>

            </table>
        </div>
        </div>
    </main>
</body>
</html>



<?php
    } catch (PDOException $e) {
        echo "erro";
    }
?>
