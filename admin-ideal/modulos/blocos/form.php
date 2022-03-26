<?php 
    include "../../config/conn.php";
    $id_categoria  = filter_input(INPUT_POST, 'id_categoria');

    $sql = "SELECT * 
        FROM ideal_blocos_categoria
        WHERE id_categoria = $id_categoria"; 
    $query = mysqli_query($conn, $sql);
    $sql = mysqli_fetch_array($query);
        $nome = $sql["nome"];
        $status = $sql["status"];
?>	

<div class="card">
    <form name="form_bloco" id="form_bloco">
        <div class="card-header bg-transparent">
        <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Cadastrar blocos / <strong>TaxForce / <?= $nome; ?></strong></h3>
          <label class="custom-toggle checked-status">
                <input type="checkbox" name="status" >
                <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
          </label>
        </div>
        </div>
        </div>
        <div class="card-body dd">
            <input type="hidden" class="form-control" id="id"  name="id" placeholder="" value="<?= $id_categoria; ?>">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="" value="">
            </div>

            <div class="form-group">
                <label for="chamada">Chamada</label>
                <input type="text" class="form-control" name="chamada" placeholder="" value="">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="" value="">
            </div>



        </div>
        <div class="card-body" style="padding-top:  0;">
            <div class="wrapper row">
                <div class="col-12 col-md-4">
                 <div class="box">
                    <div class="js--image-preview"></div>
                    <div class="upload-options">
                      <label>
                        <input type="file" class="image-upload"  name="files[]" id="files2" accept="image/*"/>
                      </label>
                    </div>
                    </div>
                    <p>Upload (Gif/Jpg/Png) formato: 61 x 125</p>
                </div>
            </div>

            <div class="form-group">
                <div class="alert" role="alert"></div>
            </div>

            <button type="button" id="submit" value="Upload" class="btn btn-icon btn-success" style="margin-top: 20px; float:  right;">
                <span class="btn-inner--text">Salvar</span>
                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
            </button>  
        </div>
    </form>
  </div>


<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script>
 $(document).ready(function(){

		$('#submit').click(function(){

         var form_data = new FormData(document.getElementById("form_bloco"));	

        $.ajax({
            url: 'modulos/blocos/ajaxfile.php',
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
                    $("#form_bloco .alert").addClass("alert-danger");
                }
                else{
                    $("#form_bloco .alert").addClass("alert-success");
                }
                $("#form_bloco .alert").slideDown();
                $("#form_bloco .alert").html(retorno);
                $("input[name='url']").attr("disabled","disabled");
                setTimeout(function () {
                    $("#form_bloco .alert").slideUp();

                    $('#submit').removeAttr("disabled");
                    $('#submit').css("opacity","1");    

                    $("#form_bloco .alert").removeClass("alert-danger");
                    $("#form_bloco .alert").removeClass("alert-success");
               }, 3000);
            }

        });
    }); 
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

</script>