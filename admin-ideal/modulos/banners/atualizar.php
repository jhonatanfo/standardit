<?php 
include "../../config/conn.php";

$id = $_POST['idbanner'];
$posicao = $_POST ['posicao'];

$insert = mysqli_query($conn, "UPDATE ideal_banners SET ordem='".$posicao."'  where id='".$id."'");

	
mysqli_close($conn);
if($insert) {
	print "Alterado com Sucesso!";
}else {
	print "Erro ao Cadastrar!";
}
?>