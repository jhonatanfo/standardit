<?php 

	$id = $_POST['id'];
	include "../../config/conn.php";
	$insert = mysqli_query($conn, "UPDATE ideal_usuario SET status='0'  where id = '$id'");
	mysqli_close($conn);
	if($insert) {
		print "Excluido com Sucesso!";
	}else {
		print "Erro ao Excluir!";

	}

?>