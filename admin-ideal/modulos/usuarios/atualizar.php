
<ul class="nav nav-pills">
    <table class="table align-items-center table-flush">
         <tbody class="list" id="sortable">

        <?php
            include "../../config/conn.php";
            $a = 1;
            $sql = "SELECT * FROM ideal_usuario where status = '1'"; 
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
