<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrativo | Idealiz Comunicação e Design</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="assets/dropzone/dropzone.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/lightbox.min.css">
	</head>
<body>
	
    <div class="container">
        <div class="dropzone dz-clickable" id="myDrop">
            <div class="dz-default dz-message" data-dz-message="">
                <span>Drop files here to upload</span>
            </div>
        </div>
        <input type="button" id="add_file" value="subir" class="btn btn-primary mt-3">
    </div>
    <hr class="my-5">
    <div class="container">
    	<div id="msg" class="mb-3"></div>
        <!-- a href="javascript:void(0);" class="btn btn-outline-primary reorder" id="updateReorder">Organizar Imagens</a>
        <div id="reorder-msg" class="alert alert-warning mt-3" style="display:none;">
            <i class="fa fa-3x fa-exclamation-triangle float-right"></i> 1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.
        </div -->
        <div class="gallery">
            <ul class="nav nav-pills">
            	<?php
					include "config/conn.php";
				
					$sql = "SELECT * FROM ideal_clientes"; 
					$query = mysqli_query($conn, $sql); 
                    while($sql = mysqli_fetch_array($query)){ 
					$img_name = $sql["img_name"]; 
					$id = $sql['id'];
					$descricao = $sql['descricao'];
				?>  
                <li id="image_li_<?php echo $id; ?>" class="ui-sortable-handle mr-2 mt-2">
                    <div><a href="javascript:void(0);" class="img-link" style="background: url(../uploads/clientes/<?php echo $img_name; ?>) no-repeat center / cover;">
							<img src="uploads/clientes/<?php echo $img_name; ?>" alt="" class="img-thumbnail" width="200" style="display:  none;">
						</a>
					</div>
					<div class="acoes" rel="<?php echo $id; ?>">
						<div class="editar"><i class="far fa-edit"></i></div>
						<div class="deletar"><i class="far fa-trash-alt"></i></div>
						<a class="zoom example-image-link" href="/uploads/clientes/<?php echo $img_name; ?>" data-lightbox="example-set" ><i class="fas fa-search"></i></a>
						<div class="descricao"><input type="text" placeholder="<?php if($descricao == ""){ echo "Descrição da imagem"; }else{ echo $descricao;  } ?>"><input class="btn-salvar-descricao" type="button"></div>
					</div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
	
    <a class="logoidealiz"></a>
	<script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
    <script src="assets/dropzone/dropzone.js"></script>
	
    <script>
		$(document).ready(function(){
			
			$(".editar").on("click",function(){
				$(this).parent().find(".descricao").toggle();
			});
			
			$(".btn-salvar-descricao").on("click",function(){
				var valor = $(this).parent().find("input[type=text]").val();
				var idpost = $(this).parent().parent().attr("rel");
				$.ajax({
				  url:'modulos/clientes/atualiza_imagem.php',
				  type:'POST',
				   data: {
					  id: idpost,
					  descricao: valor
				   },
				  success: function (retorno) {
					  alert(retorno);
				  }
				 }); 
			});
			
			
			$(".deletar").on("click",function(){
				var idpost = $(this).parent().attr("rel");
				excluir_imagem(idpost);
				gallery();

			});
			
			function gallery() {
			 $.ajax({
			  url:'modulos/clientes/gallery.php',
			  method:'POST',
			  success: function (retorno) {
			   $(".gallery").html(retorno);
			  }
			 }); 
			}
			

			function excluir_imagem(idpost) {
				if(confirm("Deseja deletar a imagem?")){
				 $.ajax({
				  url:'modulos/clientes/excluir_imagem.php',
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
							url: "modulos/clientes/update.php",
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
				 url: "modulos/clientes/action-z.ajax.php",
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
				$("#msg").html(message);
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
