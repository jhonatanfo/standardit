<?php 
include "../../config/conexao.php";

$nome = utf8_decode($_POST['nome']);
$horas = utf8_decode($_POST['horas']);
$contato = utf8_decode($_POST['contato']);
$email = utf8_decode($_POST['email']);
$descricao = utf8_decode($_POST['descricao']);
$usuario = utf8_decode($_POST['usuario']);
$senha = utf8_decode($_POST['senha']);
$cc = utf8_decode($_POST['cc']);

if (!($nome)){
print "nome"; exit();
}
if (!($horas)){
print "horas"; exit();
}
if (!($contato)){
print "contato"; exit();
}
if (!($email)){
print "email"; exit();
}
if (!($descricao)){
print "descricao"; exit();
}
if (!($usuario)){
print "usuario"; exit();
}
if (!($senha)){
print "senha"; exit();
}
$data = date("Y-m-d");      

$insert = mysql_query("INSERT INTO clientes VALUES ('', '".$nome."', '".$horas."','".$data."', '".$contato."', '".$email."', '".$descricao."', '".$cc."')");


$MaxID = mysql_query("SELECT MAX(Id) FROM clientes");
$MaxID = mysql_fetch_array($MaxID, MYSQL_BOTH);
$MaxID = $MaxID[0];

$criaruser = mysql_query("INSERT INTO usuarios VALUES ('', '".$contato."', '".$usuario."','".$senha."', '".$email."', 'default.jpg', '2', '".$MaxID."','')");

	
mysql_close($conexao);
if($insert) {
	print "Cadastro Realizado!";
}else {
	print "Erro ao Cadastrar!";
}

include "../../envio/novo-usuario.php";

?>