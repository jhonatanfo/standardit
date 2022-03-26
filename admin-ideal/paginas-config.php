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

if(isset($_GET["id"])){ $idpaginas = $_GET["id"]; } else { $idpaginas = ""; }
$idpaginas = filter_var($idpaginas, FILTER_SANITIZE_NUMBER_INT);

$id = "";
$titulourl = "";
$descricao = "";
$palavras =  "";
$nome = "";
$url = "";
$titulo =  "";
$chamada = "";
$texto = "";
$statuspagina = "";
$img = "";
$banner = "";
$imagem = "";
$nomecategoria = "";
$idcategoria = "";
$qtchamada = "";

$sql = "SELECT a.id_pagina,  a.titulourl, a.descricao, a.palavras, a.url, a.nome, a.status, b.nome AS nomecategoria,  b.id_categoria 
    FROM ideal_paginas AS a
    JOIN ideal_categoria_pagina AS b ON b.id_categoria = a.id_categoria
    WHERE a.id_pagina = '".$idpaginas."'"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 

	$id = $sql["id_pagina"]; 
	$titulourl = $sql["titulourl"];
	$descricao = $sql["descricao"];
	$palavras =  $sql["palavras"];
    $url = $sql["url"]; 
    $nome = $sql["nome"]; 
    $statuspagina = $sql["status"];
    $nomecategoria = $sql["nomecategoria"];
    $idcategoria = $sql["id_categoria"];
}

if(isset($_GET["id"])){ $idget = $_GET["id"]; } else { $idget = ""; }
function porcentagem_xn ( $porcentagem, $total ) {
	return ( $porcentagem / $total ) * 100;
}
?>