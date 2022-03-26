<?php
include "../../config/conn.php";
$id = "";
$chave = filter_input(INPUT_POST, 'chave');

$sql = "SELECT idioma FROM ideal_idioma"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){

    $sku = $sql["idioma"];

    $traducaodinamico = "traducao-$sku";
    
    $traducao= filter_input(INPUT_POST, $traducaodinamico);

    $insert = mysqli_query($conn, "UPDATE ideal_traducoes SET traducao='$traducao' where idioma='$sku' and chave='$chave'");



}


mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua alteração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}