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

if(isset($_GET["id"])){ $id_destaque = $_GET["id"]; } else { $id_destaque = ""; }
$id_destaque = filter_var($id_destaque, FILTER_SANITIZE_NUMBER_INT);

$id = "";
$nome =  "";
$imagem = "";
$status = "";
$titulo = "";
$chamada = "";
$botao = "";
$link = "";
$statusdestaques = "";
if($id_destaque != ""){
   
$sql = "SELECT id_destaque, status FROM ideal_destaques WHERE id_destaque = '".$id_destaque."'"; 
$query = mysqli_query($conn, $sql); 
    while($sql = mysqli_fetch_array($query)){ 
         
        $id = $sql["id_destaque"]; 
        $statusdestaques = $sql["status"];
    }
}
?>