<?php
    $servidor = "standardit.mysql.dbaas.com.br";
	$usuario = "standardit";
	$senha = "Ucf073_r";
	$dbname = "standardit";

	//$servidor = "localhost";
	//$usuario = "root";
	//$senha = "";
	//$dbname = "gomara";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $conn -> set_charset("utf8");

    $url = basename($_SERVER['PHP_SELF'],'.php');
    $url = explode('/', $url);
    $url = array_filter($url);
    $url = array_merge($url, array()); 
	$url = $url[0];
	
	//$url = trim($url, '-homolog');

    define("PAGINA", $url);
    
    //define("URL", "https://gomara.tech/new-standardit/");
    define("URL", "http://localhost/projetos/new-standardit/");

    // identifica idioma
    if(isset($_GET["idioma"])){ $sku = $_GET["idioma"]; } else { $sku = "pt"; }

    // Traduções

    function traducao($valor){   
        global $sku;
        global $conn;


        $sqltraducoes = "SELECT traducao FROM ideal_traducoes WHERE idioma = '".$sku."' AND chave = '".$valor."'"; 
        $querytraducoes = mysqli_query($conn , $sqltraducoes); 
        $sqltraducoes = mysqli_fetch_array($querytraducoes);
        $valor = $sqltraducoes["traducao"];
        echo $valor;
    }

        $sqlseo = "
        SELECT  a.titulourl,
            a.id_pagina,
			a.palavras,
			a.nome,
            a.descricao,
            b.titulo,
            b.chamada,
            b.texto,
            b.imagem,
            b.idioma
              FROM ideal_paginas AS a
              JOIN ideal_paginas_idioma AS b ON b.id_pagina = a.id_pagina
              WHERE a.url LIKE '%". $url ."%' AND b.idioma = '". $sku ."'";

        $queryseo = mysqli_query($conn, $sqlseo);
        while($sqlseo = mysqli_fetch_array($queryseo, MYSQLI_ASSOC)){ 

            $seo[] = $sqlseo;

        }

        $chamada = unserialize($seo[0]["chamada"]);

		$sqlbanners = "
        SELECT 
            b.idioma,
            a.inicio,
            a.termino,
            a.status,
            a.ordem,
            b.titulo,
            b.frase,
            b.link,
            b.botao,
            b.desktop,
            b.tablet,
            b.mobile,
            c.id_pagina,
            c.nome
        FROM ideal_banner_idioma AS b
        LEFT JOIN ideal_banners AS a ON a.id = b.id_banner
        LEFT JOIN ideal_paginas AS c ON c.id_pagina = a.id_pagina
        WHERE c.id_pagina = '". $seo[0]['id_pagina'] ."' and b.idioma = '".$sku."' order by a.ordem"; 

		$querybanners = mysqli_query($conn, $sqlbanners);
        $totalbanners = 0;
		while($sqlbanners = mysqli_fetch_array($querybanners, MYSQLI_ASSOC)){ 

			$banners[] = $sqlbanners;
            $totalbanners++;

		}


        //Destaques
        $sqldestaques = "
        SELECT
            a.id_destaque,
            a.status,
            a.ordem,
            b.titulo AS titulo,
            b.chamada AS chamada,
            b.botao AS botao,
            b.link AS link,
            b.imagem AS imagem
        FROM ideal_destaques_idioma AS b
        LEFT JOIN ideal_destaques AS a ON a.id_destaque = b.id_destaque
        WHERE b.idioma = '".$sku."' Order by a.ordem"; 

		$querybanners = mysqli_query($conn, $sqldestaques);
		while($sqldestaques = mysqli_fetch_array($querybanners, MYSQLI_ASSOC)){ 

			$destaques[] = $sqldestaques;

		}


		//Blog 
        $sqlblog = "
        SELECT
			a.id_blog,
			a.status,
			a.ordem,
			b.titulo AS titulo,
			b.chamada AS chamada,
			a.data AS data,
			b.link AS link,
			c.nome AS categoria,
			b.imagem AS imagem
		FROM ideal_blog_idioma AS b
		LEFT JOIN ideal_blog AS a ON a.id_blog = b.id_blog
		LEFT JOIN ideal_blog_categoria AS c ON a.id_categoria = c.id_categoria
        WHERE b.idioma = '".$sku."' Order by a.ordem"; 

		$queryblog = mysqli_query($conn, $sqlblog);
		$totalblog = 0;
		while($sqlblog = mysqli_fetch_array($queryblog, MYSQLI_ASSOC)){ 

			$blog[] = $sqlblog;
			$totalblog++;

		}


    $sqlblocos = "SELECT ideal_blocos.status, ideal_blocos.ordem, ideal_blocos.id_bloco, ideal_blocos_idioma.chamada, ideal_blocos_idioma.titulo, ideal_blocos_idioma.video, ideal_blocos_idioma.texto,   ideal_blocos_idioma.chamada,   ideal_blocos_idioma.imagem, ideal_blocos.ordem, ideal_blocos_categoria.nome, ideal_paginas.url, ideal_blocos_categoria.id_categoria
    FROM ideal_blocos 
    LEFT JOIN ideal_blocos_categoria ON ideal_blocos.id_categoria = ideal_blocos_categoria.id_categoria 
    LEFT JOIN ideal_blocos_idioma ON ideal_blocos_idioma.id_bloco = ideal_blocos.id_bloco
    LEFT JOIN ideal_paginas ON ideal_paginas.id_pagina = ideal_blocos_categoria.id_pagina 
    WHERE ideal_blocos.status = '1' and ideal_paginas.url  LIKE '%". $url ."%' Order by ideal_blocos.ordem desc"; 
    $totalblocos = 0;
	$queryblocos = mysqli_query($conn, $sqlblocos); while($sqlblocos = mysqli_fetch_array($queryblocos)){ 

		$blocos[] = $sqlblocos;
        $totalblocos++;
	}


    $sqlCategorias = "SELECT ideal_blocos_categoria.nome, ideal_blocos_categoria.id_categoria
    FROM ideal_blocos 
    LEFT JOIN ideal_blocos_categoria ON ideal_blocos.id_categoria = ideal_blocos_categoria.id_categoria 
    LEFT JOIN ideal_paginas ON ideal_paginas.id_pagina = ideal_blocos_categoria.id_pagina 
    WHERE ideal_paginas.url LIKE '%". $url ."%' GROUP BY id_categoria";
    $queryCategorias = mysqli_query($conn, $sqlCategorias); while($sqlCategorias = mysqli_fetch_array($queryCategorias)){ 

        $Arraycategorias[] = $sqlCategorias;
    }




    // Redes sociais
    $sqlredes = "SELECT nome, link, icone FROM ideal_redes WHERE status = 1 ORDER BY ordem"; 
    $totalredes = 0;
	$queryredes = mysqli_query($conn, $sqlredes); while($sqlredes = mysqli_fetch_array($queryredes)){ 

		$redes[] = $sqlredes;
        $totalredes++;

	}

    // Clientes
    $sqlclientes = "SELECT img_name, nome, link FROM ideal_clientes WHERE status = 1 ORDER BY img_order"; 
    $totalclientes = 0;
	$queryclientes = mysqli_query($conn, $sqlclientes); while($sqlclientes = mysqli_fetch_array($queryclientes)){ 

		$clientes[] = $sqlclientes;
        $totalclientes++;

	}

    // Parceiros
    $sqlparceiros = "SELECT img_name, nome, link FROM ideal_parceiros WHERE status = 1 ORDER BY img_order"; 
    $totalparceiros = 0;
	$queryparceiros = mysqli_query($conn, $sqlparceiros); while($sqlparceiros = mysqli_fetch_array($queryparceiros)){ 

		$parceiros[] = $sqlparceiros;
        $totalparceiros++;

	}

    // dados empresa
    $sql = "SELECT * FROM ideal_empresa"; 
	$query = mysqli_query($conn, $sql); 
	while($sql = mysqli_fetch_array($query)){ 

		$telefone = $sql["telefone"]; 
		$whatsapp = $sql["whatsapp"]; 
		$email = $sql["email"];
		$endereco = $sql["endereco"];
		$geo = $sql["geo"];
	}
    














	if(!isset($_SESSION['user'])){
		$_SESSION['user'] = "gomara";
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$symbian = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
		$windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

		if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
		   $dispositivo = "mobile";
		}

		else { $dispositivo = "computador";} 

		 $url = $_SERVER['HTTP_REFERER'];
		$midia = $_GET['utm_medium'];
		$utm_source = $_GET['utm_source'];
		
		if($utm_source == ""){	

			$array_url = parse_url($url);

			$dominio = explode(".", parse_url($url, PHP_URL_HOST));
			$domain = $dominio[1];


			if ($domain == 'linkedin') {
				$origem = "Linkedin";
			}
			else{
				$origem = $_GET['utm_source'];
				if($origem == ""){
					$origem = "Direto";
				}
			}
		}else{
			$origem = $_GET['utm_source'];
		} 

		$data = date('Y-m-d'); //date('d/m/Y \à\s H:i:s');

		$insert = mysqli_query($conn, "INSERT INTO ideal_acessos VALUES ('', '".$origem."', '".$data."', '".$dispositivo."', '".$url."', '".$midia."')");
	}
	else{
	}

	




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

	} 
    
	$sql = "SELECT * FROM ideal_dados"; 
	$query = mysqli_query($conn, $sql); 
	while($sql = mysqli_fetch_array($query)){ 

		$telefone = $sql["telefone"]; 
		$whatsapp = $sql["whatsapp"]; 
		$email = $sql["email"];
		$endereco = $sql["endereco"];
		$geo = $sql["geo"];
	}*/

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