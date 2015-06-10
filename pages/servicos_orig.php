
			<div class="container-fluid page-header" style="background-image:url('images/header-services.jpg')">
				<div class="container">			
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h2 class="pull-left">
								<small class="text-primary">Serviços</small>
								<br>
								Conheça nossos serviços
							</h2>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right hidden-xs">
							<ol class="breadcrumb">
								<li><a href="?page=home">Home</a></li>						
								<li class="active">Serviços</li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
		
			<div class="container text-center">
				<div class="btn-group" id="filter">
					<a href="" data-filter="*" class="btn btn-link selected">Todos os Serviços</a >
					<?php
					$sql_c = "SELECT * FROM categorias_ser";
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
					$sql_s = "SELECT * FROM servicos, fotos_servicos, categorias_ser
							  WHERE ftp_ser_id=ser_id 
							  AND ftp_destaque='SIM' 
							  AND cat_id=ser_cat_id 
							  ORDER BY ser_id DESC"; 
					$res_s = mysqli_query($mysqli, $sql_s);
					while ($row_s = mysqli_fetch_array($res_s, MYSQLI_ASSOC)){
					?>
					<div class="service cat<?= $row_s["cat_id"] ?> isotope-item col-sm-6">
						<div class="boxcontainer">
							<a href="?page=servico&id=<?= $row_s["ser_id"] ?>">
								<img src="img/servicos/<?= $row_s["ftp_imagem"] ?>" class="img-responsive" alt="">			
							</a>
							<h3><a href="?page=servico&id=<?= $row_s["ser_id"] ?>"><?= $row_s["ser_nome"] ?></a></h3>
							<?= $row_s["ser_info"] ?>
						</div>
					</div>
					<?php
					}
					?>
							
				</div>

			</div>	
