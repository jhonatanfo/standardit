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

include_once("blocos-config.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Blocos</title>


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
              <div class="linha"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-4">
        <?php if($tipousuario == "1"){ ?>
          <div class="card contrucao-menu" id="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Cadastrar categoria</h3>
                    </div>
                    <div class="col">
                      <div class="acoes-contrucao-menu">

                      </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form name="add_name" id="add_name">
                    <div class="form-group form-row">
                        <input type="hidden" name="id_pagina" id="id_pagina" value="<?php echo $idget; ?>">
                        <input type="text" name="nome" id="nome" class="form-control col" data-link="false" data-sub=""/>
                        <button class="btn btn2 btn-success" type="button" id="salvar-categoria"><i class="ni ni-check-bold"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
  

          
            <div class="card contrucao-menu" id="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Categorias cadastradas</h3>
                        </div>
                    </div>
                </div>
                <div class=" bg-transparent">
                    <div class="row align-items-center">
                    <div class="col-12">
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" class="sort" data-sort="name">Nome</th>
                                <th scope="col" class="sort  text-right" data-sort="budget">Status</th>
                              </tr>
                            </thead>
                            <tbody class="list">
                                <!-- listagem por ajax function atualizar(); -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                </div>
                <div class="card-footer bg-transparent"></div>
            </div>   
          


        </div>
        <div class="col-8">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Blocos</h3>
              <a href="blocos-editar.php?pagina=<?= $idget; ?>"><button type="button" class="btn btn-primary btn-novo"  data-toggle="tooltip" data-placement="left" title="Criar novo bloco">Novo</button></a>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" class="sort" data-sort="name">Nome</th>
                            <th scope="col" class="sort" data-sort="budget">Status</th>
                            <th scope="col" class="sort text-right" data-sort="status">Ação</th>
                          </tr>
                        </thead>
                        <tbody id="sortable" class="list-blocos">
                            <?php 
                                $sql = "SELECT ideal_blocos.id_bloco, ideal_blocos.status, ideal_blocos_idioma.chamada, ideal_blocos_idioma.imagem
                                FROM ideal_blocos 
                                LEFT JOIN ideal_blocos_categoria ON ideal_blocos.id_categoria = ideal_blocos_categoria.id_categoria 
                                LEFT JOIN ideal_blocos_idioma ON ideal_blocos_idioma.id_bloco = ideal_blocos.id_bloco 
                                WHERE ideal_blocos_categoria.id_pagina = $idget GROUP BY ideal_blocos.id_bloco order by ordem"; 
                                $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
                                $id_bloco = $sql["id_bloco"]; 
                                $status = $sql["status"];
                                $chamada = $sql["chamada"];
                                $chamada = unserialize($chamada); 
                                $imagem =  $sql["imagem"];
                            ?>	



                            <tr class="item_bloco" id="<?= $id_bloco; ?>">
                           
                                <td>
                                  <div class="media align-items-center">
                                   <a href="#" class="avatar rounded-circle mr-3" style="background: #666 url(../uploads/blocos/<?php if($imagem != ""){echo $imagem; } else { echo "sem-imagem.jpg"; } ?>) no-repeat top right / cover ; "></a>
                                    <div class="media-body">
                                      <span class="name mb-0 text-sm"><?php  echo $chamada[0]; ?> </span>
                                    </div>
                                  </div>
                          
                                </td>
                                
                                
                                <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-<?php if($status == 1){ echo "success"; } else{ echo "warning"; } ?>"></i>
                                    <span class="status"><?php if($status == 1){ echo "ativo"; } else{ echo "desativado"; } ?></span>
                                  </span>
                                </td>
                                <td class="budget text-right">
                                    <a href="blocos-editar?id=<?= $id_bloco ?>&pagina=<?= $idget; ?>" data-toggle="tooltip" data-placement="left" title="Editar bloco"><button class="btn btn-outline-info ico" type="button"><i class="ni ni-settings-gear-65"></i></button></a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
    deactivate: function( event, ui ) { salvarPosicao();
    }
    });
    $( "#sortable" ).disableSelection();
});
$(document).ready(function(){

    $(document).on('click', '.btn2', function(){
      var id_categoria = $(this).attr('id');

        $.ajax({
           url:'modulos/blocos/form.php',
           type:'POST',
           data: {
           id_categoria: id_categoria
           },
           success: function(retorno) {  

               $('.atualizaform').html(retorno);
               atualizabloco(id);
           }   
          });
     }); 


     $(document).on('click', '.btn-atualizar-lista', function(){

      var idcategoria = $(this).attr('id');

        $.ajax({
           url:'modulos/blocos/atualizar-lista.php',
           type:'POST',
           data: {
           idcategoria: idcategoria,
           idget: <?php echo  $_GET['id']; ?>
           },
           success: function(retorno) {  

               $('.list-blocos').html(retorno);
           }   
          });
     }); 







    $("#salvar-categoria").click(function() {
     
  var id_pagina = $("#id_pagina").val();
  var nome = $("#nome");
  var nomePost = nome.val();
  
  $.ajax({
   url:'modulos/blocos/salvar.php',
   type:'POST',
   data: {
   nome: nomePost,
   id_pagina: id_pagina
   },
   success: function(retorno) {  

	   var str = retorno;
	   if(str.match(/Erro/)){
           alert(retorno);
		    $("#form-redes .alert").addClass("alert-danger");
		}
		else{
			var id = <?php echo $idget; ?>;
            atualiza(id);
		}
   }   
  });
  return false;
 }); 
});
    
 function atualiza(id){
    
     $.ajax({
       url:'modulos/blocos/atualizar.php',
       type:'POST',
       data: {
       id: id
       },
       success: function (retorno) { 
           $(".list").html(retorno);
	   }
	 }); 
	}
  var id = <?php echo $idget; ?>;
  atualiza(id);
    
    
   function atualizabloco(id){
    
     $.ajax({
       url:'modulos/blocos/list.php',
       type:'POST',
       data: {
        id: id
       },
       success: function (retorno) { 
           $(".list-bloco").html(retorno);
	   }
	 }); 
   }
   atualizabloco(id);
    
	function salvarPosicao() {
	var posicao = 1;
	$(".item_bloco").each(function() {
		var quantidade = $(".item_bloco").lengt;
		var idBloco  = this.id;
		atualizarPosicao(idBloco,posicao);
		posicao ++;	

		if(posicao > quantidade){
			return false;
		}
	});

	}

	function atualizarPosicao(a,b) {

	 $.ajax({
	  url:'modulos/blocos/atualizarordem.php',
	  type:'POST',
	   data: {
		idBloco: a,
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