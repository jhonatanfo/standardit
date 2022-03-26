<div class="backdrop"></div>

<div class="modal-video">
	<div class="bg-ripple">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
	<a class="fechar"></a>
	<div class="incluir-video"></div>
</div>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-2">
				<ul>
					<li><h4>A Standard</h4></li>
					<li><a href="<?= URL; ?>">Home</a></li>
					<li><a href="<?= URL; ?>nos">A Standard</a></li>
					<li><a href="<?= URL; ?>contato">Fale conosco</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-4">
				<ul class="menu-nossas">
					<li><h4 >Nossas Soluções</h4></li>
					<li><a href="<?= URL; ?>rpa-fiscal">RPA Fiscal</a></li>
					<li><a href="<?= URL; ?>solucao-fiscal">Solução Fiscal</a></li>
					<li><a href="<?= URL; ?>rpa-bob">RPA</a></li>
					<li><a href="<?= URL; ?>mytask">Gestão de atividades Humanas e Robóticas</a></li>
				</ul>
				<ul class="menu-nossas">
					<li><h4>&nbsp;</h4></li>
					<li><a href="<?= URL; ?>erp-sap">ERP SAP</a></li>
					<li><a href="<?= URL; ?>solucao-comercio-externo">Solução de Comércio Externo</a></li>
					<li><a href="<?= URL; ?>suporte-ams">Suporte AMS</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<ul>
					<li><h4>Onde estamos </h4></li>
					<p>Av. Queiroz Filho, 1700, Vila B Escritório 30, Vila Leopoldina - São Paulo - SP<br>contato@standardit.com.br<br>PABX Central (11) 3280-2600</p>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<ul class="social">
					<h3>Encontre-nos em:</h3>

					<?php for($index = 0;$index < $totalredes;$index++){ ?>
						<li><a href="<?php echo $redes[$index]["link"]; ?>" target="_blank" class="<?php echo $redes[$index]["icone"]; ?>"></a></li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<ul class="regioes">
					<li><a class="active">São Paulo - SP </a></li>
					<li><a>Pinhais - PR </a></li>
					<li><a>Sapucaia do Sul - RS</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
	
<section class="copy text-center">
	<!-- a href="http://www.idealiz.com.br" target="_blank" class="idealiz"></a -->
	<p>Todos os direitos reservados a standardit ® 2022 By <a href="http://www.idealiz.com.br" target="_blank">Idealiz</a></p>
</section>