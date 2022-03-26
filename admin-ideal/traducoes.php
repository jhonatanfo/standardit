<?php
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
include_once("traducoes-config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Traduções</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  
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
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Traduções</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
				<form id="form-traducao">
                
                    <div class="form-group form-row">  
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="chave"  placeholder="Chave" value="">
                            </div>
                        </div>

                        <?php 
                        $sql = "SELECT * FROM ideal_idioma WHERE status = '1'";
                        $query = mysqli_query($conn, $sql); 
                        while($sql = mysqli_fetch_array($query)){ 
                            $id_idioma = $sql["id_idioma"]; 
                            $nomeidioma = $sql["nome"]; 
                            $sku = $sql["idioma"]; 
                        ?>  




                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="traducao-<?php echo $sku; ?>"  placeholder="Tradução <?php echo $nomeidioma; ?>" value="">
                            </div>
                        </div>

                    <?php } ?> 

                    </div>    
                    
                    
                    
                    
				  <button class="btn btn-icon btn-success" type="button" id="salvar-traducao">
					<span class="btn-inner--text">Salvar</span>
					<span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
				  </button>
				  <div class="form-group">
					  <div class="alert" role="alert"></div>
				  </div>
				</form>
                
                
                <hr/>
                <div class="form-group form-row"> 
                    <div class="col-3">Chave</div>
                    <?php 
                        $sql = "SELECT * FROM ideal_idioma WHERE status = '1'"; 
                        $query = mysqli_query($conn, $sql); 
                        while($sql = mysqli_fetch_array($query)){ 
                            $nomeidioma = $sql["nome"]; 

                    ?> 
                    <div class="col-3"><?php echo $nomeidioma; ?></div>
                    <?php } ?>
                </div>
                <?php 
                    $sqlchave = "SELECT chave FROM ideal_traducoes GROUP BY chave"; 
                    $querychave = mysqli_query($conn, $sqlchave); 
                    while($sqlchave = mysqli_fetch_array($querychave)){ 
                        $chave = $sqlchave["chave"]; 
                ?>
                <form id="form-<?php echo $chave; ?>" class="forms-traducoes">
                    <div class="form-group form-row">
                        <button class="btn btn-icon btn-success btn-traducoes" id="<?php echo $chave; ?>" type="button">
                            <i class="ni ni-like-2"></i>
                        </button>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="chave"  placeholder="Chave" value="<?php echo $chave; ?>" disabled>
                            </div>
                        </div>

                        <?php 
                            $sql = "SELECT traducao, idioma, chave FROM ideal_traducoes where chave = '".$chave."'"; 
                            $query = mysqli_query($conn, $sql); 
                            while($sql = mysqli_fetch_array($query)){ 
                                $traducao = $sql["traducao"];
                                $idioma = $sql["idioma"];
                                $chave = $sql["chave"]; 
                         ?>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="traducao-<?php echo $idioma; ?>" value="<?php echo $traducao; ?>">
                            </div>
                        </div>
                        <?php } ?>
                     </div>
                </form>
                <?php } ?> 

			</div>
 
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
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
<script>	
$(document).ready(function() {
    
    $('#salvar-traducao').click(function(){
        
        var form_data = new FormData(document.getElementById("form-traducao"));	
        
        $.ajax({
            url: 'modulos/traducao/ajaxfile.php',
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
                    $("#form-traducao .alert").addClass("alert-danger");
                }
                else{
                    $("#form-traducao .alert").addClass("alert-success");
                }
                $("#form-traducao .alert").slideDown();
                $("#form-traducao .alert").html(retorno);
                $("input[name='url']").attr("disabled","disabled");
                setTimeout(function () {
                    $("#form .alert").slideUp();

                    $('#submit').removeAttr("disabled");
                    $('#submit').css("opacity","1");    
                    $("#form-traducao .alert").removeClass("alert-danger");
                    $("#form-traducao .alert").removeClass("alert-success");
               }, 3000);
            }
     });
    });
    
    $('.btn-traducoes').click(function(){
        
        var id = $(this).attr("id");
        var form_data = new FormData(document.getElementById("form-"+id));	
        form_data.append('chave', id);
        
        $.ajax({
            url: 'modulos/traducao/atualizar.php',
            type: 'post',
            data: form_data,
            //dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                    $('#'+id).attr("disabled","disabled");
                    $('#'+id).css("opacity",".5");
            },
            success: function(retorno){            
                setTimeout(function () {
                    $('#'+id).removeAttr("disabled");
                    $('#'+id).css("opacity","1");    
               }, 3000);
            }
     });
    });
});
</script>
	
</body>

</html>