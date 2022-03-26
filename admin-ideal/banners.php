<?php
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}

$tokenUsuario = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
if($_SESSION['donoDaSessao'] != $tokenUsuario){
    header("Location: login.php");
}

include_once("banners-config.php");

?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Banners</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/custom-theme/jquery-ui-1.10.3.custom.css" />
<?php include_once("include/script.php"); ?>
</head>

<body>

  <?php include_once("include/menu.php"); ?>

  <div class="main-content" id="panel">

    <?php include_once("include/topo.php"); ?>

    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
             <div class="col-12 text-center">
               <div class="linha"></div>
             </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              	<h3 class="mb-0 col-6">Banners</h3>
				<a href="banners-editor.php"><button type="button" class="btn btn-primary btn-novo" data-toggle="tooltip" data-placement="left" title="Criar novo banner">Novo</button></a>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nome</th>
                    <th scope="col" class="sort" data-sort="budget">Página</th>
                    <th scope="col" class="sort" data-sort="status">Data Inicial</th>
					<th scope="col" class="sort" data-sort="status">Data Final</th>
					<th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" style="text-align: right;">Ações</th>
                  </tr>
                </thead>
                <tbody class="list" id="sortable">
				
				<?php
                    
                    $sql = "SELECT ideal_paginas.nome, ideal_banners.id, ideal_banners.inicio, ideal_banners.termino, ideal_banners.status, ideal_banner_idioma.titulo, ideal_banner_idioma.desktop, ideal_banner_idioma.link 
                        FROM ideal_banners 
                        LEFT JOIN ideal_banner_idioma ON ideal_banner_idioma.id_banner = ideal_banners.id 
                    LEFT JOIN ideal_paginas ON ideal_paginas.id_pagina = ideal_banners.id_pagina
                        WHERE ideal_banner_idioma.idioma = 'pt' order by ideal_banners.ordem"; 
					$query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
					$id = $sql["id"]; 
					$inicio = $sql["inicio"];
					$termino = $sql["termino"];
                    $pagina = $sql["nome"];
					$status = $sql["status"];
                    $titulo = $sql["titulo"];
                    $desktop = $sql["desktop"];
                    $link = $sql["link"];

				?>	

                  <tr class="item_banner" id="<?php echo $id; ?>">
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3" style="background: #666 url(../uploads/banners/<?php if($desktop != ""){echo $desktop; } else { echo "sem-imagem.jpg"; } ?>) no-repeat center / cover; "></a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">
                              <?php $totalcara = strlen($titulo); if($totalcara < 34){ echo $titulo; }else { echo substr($titulo, 0, 35);echo "...";}  ?>
                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                     <?php echo $pagina; ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $inicio = implode('/', array_reverse(explode('-', $inicio))); ?></span>
                      </span>
                    </td>
					<td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $termino = implode('/', array_reverse(explode('-', $termino))); ?></span>
                      </span>
                    </td>
					<td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-<?php if($status == 1){ echo "success"; } else{ echo "warning"; } ?>"></i>
                        <span class="status"><?php if($status == 1){ echo "ativo"; } else{ echo "desativado"; } ?></span>
                      </span>
                    </td>
                    <td class="text-right">
                      <a href="banners-editor?id=<?php echo $id; ?>"><button type="button" class="btn btn-outline-info ico" data-toggle="tooltip" data-placement="left" title="Editar banner"><i class="ni ni-settings-gear-65"></i></button></a>
                    </td>
                  </tr>
				  
				<?php } ?>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <!-- ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul -->
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->

      <!-- Footer -->
      <?php include_once("include/rodape.php"); ?>
    </div>
  </div>

  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

  <script src="assets/js/argon2.min.js?v=5"></script>
  <script src="assets/js/action.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
  <script>
	$(function() {
		$( "#sortable" ).sortable({
		deactivate: function( event, ui ) { salvar_posicao();
		}
		});
		$( "#sortable" ).disableSelection();
	});
	  
	  
	function salvar_posicao() {
	var posicao = 1;
	$(".item_banner").each(function() {
		var quantidade = $(".item_banner").lengt;
		var idbanner  = this.id;
		salvarPermisao(idbanner,posicao);
		posicao ++;	

		if(posicao > quantidade){
			return false;
		}
	});

	}

	function salvarPermisao(a,b) {

	 $.ajax({
	  url:'modulos/banners/atualizar.php',
	  type:'POST',
	   data: {
		idbanner: a,
		posicao: b
	   },
	  success: function (retorno) {
	   //alert(retorno)
	   }
	 }); 
	}
	</script>		
</body>

</html>