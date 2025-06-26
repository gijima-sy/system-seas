<?php

if(!isset($_SESSION)){
    session_start();
}

session_destroy();

header("location: ../vision/filtro-de-usuarios-login.html ");
?>

