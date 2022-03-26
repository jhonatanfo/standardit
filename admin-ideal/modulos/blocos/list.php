<?php 
    include "../../config/conn.php";
    $id  = filter_input(INPUT_POST, 'id');
    $sql = "SELECT ideal_blocos.titulo, ideal_blocos.id_bloco, ideal_blocos.status, ideal_blocos_categoria.id_categoria
    FROM ideal_blocos 
    LEFT JOIN ideal_blocos_categoria ON ideal_blocos.id_categoria = ideal_blocos_categoria.id_categoria WHERE ideal_blocos_categoria.id_pagina = $id"; 
    $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
    $id_bloco = $sql["id_bloco"]; 
    $titulo = $sql["titulo"];
    $status = $sql["status"];
    $idcategoria = $sql["id_categoria"];
?>	



<tr class="" id="<?= $id_bloco ?>">
    <td class="budget"><?php  echo substr($titulo, 0, 50);echo "..."; ?></td>
    <td class="budget">
        <a class="btn-atualizar-lista" id="<?php echo $idcategoria; ?>"><label class="custom-toggle checked-status status-bloco">
            <input type="checkbox" name="status" <?php if($status == 1){ echo "checked";} else if($status == 0){ echo "";} else{ echo "checked";} ?> >
            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
        </label></a>
    </td>
    <td class="budget text-right">
        <a href="blocos-editar?id=<?= $id_bloco ?>"><button class="btn btn2 btn-primary" type="button"><i class="ni ni-settings-gear-65"></i></button></a>
    </td>
</tr>

<?php } ?>