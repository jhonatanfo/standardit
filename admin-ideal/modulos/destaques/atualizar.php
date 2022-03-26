<?php 
include "../../config/conn.php";

$id = $_POST['idbanner'];
$posicao = $_POST ['posicao'];

$insert = mysqli_query($conn, "UPDATE ideal_destaques SET ordem='".$posicao."'  where id_destaque='".$id."'");

	
mysqli_close($conn);
if($insert) {
	print "Alterado com Sucesso!";
}else {
	print "Erro ao Cadastrar!";
}
?>