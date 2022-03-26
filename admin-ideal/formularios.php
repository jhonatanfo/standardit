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

include_once("formularios-config.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Formulários</title>

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
              	<h3 class="mb-0 col-6">Formulários</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nome</th>
                    <th scope="col" class="sort" data-sort="budget">Telefone</th>
                    <th scope="col" class="sort" data-sort="status">E-mail</th>
					<th scope="col" class="sort" data-sort="status">Origem</th>
                    <th scope="col" style="text-align: right;">Ações</th>
                  </tr>
                </thead>
                <tbody class="list" id="sortable">
				
				<?php    
                    $sql = "SELECT * FROM ideal_formulario"; 
					$query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
					$id_form = $sql["id_form"]; 
					$nome = $sql["nome"];
					$telefone = $sql["telefone"];
                    $email  = $sql["email"];
                    $origem = $sql["origem"];
				?>	

                  <tr class="item_banner">
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php  echo $nome; ?> </span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                     <?php echo $telefone; ?>
                    </td>
                     <td class="budget">
                     <?php echo $email; ?>
                    </td>
					 <td class="budget">
                     <?php echo $origem; ?>
                    </td>
                    <td class="text-right">
                      <a data-toggle="modal" data-target="#exampleModal">
                        <button type="button" id="<?php echo $id_form; ?>" class="btn btn-primary btn-form" data-toggle="tooltip" data-placement="left" title="Visualizar contato">
                            <i class="ni ni-zoom-split-in"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
				  
				<?php } ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
      <!-- Dark table -->

      <!-- Footer -->
      <?php include_once("include/rodape.php"); ?>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulário de contato</h5>
      </div>
      <div class="modal-body">
        <table class="table align-items-center table-flush">
            <tbody class="carrega-form">


            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
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

	$('.btn-form').on("click", function(){
    var id_form = $(this).attr('id');
	 $.ajax({
	  url:'modulos/formularios/formularios-modal.php',
	  type:'POST',
	   data: {
		id: id_form
	   },
	  success: function (retorno) {
	   $(".carrega-form").html(retorno);
	   }
	 }); 
	});
	</script>		
</body>

</html>