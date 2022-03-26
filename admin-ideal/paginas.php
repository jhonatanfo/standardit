<?php
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
include_once("paginas-config.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Páginas</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
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
              <h3 class="mb-0">Páginas</h3>
              <?php if($tipousuario == "1"){ ?>
              <a href="paginas-editor.php"><button type="button" class="btn btn-primary btn-novo" data-toggle="tooltip" data-placement="left" title="Criar nova página">Novo</button></a>
              <?php } ?>

            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nome</th>
                    <th scope="col" class="sort" data-sort="budget">URL</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Otimização (SEO)</th>
                    <th scope="col" style="text-align: right;">Ações</th>
                  </tr>
                </thead>
                 <tbody class="list" id="sortable">
				
				<?php
                     $a = 1;
					$sql = "SELECT ideal_paginas.id_pagina, ideal_paginas.url, ideal_paginas.status, ideal_paginas_idioma.titulo, ideal_paginas_idioma.imagem, ideal_blocos_categoria.status as bloco
                            FROM ideal_paginas 
                            LEFT JOIN ideal_paginas_idioma ON ideal_paginas_idioma.id_pagina = ideal_paginas.id_pagina 
                            LEFT JOIN ideal_blocos_categoria ON ideal_blocos_categoria.id_pagina = ideal_paginas.id_pagina 
                            WHERE ideal_paginas_idioma.idioma = 'pt' GROUP BY ideal_paginas.id_pagina"; 
					$query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
					$id = $sql["id_pagina"]; 
					$titulo = $sql["titulo"]; 
					$url = $sql["url"];
					$status = $sql["status"];
                    $bloco = $sql["bloco"];
                    $imgconteudo = $sql["imagem"];
                        
                    // SEO otimização 


                    $seo = "SELECT  COUNT(IF(descricao !='',1,NULL)) + COUNT(IF(palavras !='',1,NULL)) + COUNT(IF(titulourl !='',1,NULL)) AS total FROM ideal_paginas WHERE id_pagina ='".$id."'"; 
                    $queryseo = mysqli_query($conn, $seo); 
                    $seo = mysqli_fetch_array($queryseo);

                    $totalseo = $seo["total"]; 
 

				?>	
  
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       <a href="#" class="avatar rounded-circle mr-3" style="background: #666 url(../uploads/paginas/<?php if($imgconteudo != ""){echo $imgconteudo; } else { echo "sem-imagem.jpg"; } ?>) no-repeat center / cover; "></a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">
                              <?php $totalcara = strlen($titulo); if($totalcara < 34){ echo $titulo; }else { echo substr($titulo, 0, 35);echo "...";}  ?>
                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                     <?php echo $url; ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-<?php if($status == 1){ echo "success"; } else{ echo "warning"; } ?>"></i>
                        <span class="status"><?php if($status == 1){ echo "ativo"; } else{ echo "desativado"; } ?></span>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2"><?php  echo round(porcentagem_xn($totalseo, '3')); ?>%</span>
                        <div>
                           <div class="progress">
                             <div class="progress-bar <?php if($a == 1){ echo "bg-gradient-danger"; } else if($a == 2){ echo "bg-gradient-success"; } else if($a == 3){ echo "bg-gradient-primary"; } else if($a == 4){ echo "bg-gradient-info"; } else if($a == 5){ echo "bg-gradient-warning"; } ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(porcentagem_xn($totalseo, '3')); ?>%;"></div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                       <?php  if($bloco){ ?>
                        <a href="blocos?id=<?php echo $id; ?>"  data-toggle="tooltip" data-placement="left" title="Editar bloco"><button type="button" class="btn btn-outline-primary ico"><i class="ni ni-ungroup"></i></button></a>
                        <?php  } ?>
                        <a href="paginas-editor?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="left" title="Editar página"><button type="button" class="btn btn-outline-info ico"><i class="ni ni-settings-gear-65"></i></button></a>
                    </td>
                  </tr>
                     
                <?php $a++; } ?>
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
</body>

</html>