<?php
include_once("config/conn.php");

$url =  basename($_SERVER['PHP_SELF'],'.php');
$url = explode('-', $url);
$url = array_filter($url);
$url = array_merge($url, array()); 
$url = $url[0];

$id_usuario = $_SESSION['id'];
$sql = "SELECT ideal_permissao.status, ideal_modulos.nome, ideal_usuario.img
FROM ideal_permissao
LEFT JOIN ideal_usuario
ON ideal_permissao.id_usuario = ideal_usuario.id_usuario 
LEFT JOIN ideal_modulos
ON ideal_modulos.id_modulo = ideal_permissao.id_modulo 
WHERE ideal_modulos.link LIKE '%". $url ."%' AND ideal_usuario.id = '". $id_usuario ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$statuspagina = $sql["status"];
$nomepagina = $sql["nome"];
$imgusuario = $sql["img"];

if($statuspagina != "1"){
    header("Location: login.php");
}

// Select Redes sociais 


$sql = "SELECT * FROM ideal_redes"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 
	
    $nome = $sql["nome"]; 
	$link = $sql["link"]; 
    
    if($nome == "Instagram"){ $instagram = $link; }
    if($nome == "Linkedin"){ $linkedin = $link; }
    if($nome == "Facebook"){ $facebook = $link; }
    if($nome == "Youtube"){ $youtube = $link; }
    if($nome == "Twitter"){ $twitter = $link; }
}

// Select dados 

$sql = "SELECT * FROM ideal_empresa"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 
	
	$telefone = $sql["telefone"]; 
	$whatsapp = $sql["whatsapp"]; 
	$email = $sql["email"];
	$endereco = $sql["endereco"];
	$geo = $sql["geo"];
}

// Select SMTP 

$host = "";
$port = "";
$username = "";
$password = "";
$smtpauth =  "";
$smtpsecure =  "";
$remetente =  "";


$sql = "SELECT * FROM ideal_smtp"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 
	
	$host = $sql["host"]; 
	$port = $sql["port"]; 
	$username = $sql["username"];
	$password = $sql["password"];
	$smtpauth = $sql["smtpauth"];
    $smtpsecure = $sql["smtpsecure"];
    $remetente = $sql["remetente"];
}


?>