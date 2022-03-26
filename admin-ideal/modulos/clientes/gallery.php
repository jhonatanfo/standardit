 <ul class="nav nav-pills">
<table class="table align-items-center table-flush">
     <tbody class="list" id="sortable">

        <?php
            include "../../config/conn.php";
            $a = 1;
            $sql = "SELECT * FROM ideal_clientes where status = 1"; 
            $query = mysqli_query($conn, $sql); 
            while($sql = mysqli_fetch_array($query)){ 
            $img_name = $sql["img_name"]; 
            $id = $sql['id'];
            $descricao = $sql['descricao'];
            $nome = $sql['nome'];
            $link = $sql['link'];
        ?>	

          <tr rel="<?php echo $id; ?>">
            <th scope="row">
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3" style="background: #cdcdcd url(../uploads/clientes/<?php echo $img_name; ?>) no-repeat center / contain; "></a>
                <div class="media-body">
                  <input type="text" class="campo-clientes" rel="nome" placeholder="<?php if($nome == ""){ echo "Nome do ciente"; }else{ echo $nome;  } ?>" disabled>
                </div>
              </div>
            </th>
            <th style="padding-left: 0;">  
               <input type="text" class="campo-clientes" rel="descricao" placeholder="<?php if($descricao == ""){ echo "Descrição da imagem"; }else{ echo $descricao;  } ?>" disabled>
            </th>
            <th style="padding-left: 0;">  
               <input type="text" class="campo-clientes"  rel="link" placeholder="<?php if($link == ""){ echo "www"; }else{ echo $link;  } ?>" disabled>
            </th>
            <td class="text-right" >
                <a><button type="button" class="btn btn-outline-info ico btn-salvar-descricao"><i class="ni ni-settings-gear-65"></i></button></a>
                <a><button type="button" class="btn btn-outline-danger ico deletar"><i class="ni ni-fat-remove"></i></button></a>
            </th>
          </tr>

        <?php $a++; } ?>
        </tbody>
        </table>
    </ul>
 <script>
		$(document).ready(function(){
			
            $(document).on('focusout','.campo-clientes', function() {
                
                var campo = $(this).attr('rel');
                var descricao = $(this).val();                
                
                var idpost = $(this).parent().parent().attr("rel");
                if(idpost == undefined){
                   var idpost = $(this).parent().parent().parent().parent().attr("rel");
                }
				$.ajax({
				  url:'modulos/clientes/atualiza_clientes.php',
				  type:'POST',
				   data: {
					  id: idpost,
					  campo: campo,
                      descricao: descricao,
				   },
				  success: function (retorno) {
					  $("[rel=" + campo + "]").attr("disabled","disabled");
				  }
				 }); 
            });  
			
            $(".deletar").on("click",function(){
				var idpost = $(this).parent().parent().parent().attr("rel");
				excluir_imagem(idpost);
				gallery();

			});
            
			$(".btn-salvar-descricao").on("click",function(){
				$(this).parent().parent().parent().find('.campo-clientes').removeAttr("disabled");
			});
			
			function gallery() {
			 $.ajax({
			  url:'modulos/clientes/gallery.php',
			  method:'POST',
			  success: function (retorno) {
			   $(".gallery").html(retorno);
			  }
			 }); 
			}
			

			function excluir_imagem(idpost) {
				if(confirm("Deseja deletar a imagem?")){
				 $.ajax({
				  url:'modulos/clientes/excluir_clientes.php',
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
		});
	 </script>