<?php
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
include_once("blog-config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Blog</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="assets/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
        <div class="col-xl-12">
          <div class="card">
			<form id="form">
                <div class="card-header bg-transparent">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Cadastro de Blog</h3>
                      <label class="custom-toggle checked-status">
                            <input type="checkbox" name="status" <?php if($statusblog == 1){ echo "checked";} else if($statusblog == 0){ echo "";} else{ echo "checked";} ?> >
                            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="ct-example"> 
                    <div class="nav btn-group btn-group-toggle" id="nav-tab">

                        <?php 
                        $sql = "SELECT * FROM ideal_idioma WHERE status = '1'"; 
                        $query = mysqli_query($conn, $sql); 
                        while($sql = mysqli_fetch_array($query)){ 
                            $id_idioma = $sql["id_idioma"]; 
                            $nomeidioma = $sql["nome"]; 
                            $sku = $sql["idioma"]; 
                        ?>

                        <a class="btn btn-secondary <?php if($id_idioma == "1"){ echo "active"; } else { echo ""; } ?>" id="nav-<?php echo $sku; ?>-tab" data-toggle="tab" href="#nav-<?php echo $sku; ?>" role="tab" aria-controls="nav-<?php echo $sku; ?>" aria-selected="<?php if($id_idioma == "1"){ echo "true"; } else { echo "false"; } ?>"><?php echo $nomeidioma; ?></a>

                        <?php } ?> 

                    </div>
                    
                    <div class="accordion" id="accordionExample">

                        <div class="tab-content">

                        <div class="card-body" style="padding-bottom: 0; ">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group form-row" style="margin-bottom: 0;">
                              <div class="col-12 col-md-4">
                                  <label for="categoria">Categoria</label>
                                  <select class="form-control" name="categoria">
                                      <option value="<?php echo $idcategoria; ?>" selected><?php if($nomecategoria == ""){ echo "Escolha a categoria"; }else{ echo $nomecategoria; } ?></option>   
                                      <?php
                                          $sql = "SELECT * FROM ideal_blog_categoria"; 
                                          $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
                                          $idcategoria = $sql["id_categoria"]; 
                                          $nomecategoria = $sql["nome"]; 
                                      ?>	
                                      <option value="<?php echo $idcategoria; ?>"><?php echo $nomecategoria; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>  
                              <div class="col-12 col-md-4">
                                  <label for="data">Data de criação</label>
                                  <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                  </div>
                                  <input class="form-control datepicker" placeholder="Selecione um data" type="text" name="data"  value="<?php echo $data; ?>">
                                  </div>
                              </div>

                              <div class="col-12 col-md-4">
                                  <label for="destaque">Destaque</label>
                                  <select class="form-control" name="destaque">
                                      <?php if($destaque == "1"){ $textodestaque = "Sim"; } else if($destaque == "0"){ $textodestaque  = "Não"; } ?>
                                      <option value="<?php echo $destaque; ?>" selected><?php if($destaque == ""){ echo "Deseja destacar?"; }else{ echo $textodestaque; } ?></option>   
                                      <option value="0">Não</option>
                                      <option value="1">Sim</option>
                                      <option value="2">Super destaque</option>
                                  </select>
                              </div>  

                          </div>
                        </div>


                        <?php 
                            $sql = "SELECT * FROM ideal_idioma WHERE status = '1'";
                            $query = mysqli_query($conn, $sql); 
                            while($sql = mysqli_fetch_array($query)){  
                                $sku = $sql["idioma"]; 
                                $id_idioma = $sql["id_idioma"]; 
                            ?>
                            <div id="nav-<?php echo $sku; ?>" class="tab-pane fade <?php if($id_idioma == "1"){ echo "show active"; } ?>" role="tabpanel" aria-labelledby="nav-<?php echo $sku; ?>-tab">
                            
                                <?php
                    
                                if($id_blog){
                                    
                                $sqlidioma = "
                                SELECT
                                    a.id_blog,
                                    a.status,
                                    b.titulo,
                                    b.chamada,
                                    b.link,
                                    b.texto,
                                    b.imagem
                                FROM ideal_blog_idioma AS b
                                LEFT JOIN ideal_blog AS a ON a.id_blog = b.id_blog
                                WHERE b.id_blog = '".$id_blog."' AND b.idioma = '".$sku."'"; 
                                    
                                $queryidioma = mysqli_query($conn, $sqlidioma); 
                                while($sqlidioma = mysqli_fetch_array($queryidioma)){ 

                                    $status = $sqlidioma["status"];
                                    $titulo = $sqlidioma["titulo"];
                                    $chamada = $sqlidioma["chamada"]; 
                                    $link = $sqlidioma["link"];
                                    $imagem = $sqlidioma["imagem"];
                                    $id_blog = $sqlidioma["id_blog"]; 
                                    $texto = $sqlidioma["texto"]; 
                                
                                    include "blog-form.php"; ?> 
                                
                                
                                <?php  } } else { include "blog-form.php";  }?> 

                            </div>

                        <?php  } ?> 

                        <div class="card-body">

                        <div class="form-group">
                            <div class="alert" role="alert"></div>
                        </div>

                        <button type="button" id="submit" value="Upload" class="btn btn-icon btn-success" style="margin-top: 20px; float:  right;">
                        <span class="btn-inner--text">Salvar</span>
                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                        </button>
                        </div>

                  </div>
                        
                    </div>
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
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="assets/js/argon2.min.js?v=5"></script>
<script src="assets/js/action.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckeditor/samples/js/sample.js"></script>
    
<script src='assets/js/initImageUpload.js'></script>
<script src="assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/vendor/quill/dist/quill.min.js"></script>
<script src="assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>	
<script src="assets/js/bootstrap-select.min.js"></script>
<script>
$('select').selectpicker();
    
$( ".datepicker" ).datepicker({
   format: 'dd/mm/yyyy'
});


$(document).ready(function(){
    
    
var e = $('[data-toggle="tags"]');
e.length && e.each(function () {
    $(this).tagsinput({
        tagClass: "badge badge-primary"
    })
});

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

    
    
   $( "input[name='nome']" ).on("input", function(){
        var textoDigitado = $(this).val();
        var inputCusto = $(this).attr("url");
       
            textoDigitado = textoDigitado.replace(new RegExp('[ÁÀÂÃ]', 'gi'), 'A');
            textoDigitado = textoDigitado.replace(new RegExp('[ÉÈÊ]', 'gi'), 'E');
            textoDigitado = textoDigitado.replace(new RegExp('[ÍÌÎ]', 'gi'), 'I');
            textoDigitado = textoDigitado.replace(new RegExp('[ÓÒÔÕ]', 'gi'), 'O');
            textoDigitado = textoDigitado.replace(new RegExp('[ÚÙÛ]', 'gi'), 'U');
            textoDigitado = textoDigitado.replace(new RegExp('[Ç]', 'gi'), 'C');
            textoDigitado = textoDigitado.toLowerCase();
            textoDigitado = textoDigitado.replace(/ /g, "-");

            $("input[name='url']").attr("value", textoDigitado);
    });

    

    $('#submit').click(function(){

         var form_data = new FormData(document.getElementById("form"));	

         form_data.append('content-pt', CKEDITOR.instances['editor-pt'].getData());
        
        $.ajax({
            url: 'modulos/blog/ajaxfile.php',
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
                    $("#form .alert").addClass("alert-danger");
                }
                else{
                    $("#form .alert").addClass("alert-success");
                }
                $("#form .alert").slideDown();
                $("#form .alert").html(retorno);
                $("input[name='url']").attr("disabled","disabled");
                setTimeout(function () {
                    $("#form .alert").slideUp();

                    $('#submit').removeAttr("disabled");
                    $('#submit').css("opacity","1");    
                    $("#form .alert").removeClass("alert-danger");
                    $("#form .alert").removeClass("alert-success");
               }, 3000);
            }

        });
    });
});
    

    
initSample();
initSample1();
initSample2();
</script>
</body>

</html>