<div class="card-body" style="padding-top: 0;">

    <div class="form-group">
        <label for="titulo-<?php echo $sku; ?>">Título</label>
        <input type="titulo" class="form-control" name="titulo-<?php echo $sku; ?>" placeholder="" value="<?php echo $titulo; ?>">
    </div>

     <div class="form-group">
        <label for="chamada">Chamadas</label>
        <input type="text" class="form-control campochamada" name="chamada-<?php echo $sku; ?>[]" placeholder="" value="<?php if($idget){ echo $chamada[0]; } else{ echo $chamada;}?>">
        <button class="btn btn-primary btn-adicionar" rel="<?php echo $sku; ?>" type="button"><i class="ni ni-fat-add"></i></button>
     
    
     <?php for($x=1; $x < $qtchamada; $x++){ ?> 
        <div class="form-group">
        <input type="text" class="form-control mt-3 campochamada" id="remove<?php echo $x; ?>" name="chamada-<?php echo $sku; ?>[]" placeholder="" value="<?= $chamada[$x];?>">
        <button type="button" name="remove" id="<?php echo $x; ?>" class="btn btn2 btn-outline-danger btn_remove"><i class="ni ni-fat-remove"></i></button></div> 
     <?php } ?>  

    </div>
     <div class="form-group">
        <label for="texto">Texto</label>
        <div id="editor-<?php echo $sku; ?>">
            <h1><?php echo $texto; ?></h1>
        </div>
    </div>  
</div>


<div class="card-body" style="padding-top:  0;">
    <div class="wrapper row">
        <div class="col-12 col-md-4">
            <p><span>Upload (Gif/Jpg/Png) formato: 61 x 125</span></p>
            <div class="box">
                <div class="js--image-preview" <?php if($imagem != ""){ ?> style="background-image: url('../uploads/blocos/<?php  echo $imagem; ?>');" <?php } ?>></div>
                <div class="upload-options">
                    <label>
                        <input type="file" class="image-upload"  name="files[]" id="files1-<?php echo $sku; ?>" accept="image/*" value="uploads/blocos/<?php echo $imagem; ?>" />
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>