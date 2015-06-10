
			<div class="container-fluid page-header" style="background-image:url('images/header-about.jpg')">
				<div class="container">			
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h2 class="pull-left">
								<small class="text-primary">Sobre a Projelux</small>
								<br>
								Conheça nossa empresa
							</h2>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right hidden-xs">
							<ol class="breadcrumb">
								<li><a href="?page=home">Home</a></li>						
								<li class="active">Sobre a Projelux</li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
			<?php
			$classe='active';
			$sql_s = "SELECT * FROM textos
					  WHERE tex_nome='Empresa'"; 
			$res_s = mysqli_query($mysqli, $sql_s);
			$row_s = mysqli_fetch_array($res_s, MYSQLI_ASSOC);
			?>
			<div class="container">
				<div id="about-slider" class="carousel slide" data-ride="carousel">				   
				    <div class="carousel-inner">
						<?php
						$sql_ft = "SELECT * FROM fotos_textos
								  WHERE ftp_tex_id=".$row_s["tex_id"];  
						$res_ft = mysqli_query($mysqli, $sql_ft);
						while ($row_ft = mysqli_fetch_array($res_ft, MYSQLI_ASSOC)){
						?>
				        <div class="item <?= $classe ?>">
				            <img src="img/textos/<?= $row_ft["ftp_imagem"] ?>" alt="First slide" class="img-responsive">		      
				        </div>
				        <?PHP
				        $classe='';
				        }
				        ?>
				    </div>
				    <a class="left carousel-control" href="#about-slider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				    <a class="right carousel-control" href="#about-slider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>			

			<div class="container section">
				<?= $row_s["tex_texto"] ?>				
			</div>			
