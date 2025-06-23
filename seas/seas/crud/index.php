<?php
    include_once "conexao.php";
    try {
        $consulta = $pdo->query("SELECT * FROM pacientes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listagem de Usuarios</title>
</head>
<body>
    <h1>Listagem de Usuarios</h1>
    <button type="button"><a href="form-create-cadastro.php"> cadastro de usuarios</a></button>
    <table>
        <tr>
            <td>id</td>
            <td>usuario</td>
            <td>email</td>
            <td>senha</td>
            <td>telefone</td>
            <td>data de nascimento</td>
            <td>psicologo</td>
            <td>Ações(editar/excluir)</td>
        </tr>
<?php 
    while ($linha = $consulta->fetch( PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?php echo $linha['id'] ;?></td>
            <td><?php echo $linha['usuario'] ;?></td>
            <td><?php echo $linha['email'] ;?></td>
            <td><?php echo $linha['senha'] ;?></td>
            <td><?php echo $linha['telefone'] ; ?></td>
            <td><?php echo $linha['data_nasc'] ;?></td>
            <td><?php echo $linha['psicologo'] ;?></td>
            <td> 
                <button type = "button">  <a href="form-update-editar.php?id=<?= $linha['id'] ?>">Editar</a> </button>
                <button type = "button"> <a href="delete-excluir.php?id=<?= $linha['id']?>"> Excluir</a>  </button>
            </td>
        </tr>
<?php
        }
?>

    </table>
       
    
</body>
</html>

<?php
    } catch (PDOException $e) {
        echo $e -> getMenssage();
    }
?>
