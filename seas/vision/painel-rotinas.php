<?php
    include_once "../keys/protection.php";
    include_once "../keys/conexao.php";
    try {
        $consulta = $pdo->query("SELECT * FROM rotinas");
?>


<!DOCTYPE html>  
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/painel-adm.css" media="screen" />  
    <title>Rotinas</title>
</head>
<body> 
    <main class = "container">
        <div>
            <h1>Rotinas de medicamentos</h1>

        <div>
            <button class="login-b1 login btn-wrapper" onclick="location.href='./form-create-rotina.php'" class="btn"> criar uma nova rotina</button>
        </div>
        <table  class="tabela-estili" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>medicamento</th>
                    <th>Dose</th>
                    <th>Horario</th>
                    <th>Data</th>
                    <th>Usuario</th>
                    <th>Ações(Excluir/Editar)</th>
                </tr>
            </thead>
<?php 
        while ($linha = $consulta->fetch( PDO::FETCH_ASSOC)) {
?>
           <tbody>
                <tr>
                    <td><?php echo $linha['id'] ;?></td>
                    <td><?php echo $linha['medicamento'] ;?></td>
                    <td><?php echo $linha['dose'] ;?></td>
                    <td><?php echo $linha['horario'] ;?></td>
                    <td><?php echo $linha['data'] ;?></td>
                    <td><?php echo $linha['usuario'] ; ?></td>
                    <td> <button class="login button-tabela" onclick="location.href='./form-editar-dados-rotina.php?id=<?= $linha['id'] ?>'" class="btn">Editar</button> <button class="login button-tabela" onclick="location.href='../keys/delete-excluir-rotina.php?id=<?= $linha['id']?>'" class="btn">Excluir</button>
                    <button class="login button-tabela"onclick="if (confirm('Tem certeza que deseja excluir')) { window.location.href='../keys/delete-excluir-rotina.php?id=<?= $linha['id'] ?>'; }"> Excluir</button>
                    </td>
                </tr>
           </tbody>
<?php
        }
?>

        </table>
        </div>
    </main>
</body>
</html>



<?php
    } catch (PDOException $e) {
        echo "erro";
    }
?>
