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

include_once("parceiros-config.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Parceiros</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/dropzone/dropzone.css" type="text/css">
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
         <div class="col-xl-7">
          <div class="card" id="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Parceiros</h3>
                </div>
              </div>
            </div>
            <div class="">
                <div class="gallery">
                    <ul class="nav nav-pills">
                        <table class="table align-items-center table-flush">
                             <tbody class="list" id="sortable">
				
				<?php
					include "config/conn.php";
				    $a = 1;
					$sql = "SELECT * FROM ideal_parceiros where status = 1"; 
					$query = mysqli_query($conn, $sql); 
                    while($sql = mysqli_fetch_array($query)){ 
					$img_name = $sql["img_name"]; 
					$id = $sql['id'];
					$descricao = $sql['descricao'];
                    $nome = $sql['nome'];
                    $link = $sql['link'];
				?>	
  
                  <tr rel="<?php echo $id; ?>">
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3" style="background: #cdcdcd url(../uploads/parceiros/<?php echo $img_name; ?>) no-repeat center / contain; "></a>
                        <div class="media-body">
                          <input type="text" class="campo-clientes" rel="nome" placeholder="<?php if($nome == ""){ echo "Nome do ciente"; }else{ echo $nome;  } ?>" value="<?php echo $nome; ?>"  disabled>
                        </div>
                      </div>
                    </th>
                    <th style="padding-left: 0;">  
                       <input type="text" class="campo-clientes" rel="descricao" placeholder="<?php if($descricao == ""){ echo "Descrição da imagem"; }else{ echo $descricao;  } ?>" value="<?php echo $descricao; ?>" disabled>
                    </th>
                    <th style="padding-left: 0;">  
                       <input type="text" class="campo-clientes"  rel="link" placeholder="<?php if($link == ""){ echo "www"; }else{ echo $link;  } ?>" value="<?php echo $link; ?>" disabled>
                    </th>
                    <td class="text-right" >
                        <a><button type="button" class="btn btn-outline-info ico btn-salvar-descricao"><i class="ni ni-settings-gear-65"></i></button></a>
                        <a><button type="button" class="btn btn-outline-danger ico deletar"><i class="ni ni-fat-remove"></i></button></a>
                    </th>
                  </tr>
                     
                <?php $a++; } ?>
                </tbody>
                        </table>
                    </ul>
                </div>
			</div>
          </div>
        </div>   
          
         <div class="col-xl-5">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Uploads</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="dropzone dz-clickable" id="myDrop">
                    <div class="dz-default dz-message" data-dz-message="">
                        <span>Drop files os logos dos parceiros</span>
                    </div>
                </div>
                
                <button type="button" id="add_file" value="Upload" class="btn btn-icon btn-success" style="margin-top: 20px;">
                    <span class="btn-inner--text">Salvar</span>
                    <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                </button>
                
                <div class="form-group" style="margin-top: 20px;">
                     <div class="alert" role="alert"></div>
                </div>
			</div>
          </div>
        </div>      
      </div>

      <?php include_once("include/rodape.php"); ?>
    </div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/dropzone/dist/dropzone.js"></script>

    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

    <script src="assets/js/argon2.min.js?v=5"></script>
    <script src="assets/js/action.js"></script>

    
<script>
    
		$(document).ready(function(){
            
           /* $('body').click(function (event) {
                if(event.target.id!='card'){
                     $(".campo-clientes").attr("disabled","disabled");
                }
            });*/
            
            
            $(".campo-clientes").on('keypress',function(e) {
                if(e.which == 13) {
                    $(this).attr("disabled","disabled");
                }
            });

            $(document).on('focusout','.campo-clientes', function() {
                
                var campo = $(this).attr('rel');
                var descricao = $(this).val();                
                
                var idpost = $(this).parent().parent().attr("rel");
                if(idpost == undefined){
                   var idpost = $(this).parent().parent().parent().parent().attr("rel");
                }
				$.ajax({
				  url:'modulos/parceiros/atualiza_parceiros.php',
				  type:'POST',
				   data: {
					  id: idpost,
					  campo: campo,
                      descricao: descricao,
				   },
				  success: function (retorno) {
					  $("[rel=" + campo + "]").attr("disabled","disabled");
				  }
				 }); 
            });  
			
            $(".deletar").on("click",function(){
				var idpost = $(this).parent().parent().parent().attr("rel");
				excluir_imagem(idpost);
				gallery();

			});
            
			$(".btn-salvar-descricao").on("click",function(){
				$(this).parent().parent().parent().find('.campo-clientes').removeAttr("disabled");
			});
			
			function gallery() {
			 $.ajax({
			  url:'modulos/parceiros/gallery.php',
			  method:'POST',
			  success: function (retorno) {
			   $(".gallery").html(retorno);
			  }
			 }); 
			}
			

			function excluir_imagem(idpost) {
				if(confirm("Deseja deletar a imagem?")){
				 $.ajax({
				  url:'modulos/parceiros/excluir_parceiros.php',
				  type:'POST',
				   data: {
					id: idpost
				   },
				  success: function (retorno) {
				   	alert(retorno);
				  }
				 }); 
				}
			}
			
			
			$('.reorder').on('click',function(){
				$("ul.nav").sortable({ tolerance: 'pointer' });
				$('.reorder').html('Save Reordering');
				$('.reorder').attr("id","updateReorder");
				$('#reorder-msg').slideDown('');
				$('.img-link').attr("href","javascript:;");
				$('.img-link').css("cursor","move");
				$("#updateReorder").click(function( e ){
					if(!$("#updateReorder i").length){
						$(this).html('').prepend('<i class="fa fa-spin fa-spinner"></i>');
						$("ul.nav").sortable('destroy');
						$("#reorder-msg").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
			 
						var h = [];
						$("ul.nav li").each(function() {  h.push($(this).attr('id').substr(9));  });
						 
						$.ajax({
							type: "POST",
							url: "modulos/parceiros/update.php",
							data: {ids: " " + h + ""},
							success: function(data){
								if(data==1 || parseInt(data)==1){
									window.location.reload();
								}
							}
						}); 
						return false;
					}       
					e.preventDefault();     
				});
			});
			 
			$(function() {
			  $("#myDrop").sortable({
				items: '.dz-preview',
				cursor: 'move',
				opacity: 0.5,
				containment: '#myDrop',
				distance: 20,
				tolerance: 'pointer',
			  });
		 
			  $("#myDrop").disableSelection();
			});
			 
			//Dropzone script
			Dropzone.autoDiscover = false;
			 
			var myDropzone = new Dropzone("div#myDrop", 
			{ 
				 paramName: "files", // The name that will be used to transfer the file
				 addRemoveLinks: true,
				 uploadMultiple: true,
				 autoProcessQueue: false,
				 parallelUploads: 50,
				 maxFilesize: 5, // MB
				 acceptedFiles: ".png, .jpeg, .jpg, .gif",
				 url: "modulos/parceiros/action-z.ajax.php",
			});
			 
			myDropzone.on("sending", function(file, xhr, formData) {
			  var filenames = [];
			   
			  $('.dz-preview .dz-filename').each(function() {
				filenames.push($(this).find('span').text());
			  });
			 
			  formData.append('filenames', filenames);
			});
			 
			/* Add Files Script*/
			myDropzone.on("success", function(file, message){

                    var str = message;
					if(str.match(/Erro/)){
						$(".alert").addClass("alert-danger");
					}
					else{
						$(".alert").addClass("alert-success");
					}
					$(".alert").slideDown();
					$(".alert").html(message);
					setTimeout(function () {
                        $(".alert").slideUp();
                        $('#add_file').removeAttr("disabled");
                        $('#add_file').css("opacity","1");    
                        $(".alert").removeClass("alert-danger");
                        $(".alert").removeClass("alert-success");
                   }, 3000);
                  gallery();
				//setTimeout(function(){window.location.href="index.php"},200);
			});
			  
			myDropzone.on("error", function (data) {
				 $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
			});
			  
			myDropzone.on("complete", function(file) {
				myDropzone.removeFile(file);
			});
			  
			$("#add_file").on("click",function (){
				myDropzone.processQueue();
			});
			 
		});
    
    
</script>  
    
    
</body>

</html>