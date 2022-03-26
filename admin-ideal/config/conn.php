<?php
ini_set('display_errors', 1 );
error_reporting(1);

    global $conn;
    global $ano;
    global $mes;
    global $dia;

	$servidor = "standardit.mysql.dbaas.com.br";
	$usuario = "standardit";
	$senha = "Ucf073_r";
	$dbname = "standardit";
    
    
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $conn -> set_charset("utf8");

    $ano = date("Y");
    $mes = date("m"); 
    $dia = date("d"); 

    $modulobanner = "1";
    $modulopaginas = "2";
    $modulodestaque = "10";
    $moduloblog = "13";
?>