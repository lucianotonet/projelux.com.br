
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
								<li class="active">Projetos</li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
		
			
			<div class="container text-center">
				<div class="btn-group" id="filter">
					<a href="" data-filter="*" class="btn btn-link selected">Todos os Projetos</a>
					<?php
					$sql_c = "SELECT * FROM categorias_pro";
					$res_c = mysqli_query($mysqli, $sql_c);
					while ($row_c = mysqli_fetch_array($res_c, MYSQLI_ASSOC)){
					?>
					<a href="" data-filter=".cat<?= $row_c["cat_id"] ?>" class="btn btn-link"><?= $row_c["cat_nome"] ?></a >
					<?php
					}
					?>
				</div>		
			</div>

			<div class="container">
				<div id="content" class="isotope row" style="position: relative; overflow: hidden; height: 1440px;">	
					<?php
					$sql_p = "SELECT * FROM projetos, fotos_projetos, categorias_pro
							  WHERE ftp_pro_id=pro_id 
							  AND ftp_destaque='SIM' 
							  AND cat_id=pro_cat_id 
							  ORDER BY pro_data DESC"; 
					$res_p = mysqli_query($mysqli, $sql_p);
					while ($row_p = mysqli_fetch_array($res_p, MYSQLI_ASSOC)){
					?>
					<div class="project cat<?= $row_p["cat_id"] ?> isotope-item col-sm-4">
						<div class="boxcontainer">
							<a href="?page=projeto&id=<?= $row_p["pro_id"] ?>">
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
					<?php
					}
					?>
							
					</div>
				</div>

			</div>	

			<div class="container text-center">
				<nav>
<!--				    <ul class="pagination">				        
				        <li class="active"><a href="#">1</a>
				        </li>
				        <li><a href="#">2</a>
				        </li>
				        <li><a href="#">3</a>
				        </li>
				        <li><a href="#">4</a>
				        </li>				        				        
				    </ul> -->
				</nav>				
			</div>
