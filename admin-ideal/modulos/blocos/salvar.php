<?php 
include "../../config/conn.php";

$nome = filter_input(INPUT_POST, 'nome');
$id_pagina = filter_input(INPUT_POST, 'id_pagina');


$insert = mysqli_query($conn, "INSERT INTO ideal_blocos_categoria VALUES ('', '".$nome."', '', '".$id_pagina."', '1')");  

mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua categoria foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

?>