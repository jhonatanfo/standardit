<?php
session_cache_expire(10);
session_start();
if(!empty($_SESSION['id'])){
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}

$tokenUsuario = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
if($_SESSION['donoDaSessao'] != $tokenUsuario){
    header("Location: login.php");
}

include_once("dashboard-config.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Idealiz | Painel Administrativo">
  <meta name="author" content="Creative Tim">
  <title>Idealiz | Painel Administrativo | Dashboard</title>

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
            
         <div class="row"> 
            <div class="col-12">
                <div class="nav btn-group btn-group-toggle" id="filtro-dashboard">
                    <a class="btn-filtro-periodo btn btn-secondary active" rel="ano">Ano</a>
                    <a class="btn-filtro-periodo btn btn-secondary" rel="mes">Mês</a>
                    <a class="btn-filtro-periodo btn btn-secondary" rel="dia">Dia</a>
                </div>
            </div>
        </div>

            
          <!-- Card stats -->
          <div class="row">
            <div class="col-6 col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                      <h5 class="card-title text-uppercase  mb-0">Total de acessos</h5>
                      <span class="h2 font-weight-bold  mb-0 Count" id="total-acessos"><?php echo frequenciaAcessos("ano"); ?></span>
                      <h6><i class="ni ni-calendar-grid-58"></i> no último <span class="periodo">ano</span></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chat-round"></i>
                      </div>
                      <h5 class="card-title text-uppercase  mb-0">Total de mensagens</h5>
                      <span class="h2 font-weight-bold mb-0 Count1" id="total-contatos"><?php echo frequenciaContatos("ano"); ?></span>
                      <h6><i class="ni ni-calendar-grid-58"></i> no último <span class="periodo">ano</span></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                      <h5 class="card-title text-uppercase  mb-0">Páginas/Blocos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $totalpublicacoes ?></span>
                      <h6><i class="ni ni-ruler-pencil"></i>  total publicado</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                      <h5 class="card-title text-uppercase mb-0">Otimização</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo round(porcentagem_xn($totalOtimizacao, $totalPaginas)); ?>%</span>
                      <h6><i class="ni ni-spaceship"></i> SEO</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
		<div class="col-xl-6">
          <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 text-blac mb-0">Acessos mensais</h5>
                </div>
              </div>
            </div>
          <div class="card acessos-mensais">
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
		  
		<div class="col-xl-6">
          <!--* Card header *-->
          <!--* Card body *-->
          <!--* Card init *-->
          <div class="card campanhas">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Campanha Ads <span>- Performace</span></h5>
            </div>
            <!-- Card body -->
            <div class="card-body row">
              
                <div class="col-xl-7">
                    <div class="chart">
                        <canvas id="chart-pie" class="chart-canvas"></canvas>
                    </div>
                </div>
                <div class="col-xl-5">
                    <ul class="legenda">
                        <li><span style="background: #f5365c;"></span> <?php echo $midia1; ?> <?php echo $numero1; ?> </li>
                        <li><span style="background: #fb6340;"></span> <?php echo $midia2; ?> <?php echo $numero2; ?> </li>
                        <li><span style="background: #2dce89;"></span> <?php echo $midia3; ?> <?php echo $numero3; ?> </li>
                        <li><span style="background: #5e72e4;"></span> <?php echo $midia4; ?> <?php echo $numero4; ?> </li>
                        <li><span style="background: #11cdef;"></span> <?php echo $midia5; ?> <?php echo $numero5; ?> </li>
                    </ul>
                </div>
                <h6><i class="ni ni-calendar-grid-58"></i> Referência: Março de 2021</h6>
            </div>
          </div>
        </div>
 		
        <div class="col-xl-12">
          <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tráfego Social</h3>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-12">
          <div class="card trafego-social">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead>
                  <tr>
                    <th scope="col" class="border-0" style="width: 40%;">Canal</th>
                    <th scope="col" class="border-0" style="width: 20%;">Visitas</th>
                    <th scope="col" class="border-0" style="width: 40%;">%</th>
                  </tr>
                </thead>
                <tbody>
					
					<?php
						// Grafico origem
                        $totalorigem = frequenciaAcessos("ano");
						$a = 1;
						$sql = "SELECT COUNT(*) AS NrVezes, origem FROM ideal_acessos GROUP BY origem ORDER BY NrVezes DESC LIMIT  5"; 
						$query = mysqli_query($conn, $sql); 
						while($sql = mysqli_fetch_array($query)){ 
                            
					?>				
					  <tr>
						<th scope="row"><?php echo $sql["origem"]; ?></th>
						<td><?php echo $sql["NrVezes"]; ?></td>
						<td>
						  <div class="d-flex align-items-center">
							<span class="mr-2"><?php echo round(porcentagem_xn($sql["NrVezes"], $totalorigem)); ?>%</span>
							<div>
							  <div class="progress">
								<div class="progress-bar <?php if($a == 1){ echo "bg-gradient-danger"; } else if($a == 2){ echo "bg-gradient-success"; } else if($a == 3){ echo "bg-gradient-primary"; } else if($a == 4){ echo "bg-gradient-info"; } else if($a == 5){ echo "bg-gradient-warning"; } ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(porcentagem_xn($sql["NrVezes"], $totalorigem)); ?>%;"></div>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					<?php $a++; } ?>

					
                </tbody>
              </table>
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
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/action.js"></script>
  <script type="text/javascript">
		var midia1 = "<?php echo $midia1; ?>";
		var midia2 = "<?php echo $midia2; ?>";
		var midia3 = "<?php echo $midia3; ?>";
		var midia4 = "<?php echo $midia4; ?>";
		var midia5 = "<?php echo $midia5; ?>";
		var numero1 = "<?php echo $numero1; ?>";
		var numero2 = "<?php echo $numero2; ?>";
		var numero3 = "<?php echo $numero3; ?>";
		var numero4 = "<?php echo $numero4; ?>";
		var numero5 = "<?php echo $numero5; ?>";
      
        var quantidade1 = "<?php echo $quantidade1; ?>";
		var quantidade2 = "<?php echo $quantidade2; ?>";
		var quantidade3 = "<?php echo $quantidade3; ?>";
        var quantidade4 = "<?php echo $quantidade4; ?>";
		var quantidade5 = "<?php echo $quantidade5; ?>";
        var quantidade6 = "<?php echo $quantidade6; ?>";
      
        var mes1 = "<?php echo $mes1; ?>";
		var mes2 = "<?php echo $mes2; ?>";
		var mes3 = "<?php echo $mes3; ?>";
        var mes4 = "<?php echo $mes4; ?>";
		var mes5 = "<?php echo $mes5; ?>";
        var mes6 = "<?php echo $mes6; ?>";
  </script>
  <script src="assets/js/argon2.min.js"></script>	
    
    
<script>

$(document).ready(function(){   
    $('.btn-filtro-periodo ').on("click", function(){
        var periodo = $(this).attr('rel');
        
        
        $(".btn-filtro-periodo").removeClass('active');
        $(this).addClass('active');
            $.ajax({
            url: 'dashboard-config.php',
            type: 'post',
            data: { "frequenciaAcessos": periodo},
            success: function(response) { $("#total-acessos").html(response);  animationNumber(); }
        });
            $.ajax({
            url: 'dashboard-config.php',
            type: 'post',
            data: { "frequenciaContatos": periodo},
            success: function(response) { $("#total-contatos").html(response);  animationNumber1(); }
        });
        
        if(periodo == "ano"){
            $('.periodo').html("Ano");
        }
        else if(periodo == "mes"){
            $('.periodo').html("Mês");
        }
        else if(periodo == "dia"){
            $('.periodo').html("dia");
        }
        
       
    });
    function animationNumber(){
        $('.Count').each(function () {
          var $this = $(this);
          jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
          });
        });
    }
    function animationNumber1(){
        $('.Count1').each(function () {
          var $this = $(this);
          jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
          });
        });
    }
    animationNumber();
    animationNumber1();
}); 
</script>	    
</body>

</html>