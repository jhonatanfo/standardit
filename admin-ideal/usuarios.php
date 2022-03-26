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

include_once("usuarios-config.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Usuários</title>


  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
         <div class="col-xl-6">
          <div class="card" id="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Usuários</h3>
                </div>
              </div>
            </div>
            <div class="">
                <div class="gallery">
                    <ul class="nav nav-pills">
                        <table class="table align-items-center table-flush">
                             <tbody class="list" id="sortable">
				
				<?php
					
				    $a = 1;
					$sql = "SELECT * FROM ideal_usuario"; 
					$query = mysqli_query($conn, $sql); 
                    while($sql = mysqli_fetch_array($query)){ 
					//$img_name = $sql["img_name"]; 
					$id = $sql['id'];
					$email = $sql['email'];
                    $nome = $sql['nome'];
				?>	
  
                  <tr rel="<?php echo $id; ?>">
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3" style="background: #cdcdcd url(../uploads/usuarios/<?php  //echo $img_name; ?>) no-repeat center / contain; "></a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo utf8_encode($nome); ?></span>
                        </div>  
                      </div>
                    </th>
                    <th style="padding-left: 0;">  
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $email; ?></span>
                        </div>  
                      </div>
                    </th>
                    <td class="text-right" >
                        <a><button type="button" class="btn btn-outline-info ico btn-editar-usuarios"><i class="ni ni-settings-gear-65"></i></button></a>
                        <a><button type="button" class="btn btn-outline-danger ico btn-deletar-usuarios"><i class="ni ni-fat-remove"></i></button></a>
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
          
         <div class="col-xl-6">
          <div class="card">
            <form id="form-usuarios">
                <div class="card-header bg-transparent">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Cadastrar usuários</h3>
                      <label class="custom-toggle checked-status">
                            <input type="checkbox" name="status">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    
                    <div class="foto-usuario row">
                        <div class="col-12 col-md-4">
                            <div class="box">
                            <div class="js--image-preview"></div>
                            <div class="upload-options">
                              <label>
                                <input type="file" class="image-upload"  name="files[]" id="files2" accept="image/*"/>
                              </label>
                            </div>
                            </div>
                            <p>Upload (Gif/Jpg/Png) formato: 400 x 400</p>
                        </div>
                        <div class="col-12 col-md-8">
                    

                        <div class="form-group">
                            <label for="frase">Nome</label>
                            <input type="nome" class="form-control" name="nome" >
                        </div>

                         <div class="form-group">
                            <label for="frase">E-mail</label>
                            <input type="email" class="form-control" name="email" >
                        </div>

                         <div class="form-group">
                            <label for="frase">Usuário</label>
                            <input type="usuario" class="form-control" name="usuario" >
                        </div>

                         <div class="form-group">
                            <label for="frase">Senha</label>
                            <input type="senha" class="form-control" name="senha" >
                        </div>

                         <div class="form-group">
                            <label for="frase">Tipo</label>
                            <select class="form-control" name="tipo">
                               <option value="1" selected>Administrador</option>   
                               <option value="2">Cliente</option>
                            </select>
                         </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                         <div class="alert" role="alert"></div>
                    </div>

                    <button type="button" id="submit" value="Upload" class="btn btn-icon btn-success" style="margin-top: 20px;">
                        <span class="btn-inner--text">Salvar</span>
                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                    </button>    


                </div>
            </form>
          </div>
        </div>      
      </div>

      <?php include_once("include/rodape.php"); ?>
    </div>
  </div>
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/js-cookie/js.cookie.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script><br>

<script src="assets/js/argon2.min.js?v=5"></script>
<script src="assets/js/action.js"></script>
<script src='assets/js/initImageUpload.js'></script>
<script src="assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>	
<script src="assets/js/bootstrap-select.min.js"></script>
    
<script>
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for(let i = 0; i < boxes.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}
window.CP.exitedLoop(1);




/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

	$(document).ready(function(){
        
        $(".btn-deletar-usuarios").on("click",function(){
            var idpost = $(this).parent().parent().parent().attr("rel");
            excluir_usuarios(idpost);
            atualizar_usuarios();

        });
        
        
        function atualizar_usuarios() {
			 $.ajax({
			  url:'modulos/usuarios/atualizar.php',
			  method:'POST',
			  success: function (retorno) {
			   $(".gallery").html(retorno);
			  }
			 }); 
			}
			

			function excluir_usuarios(idpost) {
				if(confirm("Deseja deletar esse usuário?")){
				 $.ajax({
				  url:'modulos/usuarios/excluir_usuarios.php',
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
        
		$('#submit').click(function(){
			
			var form_data = new FormData(document.getElementById("form-usuarios"));	

            $.ajax({
                url: 'modulos/usuarios/ajaxfile.php',
               	type: 'post',
               	data: form_data,
               	//dataType: 'json',
                contentType: false,
				cache: false,
                processData: false,
				beforeSend: function(){
	            	    $('#submit').attr("disabled","disabled");
	                	$('#submit').css("opacity",".5");
	            },
                success: function(retorno){	 
					var str = retorno;
					if(str.match(/Erro/)){
						$("#form-usuarios .alert").addClass("alert-danger");
					}
					else{
						$("#form-usuarios .alert").addClass("alert-success");
					}
					$("#form-usuarios .alert").slideDown();
					$("#form-usuarios .alert").html(retorno);
					setTimeout(function () {
                        $("#form-usuarios .alert").slideUp();
                        $('#submit').removeAttr("disabled");
                        $('#submit').css("opacity","1");    
                        $("#form-usuarios .alert").removeClass("alert-danger");
                        $("#form-usuarios .alert").removeClass("alert-success");
                   }, 3000);
                }
                
            });
		});
	});

</script>  
    
    
</body>

</html>