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
				<div class="btn-group filters" id="">
					<a href="?page=projetos" class="btn btn-link <?php echo ( !isset($_GET['cat_id']) ) ? 'selected' : '' ?>">Todos os Projetos</a>
					<?php
						$sql_c = "SELECT * FROM categorias_pro";
						$res_c = mysqli_query($mysqli, $sql_c);
						while ($row_c = mysqli_fetch_array($res_c, MYSQLI_ASSOC)){
					?>

						<a href="?page=projetos&cat_id=<?= $row_c['cat_id'] ?>" class="btn btn-link <?php echo ( @$_GET['cat_id'] == $row_c['cat_id'] ) ? 'selected' : '' ?>"><?= $row_c["cat_nome"] ?></a >

					<?php
						}
					?>
				</div>		
			</div>

			<div class="container">
				<div id="content" class="isotope row" style="position: relative; overflow: hidden; height: 1440px;">	

					<?php
					    $num_pag=9;

					    if(isset($_GET["pagina"])){ 
							$pagina = $_GET["pagina"];
						} else {
							$pagina = 1;	
						}
					    $pri_reg = ($pagina-1)*($num_pag);

						$sql_pt = "SELECT * FROM projetos, fotos_projetos, categorias_pro
					  			  WHERE ftp_pro_id=pro_id 
					  			  AND ftp_destaque='SIM'
								  AND cat_id=pro_cat_id";
								  if ( isset( $_GET['cat_id'] ) && !empty($_GET['cat_id']) ){
								  	$sql_pt .= " AND cat_id=".$_GET['cat_id']."";
								  }
						$sql_pt .= " ORDER BY pro_data DESC";
						$pes_tot = mysqli_query($mysqli, $sql_pt);
					    $tot_reg = mysqli_num_rows($pes_tot);
					    $tot_pag = ceil($tot_reg/$num_pag);

					    $contQtd=0;

					    $pg_atual = "?page=projetos&pagina=";
					    
					    $painel = null;

					    for($x=1; $x <= $tot_pag; $x++){
					        if($x==$pagina){ $painel .= "<li class='active'><span class='selecionado'>  $x  </span></li>";}
					        else{ $painel .= "<li><a href=\"$pg_atual"."$x\" onclick=\"return mudarPagina('$pg_atual"."pagina=".$x."')\">  $x  </a></li>";}
					    }

						$sql_p = "SELECT * FROM projetos, fotos_projetos, categorias_pro
					  			  WHERE ftp_pro_id=pro_id 
					  			  AND ftp_destaque='SIM'
								  AND cat_id=pro_cat_id";
								  if ( isset( $_GET['cat_id'] ) && !empty($_GET['cat_id']) ){
								  	$sql_p .= " AND cat_id=".$_GET['cat_id']."";
								  }
						$sql_p .= " ORDER BY pro_data DESC LIMIT ".$pri_reg.", ".$num_pag;
						$res_p = mysqli_query($mysqli, $sql_p);
						while ($row_p = mysqli_fetch_array($res_p, MYSQLI_ASSOC)){
					?>

						<div class="project cat<?= $row_p["cat_id"] ?> isotope-item col-sm-4">
							<div class="boxcontainer">
								<a href="?page=projeto&id=<?= $row_p["pro_id"] ?>">
									<div class="mask">  
									    <h4><?= $row_p["pro_cliente"] ?><br />
									    <small><?= $row_p["pro_nome"] ?></small></h4>  								    
								    </div>
									<img src="img/projetos/<?= $row_p["ftp_imagem"] ?>" class="img-responsive" alt="">			
								</a>						
							</div>
						</div>

					<?php
					    $contQtd++;
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
