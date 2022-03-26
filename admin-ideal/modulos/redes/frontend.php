<?php

	/* $linguagem = "";

	$linguagem = $_COOKIE["session"];	

	

	if($linguagem == "Portugues" || $linguagem == ""){ 
		$dadotexto = "conteudo"; $dadotitulo = "titulo"; 
	} else if($linguagem == "Ingles"){ 
		$dadotexto = "conteudoIngles"; $dadotitulo = "tituloIngles"; 
	} else if($linguagem == "Espanhol"){ 
		$dadotexto = "conteudoEspanhol"; $dadotitulo = "tituloEspanhol";
	}

	$cacos = explode("/", $_SERVER['PHP_SELF']);

	$pagina = end($cacos);

	$sql = "SELECT * FROM metas where url = '$pagina'"; 

	$query = mysqli_query($conexao, $sql);

	while($sql = mysqli_fetch_array($query)){ 

	$titulo = $sql["titulo"]; 

	$keywords = $sql["keywords"]; 

	$description = $sql["description"]; 

	$classification = $sql["classification"]; 

	$abstract = $sql["abstract"];  

	$paginaconteudo = utf8_encode($sql["pagina"]);  

	} */

	$sql = "SELECT * FROM ideal_redes"; 

	$query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 

		$facebook = $sql["facebook"]; 
		$twitter = $sql["twitter"]; 
		$youtube = $sql["youtube"];
		$instagram = $sql["instagram"];
		$linkedin = $sql["linkedin"];

	}

	/*$sql = "SELECT * FROM logo "; 

	$query = mysqli_query($conexao, $sql);

	while($sql = mysqli_fetch_array($query)){ 

	$logo = $sql["logo"]; 

	}

	$sql = "SELECT * FROM logo "; 

	$query = mysqli_query($conexao, $sql);

	while($sql = mysqli_fetch_array($query)){ 

	$logo = $sql["logo"]; 

	}

	$sql = "SELECT * FROM conteudo where referencia = '$paginaconteudo'"; 

	$query = mysqli_query($conexao, $sql);

	while($sql = mysqli_fetch_array($query)){ 

	$texto = $sql[$dadotexto]; 

	$titulo = $sql[$dadotitulo]; 

	}

	function eventos(){	

		$sql = "SELECT * FROM eventos where status = '1' ORDER BY id LIMIT 2"; 

		$query = mysqli_query($conexao, $sql);

		while($sql = mysqli_fetch_array($query, MYSQL_ASSOC)){ 

			$eventos[] = $sql;

		}

		return $eventos;}
	*/
?>