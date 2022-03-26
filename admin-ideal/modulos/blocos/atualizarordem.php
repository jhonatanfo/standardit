<?php 
include "../../config/conn.php";

$id = $_POST['idBloco'];
$posicao = $_POST ['posicao'];
$idCategoria = $_POST ['idCategoria'];

$insert = mysqli_query($conn, "UPDATE ideal_blocos SET ordem='".$posicao."'  where id_bloco='".$id."'");

	
mysqli_close($conn);
if($insert) {
	print "Alterado com Sucesso!";
}else {
	print "Erro ao Cadastrar!";
}
?>