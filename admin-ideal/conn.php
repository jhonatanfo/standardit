<?php
    global $conn;
    global $ano;
    global $mes;
    global $dia;

	$servidor = "idealiz.mysql.dbaas.com.br";
	$usuario = "idealiz";
	$senha = "B7yF3awe.D4Y5c";
	$dbname = "idealiz";
    
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $conn -> set_charset("utf8");

    $ano = date("Y");
    $mes = date("m"); 
    $dia = date("d"); 

    $modulobanner = "1";
    $modulopaginas = "2";
    $modulodestaque = "10";
?>