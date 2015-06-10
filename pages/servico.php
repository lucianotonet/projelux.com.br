			<?php
			$sql_sd = "SELECT * FROM servicos, categorias_ser
					   WHERE ser_id=".$_GET["id"]." 
					   AND ser_cat_id=cat_id";
			$res_sd =  mysqli_query($mysqli, $sql_sd);
			$row_sd = mysqli_fetch_array($res_sd, MYSQLI_ASSOC);
			?>

			<div class="container-fluid page-header" style="background-image:url('images/header-projects.jpg')">
				<div class="container">			
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h2 class="pull-left">
								<small class="text-primary">Plotagens, Cópias e Digitalizações</small>
								<br>
								Conheça nossos serviços
							</h2>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right hidden-xs">
							<ol class="breadcrumb">
								<li><a href="?page=home">Home</a></li>						
								<li><a href="?page=servicos">Plotagens</a></li>	
								<li class="active"><?= $row_sd["ser_nome"] ?></li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
		
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div id="service_slider" class="carousel slide" data-ride="carousel">
						    <!-- Indicators -->
						    <ol class="carousel-indicators">
						    	<?php
						    	$classe='active';
								$sql_fs = "SELECT * FROM fotos_servicos
										   WHERE ftp_ser_id=".$_GET["id"]." 
										   ORDER BY ftp_destaque DESC";
								$res_fs =  mysqli_query($mysqli, $sql_fs);
						    	$tot_reg = mysqli_num_rows($res_fs);
						    	for ($x = 0; $x < $tot_reg; $x++) {
 						    	?>
							    <li data-target="#service_slider" data-slide-to="<?= $x ?>" class="<?= $classe ?>"></li>
							    <?php
							    $classe='';
								}
								?>		    
							</ol>

						    <!-- Wrapper for slides -->
						    <div class="carousel-inner" role="listbox">
						    	<?php
						    	$classe='active';
						    	while ($row_fs = mysqli_fetch_array($res_fs, MYSQLI_ASSOC)){
						    	?>
						        <div class="item <?= $classe ?>">
						            <img src="img/servicos/<?= $row_fs["ftp_imagem"] ?>" class="img-responsive" alt="">
						        </div>
							    <?php
							    $classe='';
								}
								?>		    
						    </div>

						    <!-- Controls -->
						    <a class="left carousel-control" href="#service_slider" role="button" data-slide="prev">
						        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						        <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#service_slider" role="button" data-slide="next">
						        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						        <span class="sr-only">Next</span>
						    </a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="project-details">
							<h1><?= $row_sd["ser_nome"] ?></h1>
							<?= $row_sd["ser_texto"] ?>

							<hr align="left">

							<div class="details">
								<p><i class="fa fa-plus"></i> Serviço: <?= $row_sd["ser_nome"] ?></p>
								<p><i class="fa fa-plus"></i> Categoria: <?= $row_sd["cat_nome"] ?></p>
							</div>
							
							<br>

							<p>
								<a href="javascript: window.history.back()" class="btn btn-lg btn-primary"> Voltar </a>								
							</p>

						</div>
					</div>
				</div>
			</div>

			<br />
			<br />
			<br /]>		

