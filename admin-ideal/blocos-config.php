<?php
include_once("config/conn.php");

$url =  basename($_SERVER['PHP_SELF'],'.php');
$url = explode('-', $url);
$url = array_filter($url);
$url = array_merge($url, array()); 
$url = $url[0];

$id_usuario = $_SESSION['id'];
$sql = "SELECT ideal_permissao.status, ideal_modulos.nome, ideal_usuario.img, ideal_usuario.id_usuario as tipo
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
$tipousuario = $sql["tipo"];

if($statuspagina != "1"){
    header("Location: login.php");
}
if(isset($_GET["pagina"])){ $idpagina = $_GET["pagina"];  } else { $idpagina = ""; }

if(isset($_GET["id"])){ $idget = $_GET["id"]; } else { $idget = ""; }

$id_bloco = "";
$statusbloco = "";
$chamada = "";
$texto = "";
$titulo = "";
$video = "";
$imagem =  "";
$nomecategoria = "";
$id_categoria = "";
$id_pagina = "";
$qtchamada = "";

$sql = "SELECT ideal_blocos.status, ideal_blocos.id_bloco, ideal_blocos_idioma.video, ideal_blocos_idioma.titulo, ideal_blocos_idioma.texto,   ideal_blocos_idioma.chamada, ideal_blocos_idioma.imagem, ideal_blocos_categoria.nome, ideal_blocos_categoria.id_categoria, ideal_blocos_categoria.id_pagina
    FROM ideal_blocos
    JOIN ideal_blocos_idioma ON ideal_blocos_idioma.id_bloco = ideal_blocos.id_bloco
    JOIN ideal_blocos_categoria ON ideal_blocos_categoria.id_categoria = ideal_blocos.id_categoria
    WHERE ideal_blocos.id_bloco = '".$idget."'"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 

	$id_bloco = $sql["id_bloco"]; 
	$statusbloco = $sql["status"];
	$chamada = $sql["chamada"];
    $video = $sql["video"];
    $titulo = $sql["titulo"];
    $texto = $sql["texto"];
	$imagem =  $sql["imagem"];
    $nomecategoria = $sql["nome"]; 
    $id_categoria = $sql["id_categoria"];
    $id_pagina = $sql["id_pagina"];
}
?>