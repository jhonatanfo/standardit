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


if(isset($_GET["id"])){ $idget = $_GET["id"]; } else { $idget = ""; }
$idget = filter_var($idget, FILTER_SANITIZE_NUMBER_INT);

$id = ""; 
$nomecategoria = ""; 
$idcategoria = ""; 
$inicio = "";
$termino = "";
$titulo = ""; 
$frase = ""; 
$link = ""; 
$botao = ""; 
$statusbanner = "";
$desktop = ""; 
$tablet = ""; 
$mobile = ""; 
$sku = "";

if($idget != ""){
    
    $sql = "SELECT ideal_paginas.nome, ideal_banners.id, ideal_paginas.id_pagina, ideal_banners.inicio, ideal_banners.termino, ideal_banners.status 
    FROM ideal_banners 
    LEFT JOIN ideal_paginas ON ideal_paginas.id_pagina = ideal_banners.id_pagina WHERE ideal_banners.id = $idget"; 
    $query = mysqli_query($conn, $sql); 
    $sql = mysqli_fetch_array($query);

    $id = $sql["id"]; 
    $nomecategoria = $sql["nome"]; 
    $idcategoria = $sql["id_pagina"]; 
    $inicio =  $inicio = implode('/', array_reverse(explode('-', $sql["inicio"])));
    $termino =  $termino = implode('/', array_reverse(explode('-', $sql["termino"])));
    $statusbanner = $sql["status"]; 
}
?>