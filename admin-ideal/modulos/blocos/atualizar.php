<?php 
    include "../../config/conn.php";
    $idget  = filter_input(INPUT_POST, 'id');

    $sql = "SELECT * 
        FROM ideal_blocos_categoria
        WHERE id_pagina = $idget"; 
    $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
    $id_categoria = $sql["id_categoria"]; 
    $nome = $sql["nome"];
    $status = $sql["status"];
    $idcategoria = $sql["id_categoria"];
?>	



<tr class="" id="<?= $id_categoria ?>">
    <td class="budget"><a class="btn-atualizar-lista" id="<?php echo $idcategoria; ?>"><?= $nome ?></a></td>
    <td class="budget  text-right">
        <label class="d custom-toggle checked-status status-bloco" style="display: inline-block;">
            <input type="checkbox" name="status" <?php if($status == 1){ echo "checked";} else if($status == 0){ echo "";} else{ echo "checked";} ?> >
            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
        </label>
    </td>
    <!--td class="budget text-right"><button class="btn btn2 btn-primary" type="button" id="<?= $id_categoria ?>"><i class="ni ni-fat-add"></i></button></td -->
</tr>

<?php } ?>
