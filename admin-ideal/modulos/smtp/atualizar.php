<?php 
include "../../config/conn.php";

$host = utf8_decode(filter_input(INPUT_POST, 'host'));
$port = filter_input(INPUT_POST, 'port');
$username = utf8_decode(filter_input(INPUT_POST, 'username'));
$password = filter_input(INPUT_POST, 'password');
$smtpauth = filter_input(INPUT_POST, 'smtpauth');
$smtpsecure = filter_input(INPUT_POST, 'smtpsecure');
$remetente = filter_input(INPUT_POST, 'remetente');

if($smtpauth == "on"){
	$smtpauth = "true";
}else{
	$smtpauth = "false";
}

$insert = mysqli_query($conn, "UPDATE ideal_smtp SET host='$host', port='$port', username='$username', password='$password', smtpauth='$smtpauth', smtpsecure='$smtpsecure', remetente='$remetente'");

mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua aletração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

?>