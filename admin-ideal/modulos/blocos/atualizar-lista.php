<?php 
include "../../config/conn.php";
    $idget = $_POST['idget'];
    $idcategoria = $_POST['idcategoria'];

    $sql = "SELECT ideal_blocos.id_bloco, ideal_blocos.id_categoria, ideal_blocos.status, ideal_blocos_idioma.chamada, ideal_blocos_idioma.imagem
    FROM ideal_blocos 
    LEFT JOIN ideal_blocos_categoria ON ideal_blocos.id_categoria = ideal_blocos_categoria.id_categoria 
    LEFT JOIN ideal_blocos_idioma ON ideal_blocos_idioma.id_bloco = ideal_blocos.id_bloco 
    WHERE ideal_blocos_categoria.id_pagina = $idget and ideal_blocos_categoria.id_categoria  = $idcategoria GROUP BY ideal_blocos.id_bloco order by ordem"; 
    
    $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
    $id_bloco = $sql["id_bloco"]; 
    $status = $sql["status"];
    $chamada = $sql["chamada"];
    $chamada = unserialize($chamada); 
    $imagem =  $sql["imagem"];
?>	



<tr class="item_bloco" id="<?= $id_bloco; ?>">

    <td>
      <div class="media align-items-center">
        <a href="#" class="avatar rounded-circle mr-3" style="background: #666 url(../uploads/blocos/<?php if($imagem != ""){echo $imagem; } else { echo "sem-imagem.jpg"; } ?>) no-repeat top right / cover ; "></a>
        <div class="media-body">
          <span class="name mb-0 text-sm"><?php  echo $chamada[0]; ?> </span>
        </div>
      </div>

    </td>
    
    
    <td>
      <span class="badge badge-dot mr-4">
        <i class="bg-<?php if($status == 1){ echo "success"; } else{ echo "warning"; } ?>"></i>
        <span class="status"><?php if($status == 1){ echo "ativo"; } else{ echo "desativado"; } ?></span>
      </span>
    </td>
    <td class="budget text-right">
        <a href="blocos-editar?id=<?= $id_bloco ?>&pagina=<?= $idget; ?>" data-toggle="tooltip" data-placement="left" title="Editar bloco"><button class="btn btn-outline-info ico" type="button"><i class="ni ni-settings-gear-65"></i></button></a>
    </td>
</tr>

<?php } ?>