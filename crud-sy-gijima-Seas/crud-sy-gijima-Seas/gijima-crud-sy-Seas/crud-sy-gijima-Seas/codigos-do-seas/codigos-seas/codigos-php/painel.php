<?php
    include('protection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>painel</title>
</head>
<body>
    bem vindo ao painel,<?php echo $_SESSION['nome']; ?>


    <p>
        <a href="logaut.php"> sair </a>
    </p>
</body>
</html>