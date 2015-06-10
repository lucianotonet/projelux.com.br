
			<div class="container-fluid page-header" style="background-image:url('images/header-services.jpg')">
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
								<li class="active">Plotagens</li>
							</ol>
						</div>
					</div>	
				</div> <!-- /container -->
			</div>
		
			<div class="container text-center">
				<div class="btn-group filters" id="">
					<a href="?page=servicos" class="btn btn-link <?php echo ( !isset($_GET['cat_id']) ) ? 'selected' : '' ?>">Todos os Serviços</a >
					<?php
						$sql_c = "SELECT * FROM categorias_ser";
						$res_c = mysqli_query($mysqli, $sql_c);
						while ($row_c = mysqli_fetch_array($res_c, MYSQLI_ASSOC)){
					?>
						<a href="?page=servicos&cat_id=<?= $row_c['cat_id'] ?>" class="btn btn-link <?php echo ( @$_GET['cat_id'] == $row_c['cat_id'] ) ? 'selected' : '' ?>"><?= $row_c["cat_nome"] ?></a >
					<?php
						}
					?>
				</div>		
			</div>
				
			<div class="container">

				<div id="content" class="isotope row" style="position: relative; overflow: hidden; height: 1440px;">	

					<?php
					    $num_pag=4;

					    if(isset($_GET["pagina"])){ 
							$pagina = $_GET["pagina"];
						} else {
							$pagina = 1;	
						}
					    $pri_reg = ($pagina-1)*($num_pag);

						$sql_st = "SELECT * FROM servicos, fotos_servicos, categorias_ser
								  WHERE ftp_ser_id=ser_id 
								  AND ftp_destaque='SIM' 
								  AND cat_id=ser_cat_id";
								  if ( isset( $_GET['cat_id'] ) && !empty($_GET['cat_id']) ){
								  	$sql_st .= " AND cat_id=".$_GET['cat_id']."";
								  } 
						$sql_st .= " ORDER BY ser_nome DESC"; 
						$pes_tot = mysqli_query($mysqli, $sql_st);
					    $tot_reg = mysqli_num_rows($pes_tot);
					    $tot_pag = ceil($tot_reg/$num_pag);

					    $contQtd=0;

					    $pg_atual = "?page=servicos&pagina=";
					    
					    $painel = null;

					    for($x=1; $x <= $tot_pag; $x++){
					        if($x==$pagina){ $painel .= "<li class='active'><span class='selecionado'>  $x  </span></li>";}
					        else{ $painel .= "<li><a href=\"$pg_atual"."$x\" onclick=\"return mudarPagina('$pg_atual"."pagina=".$x."')\">  $x  </a></li>";}
					    }

						$sql_s = "SELECT * FROM servicos, fotos_servicos, categorias_ser
								  WHERE ftp_ser_id=ser_id 
								  AND ftp_destaque='SIM' 
								  AND cat_id=ser_cat_id";
								  if ( isset( $_GET['cat_id'] ) && !empty($_GET['cat_id']) ){
								  	$sql_s .= " AND cat_id=".$_GET['cat_id']."";
								  } 
						$sql_s .= " ORDER BY ser_nome DESC LIMIT ".$pri_reg.", ".$num_pag; 
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

			<div class="container text-center">
				<nav>
					<ul class="pagination">				        
					    <?php
					        echo $painel;
					    ?>
				    </ul> 
				</nav>				
			</div>
