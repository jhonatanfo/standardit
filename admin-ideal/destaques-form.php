<div class="card-body" style="padding-top: 0;">
     <div class="form-group form-row">
        <div class="col-12 col-md-6">
            <label for="titulo-<?php echo $sku; ?>">Titulo</label>
            <div class="input-group">
                <input type="text" class="form-control" name="titulo-<?php echo $sku; ?>" placeholder="" value="<?php echo $titulo; ?>">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <label for="chamada-<?php echo $sku; ?>">Chamada</label>
            <div class="input-group">
                <input type="link" class="form-control" name="chamada-<?php echo $sku; ?>" placeholder="" value="<?php echo $chamada; ?>">
            </div>
        </div>
    </div> 
    
    
    <div class="form-group form-row">
        <div class="col-12 col-md-6">
            <label for="link-<?php echo $sku; ?>">Link</label>
            <div class="input-group">
                <input type="link" class="form-control" name="link-<?php echo $sku; ?>" placeholder="" value="<?php echo $link; ?>">
                <div class="input-group-append">
                    <span class="input-group-text ajuda" id="basic-addon2" data-toggle="tooltip" data-placement="left" title="URL de destino do destaque"><i class="ni ni-air-baloon ajuda" ></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <label for="botao-<?php echo $sku; ?>">Botão</label>
            <div class="input-group">
                <input type="link" class="form-control" name="botao-<?php echo $sku; ?>" placeholder="" value="<?php echo $botao; ?>">
                <div class="input-group-append">
                    <span class="input-group-text ajuda" id="basic-addon2" data-toggle="tooltip" data-placement="left" title="Exemplo: Saiba mais"><i class="ni ni-air-baloon ajuda" ></i></span>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="card-body" style="padding-top:  0;">
    <div class="wrapper row">
        <div class="col-12 col-md-4">
            <p><strong class="text-orange">Imagem</strong><br><span>Upload (Gif/Jpg/Png) formato: 1980 x 780</span></p>
            <div class="box">
                <div class="js--image-preview" <?php if($imagem != ""){ ?> style="background-image: url('../uploads/destaques/<?php  echo $imagem; ?>');" <?php } ?>></div>
                <div class="upload-options">
                    <label>
                        <input type="file" class="image-upload"  name="files[]" id="files1-<?php echo $sku; ?>" accept="image/*" value="uploads/destaques/<?php echo $imagem; ?>" />
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>