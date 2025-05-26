<?php 

$usuario = 'root';
$senha ='';
$database ='login-seas';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->connect_error){
    die("falha na conexão com o banco de dados:" . $mysqli->connect_error);
} 

