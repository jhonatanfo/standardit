<?php
if(!isset($_SESSION)) { session_start(); }
include_once("config/conn.php");

// Verifica se o usuario tem acesso a essa página
$url = basename($_SERVER['PHP_SELF'],'.php');
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
while($sql = mysqli_fetch_array($query)){
$statuspagina = $sql["status"];
$nomepagina = $sql["nome"];
$imgusuario = $sql["img"];

    if($statuspagina != "1"){
       header("Location: login.php");
    }
}
// Função Porcentagem
function porcentagem_xn ( $porcentagem, $total ) {
	return ( $porcentagem / $total ) * 100;
}

// Função total de acessos
function frequenciaAcessos($acessosSelecao){
    global $conn;
    global $ano;
    global $mes;
    global $dia;
    
    if($acessosSelecao == "ano"){
        $selecao = "YEAR(data) = $ano";
    }
    else if($acessosSelecao == "mes"){
        $selecao = "MONTH(data) = $mes";
    }
    else if($acessosSelecao == "dia"){
        $selecao = "DAY(data) = $dia AND MONTH(DATA) = $mes";
    }

    $sql = "SELECT COUNT(origem) AS origem FROM ideal_acessos WHERE $selecao"; 
    $query = mysqli_query($conn, $sql); 
    $sql = mysqli_fetch_array($query);
    $totalorigem = $sql["origem"];
    
    return $totalorigem;
}

if (isset($_POST['frequenciaAcessos'])) {
    echo frequenciaAcessos($_POST['frequenciaAcessos']);
}


// Função total de acessos
function frequenciaContatos($acessosContato){
    global $conn;
    global $ano;
    global $mes;
    global $dia;
    
    if($acessosContato == "ano"){
        $selecao = "YEAR(data) = $ano";
    }
    else if($acessosContato == "mes"){
        $selecao = "MONTH(data) = $mes";
    }
    else if($acessosContato == "dia"){
        $selecao = "DAY(data) = $dia";
    }

    $sql = "SELECT COUNT(id_form) AS id FROM ideal_formulario WHERE $selecao";
    $query = mysqli_query($conn, $sql); 
    $sql = mysqli_fetch_array($query);
    $totalcontato = $sql["id"]; 
    
    return $totalcontato;
}

if (isset($_POST['frequenciaContatos'])) {
    echo frequenciaContatos($_POST['frequenciaContatos']);
}




$data = date("m");   
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade1 = $sql["quantidade"];

if($data == "12"){
    $mes1 = "Dezembro";
}
if($data == "11"){
    $mes1 = "Novembro";
}
if($data == "10"){
    $mes1 = "Outubro";
}
if($data == "9"){
    $mes1 = "Setembro";
}
if($data == "8"){
    $mes1 = "Agosto";
}else if($data == "7"){
    $mes1 = "Julho";
}else if($data == "6"){
    $mes1 = "Junho";
}else if($data == "5"){
    $mes1 = "Maio";
}else if($data == "4"){
    $mes1 = "Abril";
}else if($data == "3"){
    $mes1 = "Março";
}else if($data == "2"){
    $mes1 = "Fevereiro";
}else if($data == "1"){
    $mes1 = "Janeiro";
}

$data = date("m")- 1;  
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade2 = $sql["quantidade"];

if($data == "12"){
    $mes2 = "Dezembro";
}
if($data == "11"){
    $mes2 = "Novembro";
}
if($data == "10"){
    $mes2 = "Outubro";
}
if($data == "9"){
    $mes2 = "Setembro";
}
if($data == "8"){
    $mes2 = "Agosto";
}else if($data == "7"){
    $mes2 = "Julho";
}else if($data == "6"){
    $mes2 = "Junho";
}else if($data == "5"){
    $mes2 = "Maio";
}else if($data == "4"){
    $mes2 = "Abril";
}else if($data == "3"){
    $mes2 = "Março";
}else if($data == "2"){
    $mes2 = "Fevereiro";
}else if($data == "1"){
    $mes2 = "Janeiro";
}

$data = date("m")- 2;  
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade3 = $sql["quantidade"];

if($data == "12"){
    $mes3 = "Dezembro";
}
if($data == "11"){
    $mes3 = "Novembro";
}
if($data == "10"){
    $mes3 = "Outubro";
}
if($data == "9"){
    $mes3 = "Setembro";
}
if($data == "8"){
    $mes3 = "Agosto";
}else if($data == "7"){
    $mes3 = "Julho";
}else if($data == "6"){
    $mes3 = "Junho";
}else if($data == "5"){
    $mes3 = "Maio";
}else if($data == "4"){
    $mes3 = "Abril";
}else if($data == "3"){
    $mes3 = "Março";
}else if($data == "2"){
    $mes3 = "Fevereiro";
}else if($data == "1"){
    $mes3 = "Janeiro";
}


$data = date("m")- 3; 
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade4 = $sql["quantidade"];

if($data == "12"){
    $mes4 = "Dezembro";
}
if($data == "11"){
    $mes4 = "Novembro";
}
if($data == "10"){
    $mes4 = "Outubro";
}
if($data == "9"){
    $mes4 = "Setembro";
}
if($data == "8"){
    $mes4 = "Agosto";
}else if($data == "7"){
    $mes4 = "Julho";
}else if($data == "6"){
    $mes4 = "Junho";
}else if($data == "5"){
    $mes4 = "Maio";
}else if($data == "4"){
    $mes4 = "Abril";
}else if($data == "3"){
    $mes4 = "Março";
}else if($data == "2"){
    $mes4 = "Fevereiro";
}else if($data == "1"){
    $mes4 = "Janeiro";
}

$data = date("m")- 4;  
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade5 = $sql["quantidade"];

if($data == "12"){
    $mes5 = "Dezembro";
}
if($data == "11"){
    $mes5 = "Novembro";
}
if($data == "10"){
    $mes5 = "Outubro";
}
if($data == "9"){
    $mes5 = "Setembro";
}
if($data == "8"){
    $mes5 = "Agosto";
}else if($data == "7"){
    $mes5 = "Julho";
}else if($data == "6"){
    $mes5 = "Junho";
}else if($data == "5"){
    $mes5 = "Maio";
}else if($data == "4"){
    $mes5 = "Abril";
}else if($data == "3"){
    $mes5 = "Março";
}else if($data == "2"){
    $mes5 = "Fevereiro";
}else if($data == "1"){
    $mes5 = "Janeiro";
}

$data = date("m")- 5;  
$sql = "SELECT COUNT(id) AS quantidade, MONTH(DATA) AS mes FROM ideal_acessos WHERE MONTH(DATA) = '". $data ."'";
$query = mysqli_query($conn, $sql); 
$sql = mysqli_fetch_array($query);
$quantidade6 = $sql["quantidade"];

if($data == "12"){
    $mes6 = "Dezembro";
}
if($data == "11"){
    $mes6 = "Novembro";
}
if($data == "10"){
    $mes6 = "Outubro";
}
if($data == "9"){
    $mes6 = "Setembro";
}
if($data == "8"){
    $mes6 = "Agosto";
}else if($data == "7"){
    $mes6 = "Julho";
}else if($data == "6"){
    $mes6 = "Junho";
}else if($data == "5"){
    $mes6 = "Maio";
}else if($data == "4"){
    $mes6 = "Abril";
}else if($data == "3"){
    $mes6 = "Março";
}else if($data == "2"){
    $mes6 = "Fevereiro";
}else if($data == "1"){
    $mes6 = "Janeiro";
}


// Grafico Campanhas
$i = 1;
$sql = "SELECT COUNT(*) AS NrVezes, midia FROM ideal_acessos GROUP BY midia ORDER BY NrVezes DESC LIMIT  5"; 
$query = mysqli_query($conn, $sql); 
while($sql = mysqli_fetch_array($query)){ 
	
	if($i == 1){
		$numero1 = $sql["NrVezes"];
		$midia1 = "Direto"; 
	}
	else if($i == 2){
		$numero2 = $sql["NrVezes"];
		$midia2 = $sql["midia"]; 
	}
	else if($i == 3){
		$numero3 = $sql["NrVezes"];
		$midia3 = $sql["midia"]; 
	}
	else if($i == 4){
		$numero4 = $sql["NrVezes"];
		$midia4 = $sql["midia"]; 
	}
	else if($i == 5){
		$numero5 = $sql["NrVezes"];
		$midia5 = $sql["midia"]; 
	}
	$i++;
}
// Grafico Campanhas
$sqlOtimizacao = "SELECT  COUNT(IF(descricao !='',1,NULL)) + COUNT(IF(palavras !='',1,NULL)) + COUNT(IF(titulourl !='',1,NULL)) AS total FROM ideal_paginas"; 
$queryOtimizacao = mysqli_query($conn, $sqlOtimizacao); 
$sqlOtimizacao = mysqli_fetch_array($queryOtimizacao);
$totalOtimizacao = $sqlOtimizacao["total"]; 

$sqlOtimizacao = "SELECT  COUNT(id_bloco) AS total FROM ideal_blocos"; 
$queryOtimizacao = mysqli_query($conn, $sqlOtimizacao); 
$sqlOtimizacao = mysqli_fetch_array($queryOtimizacao);
$totalBlocos = $sqlOtimizacao["total"]; 

$sqlOtimizacao = "SELECT  COUNT(id_pagina) AS total FROM ideal_paginas"; 
$queryOtimizacao = mysqli_query($conn, $sqlOtimizacao); 
$sqlOtimizacao = mysqli_fetch_array($queryOtimizacao);
$totalPaginas = $sqlOtimizacao["total"]; 

$totalpublicacoes = $totalBlocos + $totalPaginas;

$totalPaginas = $totalPaginas * 3;
?>