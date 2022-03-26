<?php 

    include "../../config/conn.php";

	$id = $_POST['id'];
	$campo = $_POST['campo'];
    $descricao = $_POST['descricao'];

	
	$insert = mysqli_query($conn,"UPDATE ideal_parceiros SET $campo = '". $descricao . "' where id = '$id'");
	mysqli_close($conn);
	if($insert) {
		print "Atualizado com Sucesso!";
	}else {
		print "Erro ao Excluir!"  . mysqli_error($conn);

	}

?>