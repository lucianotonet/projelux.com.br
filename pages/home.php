
			<div id="slider" class="container-fluid">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol> -->
					<div class="carousel-inner" role="listbox">
						<?php
						$active='active';
						$sql_b = "SELECT * FROM banners"; 
						$res_b = mysqli_query($mysqli, $sql_b);
						while ($row_b = mysqli_fetch_array($res_b, MYSQLI_ASSOC)){
						?>
						<div class="item <?= $active ?>">
							<img src="img/banners/<?= $row_b["ban_imagem"] ?>" alt="<?= $row_b["ban_linha1"] ?>">							
			
			                <div class="carousel-caption">
			                    <h1><?= $row_b["ban_linha1"] ?></h1>				                    				                    
			                </div>				            
						</div>
						<?php
						$active='';
						}
						?>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

			<?php
			$sql_e = "SELECT * FROM textos WHERE tex_nome='Empresa'"; 
			$res_e = mysqli_query($mysqli, $sql_e);
			$row_e = mysqli_fetch_array($res_e, MYSQLI_ASSOC);
			?>
			<div class="container" role="main">
				<div class="jumbotron">
					<h2>Bem vindo à Projelux. <span class="text-primary">Projetando qualidade.</span>
						<a href="?page=sobre" class="btn btn-primary btn-lg pull-right">Sobre a Projelux</a>
					</h2>
					<?= $row_e["tex_destaque"] ?>					
				</div>
			</div> <!-- /container -->

	

			<div class="container about-section">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<?= $row_e["tex_home"] ?>

						<br>
						
						<ul class="list-icons">
							<li><a href="?page=sobre"><i class="icon-circle-right"></i>Conheça nossa empresa</a></li>
							<li><a href="?page=contato"><i class="icon-circle-right"></i>Entre em contato conosco</a></li>
						</ul>
					
					
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="thumbnail">
							<img src="images/projetos.jpg" >
							<div class="caption">
								<h4>Projetos Elétricos</h4>								
								<p>Projetos elétricos para prédios, redes urbanas e rurais, loteamentos e subestações industriais.</p>								
								<a href="?page=projetos" class="btn btn-primary btn-lg" role="button">Saiba mais</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="thumbnail">
							<img src="images/plotagem.jpg" >
							<div class="caption">
								<h4>Plotagens em grandes formatos.</h4>								
								<p>Plotagens em grandes formatos, com alta qualidade de impressão, além de cópias e digitalizações.</p>								
								<a href="?page=servicos" class="btn btn-primary btn-lg" role="button">Saiba mais</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid section-alternative">
				<div class="container">		
					<div class="row">
						<?php
						$sql_d = "SELECT * FROM dicas ORDER BY RAND() LIMIT 1"; 
						$res_d = mysqli_query($mysqli, $sql_d);
						$row_d = mysqli_fetch_array($res_d, MYSQLI_ASSOC);
						?>
						<img src="img/dicas/<?= $row_d["dic_imagem"] ?>" alt="" class="img-responsive full-xs col-md-6">
						<div class="col-md-6">	
							<div class="content-right">
								<h2>
									<small>Dicas Projelux</small>
									<br>
									<?= $row_d["dic_nome"] ?>
								</h2>			

								<br>

								<?= $row_d["dic_texto"] ?>
									<br>
								<p class="icone icone_1">
									<?= $row_d["dic_destaq"] ?>
								</p>
							</div>
						</div>
					</div>			
				</div>
			</div>


			<div class="container text-center">

				<h2>Projetos Recentes</h2>
				<p>Conheça alguns dos mais recentes projetos executados pela Projelux.</p>	

				<br>			

				<div class="row">
					<?php
					$sql_p = "SELECT * FROM projetos, fotos_projetos
							  WHERE ftp_pro_id=pro_id 
							  AND ftp_destaque='SIM' 
							  ORDER BY pro_data DESC LIMIT 3"; 
					$res_p = mysqli_query($mysqli, $sql_p);
					while ($row_p = mysqli_fetch_array($res_p, MYSQLI_ASSOC)){
					?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="recent-work">
							<a href="?page=projeto&id=<?= $row_p["pro_id"] ?>" class="">
								<div class="mask">  
								    <h4>
								    	<?= $row_p["pro_cliente"] ?>
								    	<br>
								    	<small><?= $row_p["pro_nome"] ?></small>
								    </h4>  								    
							    </div>  							
								<img src="img/projetos/<?= $row_p["ftp_imagem"] ?>" class="img-responsive" alt="">
							</a>
						</div>
					</div>
					<?php
					}
					?>
				</div>

			</div>

			<div class="container-fluid section-alternative" id="services">
				<div class="container">		
					<div class="row">
						<div class="col-md-6">	
							<div class="content-left">
								<h2>
								<!--	<small>Nossos Serviços</small>
									<br> -->
									Assessoria Técnica e elaboração de projetos.
								</h2>			

								<br>

								<p class="icone icone_2">A Projelux se consolidou como um importante polo de atendimento na Assessoria técnica, encaminhamentos e elaboração de projetos.</p>	
								<p class="icone icone_3">Projetos elétricos prediais, industriais e loteamentos.</p>					
								<p class="icone icone_4">Um dos maiores resultados na contratação da Projelux é a diminuição dos custos da obra, já que a empresa assessora os interessados na aquisição dos materiais.</p>	
												
							</div>
						</div>
						<!-- <div class=""> -->
							<img src="images/assessoria.jpg" alt="" class="img-responsive full-xs col-md-6">
						<!-- </div> -->
					</div>
				</div>
			</div>
