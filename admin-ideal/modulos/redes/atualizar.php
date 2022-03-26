<?php 
include "../../config/conn.php";

$instagram = $_POST ['instagram'];
$facebook = $_POST ['facebook'];
$twitter = $_POST ['twitter'];
$linkedin = $_POST ['linkedin'];
$youtube = $_POST ['youtube'];

$insert = mysqli_query($conn, "UPDATE ideal_redes SET link='$instagram' where nome = 'Instagram'");
$insert = mysqli_query($conn, "UPDATE ideal_redes SET link='$facebook' where nome = 'Facebook'");
$insert = mysqli_query($conn, "UPDATE ideal_redes SET link='$twitter' where nome = 'Twitter'");
$insert = mysqli_query($conn, "UPDATE ideal_redes SET link='$linkedin' where nome = 'Linkedin'");
$insert = mysqli_query($conn, "UPDATE ideal_redes SET link='$youtube' where nome = 'Youtube'");

mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua aletração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

?>