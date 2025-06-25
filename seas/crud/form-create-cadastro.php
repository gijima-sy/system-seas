<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de usuario</title>
</head>
<body>
    <main>
         <h1> cadastrando um novo usuario</h1>
    <form action="create-cadastro-funcional.php" method="POST">
        <p>
            <label>Nome de Usuario:</label>
            <input type="text" name="usuario" id="usuario-id">
        </p>
         <p>
            <label> Email:</label>
            <input type="text" name="email" id="email-id">
        </p> 
        <p>
            <label>Senha:</label>
            <input type="text" name="senha" id="senha-id">
        </p>
        <p>
            <input type="submit" value="cadastrar">
        </p>
       

    </form>

    </main>
   
    
</body>
</html>