<div class="card-body" style="padding-top: 0;">
     <div class="form-group form-row">
        <div class="col-12 col-md-6">
            <label for="titulo-pt">Titulo</label>
            <input type="text" class="form-control" name="titulo-<?php echo $sku; ?>" placeholder="" value="<?php echo $titulo; ?>">
        </div>
        <div class="col-12 col-md-6">
            <label for="frase-pt">Frase</label>
            <input type="text" class="form-control" name="frase-<?php echo $sku; ?>" placeholder="" value="<?php echo $frase; ?>">
        </div>
    </div>
    <div class="form-group form-row">
        <div class="col-12 col-md-6">
            <label for="link">Link</label>
            <div class="input-group">
                <input type="text" class="form-control" name="link-<?php echo $sku; ?>" placeholder="" value="<?php echo $link; ?>">
                <div class="input-group-append">
                    <span class="input-group-text ajuda" id="basic-addon2" data-toggle="tooltip" data-placement="left" title="URL de destino do banner"><i class="ni ni-air-baloon ajuda" ></i></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <label for="link">Texto botão</label>
            <div class="input-group">
                <input type="text" class="form-control" name="botao-<?php echo $sku; ?>" placeholder="" value="<?php echo $botao; ?>">
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
            <p><strong class="text-orange">Imagem desktop</strong><br><span>Upload (Gif/Jpg/Png) formato: 1980 x 780</span></p>
            <div class="box">
                <div class="js--image-preview" <?php if($desktop != ""){ ?> style="background-image: url('../uploads/banners/<?php  echo $desktop; ?>');" <?php } ?>></div>
                <div class="upload-options">
                    <label>
                        <input type="file" class="image-upload"  name="files[]" id="files1-<?php echo $sku; ?>" accept="image/*" value="uploads/banners/<?php echo $desktop; ?>" />
                    </label>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <p><strong class="text-orange">Imagem tablet</strong><br><span>Upload (Gif/Jpg/Png) formato: 900 x 355</span></p>
            <div class="box">
                <div class="js--image-preview" <?php if($tablet != ""){ ?> style="background-image: url('../uploads/banners/<?php  echo $tablet; ?>');" <?php } ?>></div>
                <div class="upload-options">
                <label>
                    <input type="file" class="image-upload"  name="files[]" id="files2-<?php echo $sku; ?>" accept="image/*" value="uploads/banners/<?php echo $tablet; ?>"/>
                </label>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <p><strong class="text-orange">Imagem mobile</strong><br><span>Upload (Gif/Jpg/Png) formato: 500 x 350</span></p>
            <div class="box">
                <div class="js--image-preview" <?php if($mobile != ""){ ?> style="background-image: url('../uploads/banners/<?php  echo $mobile; ?>');" <?php } ?>></div>
                <div class="upload-options">
                    <label>
                        <input type="file" class="image-upload"  name="files[]" id="files3-<?php echo $sku; ?>" accept="image/*" value="uploads/banners/<?php echo $$mobile; ?>"/>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>