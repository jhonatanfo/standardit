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

if(isset($_GET["id"])){ $id_blog = $_GET["id"]; } else { $id_blog = ""; }
$id_blog = filter_var($id_blog, FILTER_SANITIZE_NUMBER_INT);

$id = "";
$nomecategoria = ""; 
$idcategoria = "";
$nome =  "";
$imagem = "";
$status = "";
$titulo = "";
$chamada = "";
$data = "";
$link = "";
$texto = "";
$statusblog = "";
$destaqueblog = "";
$destaque = "";

if($id_blog != ""){

   
$sql = "SELECT a.id_blog, a.destaque, b.nome, b.id_categoria, a.data, a.status 
FROM ideal_blog_categoria AS b
LEFT JOIN ideal_blog AS a ON a.id_categoria = b.id_categoria
WHERE a.id_blog =  '".$id_blog."'"; 

$query = mysqli_query($conn, $sql); 
    while($sql = mysqli_fetch_array($query)){ 
         
        $id = $sql["id_blog"]; 
        $statusblog = $sql["status"];
        $destaque = $sql["destaque"];
        $nomecategoria = $sql["nome"];
        $idcategoria = $sql["id_categoria"];
        $data =  $data = implode('/', array_reverse(explode('-', $sql["data"])));
    }
}
?>