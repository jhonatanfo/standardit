<?php 
include "../../config/conn.php";

$telefone = $_POST ['telefone'];
$whatsapp = $_POST ['whatsapp'];
$email = $_POST ['email'];
$endereco = $_POST ['endereco'];
$geo = $_POST ['geo'];

$insert = mysqli_query($conn, "UPDATE ideal_dados SET telefone='$telefone', whatsapp='$whatsapp', email='$email', endereco='$endereco', geo='$geo'");

mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua alteração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

?>