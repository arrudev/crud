<?php
//Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$mysqli = new mysqli($servername, $username, $password, $db_name);
if($mysqli->connect_error)
    die($_SESSION['mensagem'] = "Erro ao acessar o banco de dados!");

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect,"utf8");

if (mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;
