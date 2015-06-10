			<?php
			$sql_pd = "SELECT * FROM projetos, categorias_pro
					   WHERE pro_id=".$_GET["id"]." 
					   AND pro_cat_id=cat_id";
			$res_pd =  mysqli_query($mysqli, $sql_pd);
			$row_pd = mysqli_fetch_array($res_pd, MYSQLI_ASSOC);
			?>

			<div class="container-fluid page-header" style="background-image:url('images/header-projects.jpg')">
				<div class="container">			
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h2 class="pull-left">
								<small class="text-primary">Projetos</small>
								<br>
								Conheça nossos projetos
							</h2>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right hidden-xs">
							<ol class="breadcrumb">
								<li><a href="?page=home">Home</a></li>						
								<li><a href="?page=projetos">Projetos</a></li>	
								<li class="active"><?= $row_pd["pro_nome"] ?></li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
		
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div id="project_slider" class="carousel slide" data-ride="carousel">
						    <!-- Indicators -->
						    <ol class="carousel-indicators">
						    	<?php
						    	$classe='active';
								$sql_fp = "SELECT * FROM fotos_projetos
										   WHERE ftp_pro_id=".$_GET["id"]." 
										   ORDER BY ftp_destaque DESC";
								$res_fp =  mysqli_query($mysqli, $sql_fp);
						    	$tot_reg = mysqli_num_rows($res_fp);
						    	for ($x = 0; $x < $tot_reg; $x++) {
 						    	?>
							    <li data-target="#project_slider" data-slide-to="<?= $x ?>" class="<?= $classe ?>"></li>
							    <?php
							    $classe='';
								}
								?>		    
							</ol>

						    <!-- Wrapper for slides -->
						    <div class="carousel-inner" role="listbox">
						    	<?php
						    	$classe='active';
						    	while ($row_fp = mysqli_fetch_array($res_fp, MYSQLI_ASSOC)){
						    	?>
						        <div class="item <?= $classe ?>">
						            <img src="img/projetos/<?= $row_fp["ftp_imagem"] ?>" class="img-responsive" alt="">
						        </div>
							    <?php
							    $classe='';
								}
								?>		    
						    </div>

						    <!-- Controls -->
						    <a class="left carousel-control" href="#project_slider" role="button" data-slide="prev">
						        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						        <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#project_slider" role="button" data-slide="next">
						        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						        <span class="sr-only">Next</span>
						    </a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="project-details">
							<h1><?= $row_pd["pro_nome"] ?></h1>
							<?= $row_pd["pro_texto"] ?>

							<hr align="left">

							<div class="details">
								<p><i class="fa fa-plus"></i> Cliente: <?= $row_pd["pro_cliente"] ?></p>
								<p><i class="fa fa-plus"></i> Categoria: <?= $row_pd["cat_nome"] ?></p>
								<p><i class="fa fa-plus"></i> Data da Execução: <?= strftime( '%d/%b/%Y', strtotime($row_pd["pro_data"])) ?></p>
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
			<br />		
