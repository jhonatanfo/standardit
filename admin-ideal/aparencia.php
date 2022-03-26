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

include_once("aparencia-config.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Aparência</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  
</head>

<body>
  <?php include_once("include/menu.php"); ?>

  <div class="main-content" id="panel">

    <?php include_once("include/topo.php"); ?>

    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
         <div class="col-xl-6">
          <div class="card contrucao-menu" id="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Menu</h3>
                </div>
                <div class="col">
                  <div class="acoes-contrucao-menu">
                    
                    <button class="btn btn2 btn-primary" type="button" id="add"><i class="ni ni-fat-add"></i></button>
                 </div>
               </div>
              </div>
            </div>
            <div class="card-body">
                <form name="add_name" id="add_name">
                    <div class="timeline timeline-one-side" id="dynamic_field">
                        <div class="timeline-block">
                          <span class="timeline-step badge-primary">
                            <i class="ni ni-bold-right"></i>
                          </span>
                          <div class="timeline-content">
                            <div class="d-flex justify-content-between pt-1">
                                 <input type="text" name="1" class="form-control col" data-link="false" data-sub=""/>
                                 <input type="text" name="1" class="form-control col" data-link="true" data-sub=""/>
                                 <button class="btn btn2 btn-outline-primary btnsub" type="button"><i class="ni ni-align-left-2"></i></button>
                            </div>
                            
                          </div>
                        </div>
                    </div>                    
                    <button class="btn btn-icon btn-success" type="button" id="submit" >
                        <span class="btn-inner--text">Salvar</span>
                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
				    </button>
                </form>
			</div>
          </div>
        </div>   
          
         <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Aparencia</h3>
                </div>
              </div>
            </div>
            <div class="card-body dd">
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

  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>

  <script src="assets/js/argon2.min.js?v=1.2.0"></script>
  <script src="assets/js/action.js"></script>
 
    
    
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<div class="timeline-block" id="row'+i+'"><span class="timeline-step badge-primary"><i class="ni ni-bold-right"></i></span><div class="timeline-content"><div class="d-flex justify-content-between pt-1"><input type="text" name="'+i+'" class="form-control col" data-link="false" data-sub=""/><input type="text" name="'+i+'" class="form-control col" data-link="true" data-sub=""/><button class="btn btn2 btn-outline-primary btnsub" type="button"><i class="ni ni-align-left-2"></i></button><button type="button" name="remove" id="'+i+'" class="btn btn2 btn-outline-danger btn_remove"><i class="ni ni-fat-remove"></i></button></div></div></div>');
	});
    $(document).on('click', '.btnsub', function(){
        i++;
        var pai = $(this).parent().find('input').attr('name');
		$(this).parent().parent().append('<div class="timeline-block" id="row'+i+'"><div class="seta"></div><div class="timeline-content sub"><div class="d-flex justify-content-between pt-1"><input type="text" name='+i+' data-link="false" data-sub='+pai+' class="form-control col"/><input type="text" name='+i+' class="form-control col" data-link="true" data-sub='+pai+'/><button type="button" name="remove" id='+i+' class="btn btn2 btn-outline-danger btn_remove"><i class="ni ni-fat-remove"></i></button></div></div></div>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){	
        
        
        $('input').each(
            function(index){ 
                
                
                var nome = $(this).attr('name');
                var valor = $(this).val();
                var link = $(this).attr('data-link');
                var sub = $(this).attr('data-sub');
                
                
                $.ajax({
				  url:'modulos/aparencia/atualiza_menu.php',
				  type:'POST',
				   data: {
					nome: nome,
                    valor: valor,
                    link: link,
                    sub: sub
				   },
				  success: function (retorno) {
				   	$('.dd').html(retorno);
				  }
				 }); 
                
                

            }
        );

/*
        var valores = $('#add_name').serializeArray();  //  #formulario = id do form               var href = 'seu-arquivo.php';
        
        alert(valores);
        $.ajax({
            type: "GET",
            url: "modulos/aparencia/atualiza_menu.php",
            data: $.param(valores),
            success: function( data ){      
                alert(data);
            }
        });*/
        
        /*

		$.ajax({
			url:"modulos/aparencia/atualiza_menu.php",
			method:"POST",
			data:{
                data:  $('#add_name').serializeArray()
            },
			success:function(data)
			{
				alert(data);
				//$('#add_name')[0].reset();
			}
		});*/
	});
	
});
</script>
    
    
</body>

</html>