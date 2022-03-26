<?php
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
include_once("configuracoes-config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Configurações</title>

  <link rel="icon" type="image/png" sizes="16x16" href="https://idealiz.com.br/favicon-16x16.png">
  <link rel="stylesheet" href="assets/css/style-ideal.css" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
<?php include_once("include/script.php"); ?>
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
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Links Sociais</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
				<form id="form-redes">
				  <div class="form-group">
					<label for="exampleFormControlInput1">Instagram</label>
					<input type="email" class="form-control" id="instagram" placeholder="URL Instagram" value="<?php echo $instagram;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Facebook</label>
					<input type="email" class="form-control" id="facebook" placeholder="URL Facebook" value="<?php echo $facebook;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Twitter</label>
					<input type="email" class="form-control" id="twitter" placeholder="URL Twitter" value="<?php echo $twitter;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Linkedin</label>
					<input type="email" class="form-control" id="linkedin" placeholder="URL Linkedin" value="<?php echo $linkedin;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Youtube</label>
					<input type="email" class="form-control" id="youtube" placeholder="URL Linkedin" value="<?php echo $youtube;  ?>">
				  </div>
				  <button class="btn btn-icon btn-success" type="button" id="salvar-redes">
					<span class="btn-inner--text">Salvar</span>
					<span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
				  </button>
				  <div class="form-group">
					  <div class="alert" role="alert"></div>
				  </div>
					
					
				</form>
			</div>

			  
          </div>
        </div>
		  
		<div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Dados de contato</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
				<form id="form-dados">
				  <div class="form-group">
					<label for="exampleFormControlInput1">Telefone</label>
					<input type="email" class="form-control" id="telefone" placeholder="Informe o Telefone" value="<?php echo $telefone;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">WhatsApp</label>
					<input type="email" class="form-control" id="whatsapp" placeholder="O numero de WhatsApp" value="<?php echo $whatsapp;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">E-mail</label>
					<input type="email" class="form-control" id="email" placeholder="E-mail de contato" value="<?php echo $email;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Endereço</label>
					<input type="email" class="form-control" id="endereco" placeholder="Endereço completo" value="<?php echo $endereco;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Geo localização</label>
					<input type="email" class="form-control" id="geo" placeholder="Geo do Google Maps" value="<?php echo $geo;  ?>">
				  </div>
				  <button class="btn btn-icon btn-success" type="button" id="salvar-dados">
					<span class="btn-inner--text">Salvar</span>
					<span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
				  </button>
				  <div class="form-group">
					  <div class="alert" role="alert"></div>
				  </div>
				</form>
			</div>

			  
          </div>
        </div>
		  
		<div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Dados de SMTP</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
				<form id="form-smtp">
				  <div class="form-group">
					<label for="exampleFormControlInput1">Host</label>
					<input type="email" class="form-control" name="host" placeholder="Exemplo: smtp.gmail.com"  value="<?php echo $host;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Port</label>
					<input type="email" class="form-control" name="port" placeholder="Exemplo: 465"  value="<?php echo $port;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Username</label>
					<input type="email" class="form-control" name="username" placeholder="Exemplo: contato@dominio.com.br"  value="<?php echo $username;  ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlInput1">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Senha do e-mail"  value="<?php echo $password;  ?>">
				  </div>
				  <div class="form-group">
                    <label for="status">SMTPAuth</label>
                      
                    <label class="custom-toggle">
						<input type="checkbox" name="smtpauth" <?php if($smtpauth == "true"){ echo "checked";} else if($smtpauth == "false"){ echo "";} else{ echo "checked";} ?> >
						<span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
				    </label>
                      
                      
				  </div>
				   <div class="form-group">
					<label for="exampleFormControlInput1">SMTP Secure</label>
					<input type="email" class="form-control" name="smtpsecure" placeholder="Exemplo: tls/ssl"  value="<?php echo $smtpsecure;  ?>">
				  </div>
                  <div class="form-group">
					<label for="exampleFormControlInput1">Remetente</label>
					<input type="email" class="form-control" name="remetente" placeholder="E-mail para recebimento"  value="<?php echo $remetente;  ?>">
				  </div>
				  <button class="btn btn-icon btn-success" id="salvar-smtp" type="button">
					<span class="btn-inner--text">Salvar</span>
					<span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                  </button>

                  <div class="form-group">
                     <div class="alert" role="alert"></div>
                  </div>
				</form>
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
    
    $('#salvar-smtp').click(function(){
			
    var form_data = new FormData(document.getElementById("form-smtp"));	

    $.ajax({
        url: 'modulos/smtp/atualizar.php',
        type: 'post',
        data: form_data,
        //dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
                $('#salvar-smtp').attr("disabled","disabled");
                $('#salvar-smtp').css("opacity",".5");
        },
        success: function(retorno){	 
            var str = retorno;
            if(str.match(/Erro/)){
                $("#form-smtp .alert").addClass("alert-danger");
            }
            else{
                $("#form-smtp .alert").addClass("alert-success");
            }
            $("#form-smtp .alert").slideDown();
            $("#form-smtp .alert").html(retorno);
            
            setTimeout(function () {
                $("#form-smtp .alert").slideUp();
                $('#salvar-smtp').removeAttr("disabled");
                $('#salvar-smtp').css("opacity","1");    
                $("#form-smtp .alert").removeClass("alert-danger");
                $("#form-smtp .alert").removeClass("alert-success");
           }, 3000);
        }

    });
});

 $("#salvar-redes").click(function() {
  var instagram = $("#instagram");
  var instagramPost = instagram.val(); 
  var facebook = $("#facebook");
  var facebookPost = facebook.val(); 
  var twitter = $("#twitter");
  var twitterPost = twitter.val(); 
  var linkedin = $("#linkedin");
  var linkedinPost = linkedin.val(); 
  var youtube = $("#youtube");
  var youtubePost = youtube.val(); 
  
  $.ajax({
   url:'modulos/redes/atualizar.php',
   type:'POST',
   data: {
   instagram: instagramPost,
   facebook: facebookPost,
   twitter: twitterPost,
   linkedin: linkedinPost,
   youtube: youtubePost
   },
   success: function(retorno) {  
	   var str = retorno;
	   if(str.match(/Erro/)){
		    $("#form-redes .alert").addClass("alert-danger");
		}
		else{
			$("#form-redes .alert").addClass("alert-success");
		}
	    $("#form-redes .alert").slideDown();
		$("#form-redes .alert").html(retorno);
		setTimeout(function () {$("#form-redes .alert").slideUp()}, 3000);
   }   
  });
  return false;
 });

	
	
$("#salvar-dados").click(function() {
  var telefone = $("#telefone");
  var telefonePost = telefone.val(); 
  var whatsapp = $("#whatsapp");
  var whatsappPost = whatsapp.val(); 
  var email = $("#email");
  var emailPost = email.val(); 
  var endereco = $("#endereco");
  var enderecoPost = endereco.val(); 
  var geo = $("#geo");
  var geoPost = geo.val(); 
  
  $.ajax({
   url:'modulos/dados/atualizar.php',
   type:'POST',
   data: {
   telefone: telefonePost,
   whatsapp: whatsappPost,
   email: emailPost,
   endereco: enderecoPost,
   geo: geoPost
   },
   success: function(retorno) {  
	   var str = retorno;
	   if(str.match(/Erro/)){
		    $("#form-dados .alert").addClass("alert-danger");
		}
		else{
			$("#form-dados .alert").addClass("alert-success");
		}
	    $("#form-dados .alert").slideDown();
		$("#form-dados .alert").html(retorno);
		setTimeout(function () {$("#form-dados .alert").slideUp()}, 3000);
   }   
  });
  return false;
 });
});
</script>
	
</body>

</html>