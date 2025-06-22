 <?php
    include "../keys/protection.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="../assets/" media="screen" />  
    <title>painel</title>
</head>
<body>
    <div class='container'>
        <h2>bem vindo ao painel,<?php echo $_SESSION['nome']; ?></h2>


        <p>
            <a href="../keys/logout.php"> sair </a>
        </p>
    </div>
</body>
</html>