<?php 
	include_once 'adm/inc/connect_db.php';

	$acao = (isset($_GET["page"])) ? $_GET["page"] : "home"; 

	setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="WebSite - Projelux"/>
	<meta name="keywords" content="Projelux, Projetos elétricos, subestações, Plotagens, digitalizações"/>
	<meta name="author" content="RTI Soluções"/>
    <link rel="shortcut icon" href="images/favicon.png">
	<title>Projelux</title>

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Font-Awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Main Style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive Styles -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
</head>
	<body>

		<!-- Fixed navbar -->
		<nav class="navbar navbar-static-top" id="main-menu">
				
			<div class="container">
				<div class="navbar-header">
					<div id="project_slider" class="carousel slide carousel-fade" data-ride="carousel">
					    <div class="carousel-inner" role="listbox">
					        <div class="item active">
								<a id="logo" class="navbar-brand" href="?page=home">
						            <img src="images/logo_t1.png" class="img-responsive" alt="">
								</a>
						    </div>
					        <div class="item">
								<a id="logo" class="navbar-brand" href="?page=home">
						            <img src="images/logo_t2.png" class="img-responsive" alt="">
								</a>
					        </div>
					        <div class="item">
								<a id="logo" class="navbar-brand" href="?page=home">
						            <img src="images/logo_t3.png" class="img-responsive" alt="">
								</a>
					        </div>
					        <div class="item">
								<a id="logo" class="navbar-brand" href="?page=home">
						            <img src="images/logo_t4.png" class="img-responsive" alt="">
								</a>
					        </div>
					    </div>
				    </div>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-top" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-bars fa-2x"></span>
					</button>
				</div>
				<div id="navbar-top" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="<?php if ($acao == 'home') echo 'active'; ?>">
							<a href="?page=home">Home</a>
						</li>
						<li class="<?php if ($acao == 'sobre') echo 'active'; ?>">
							<a href="?page=sobre">Sobre a Projelux</a>
						</li>
						<li class="<?php if (($acao == 'projetos') or ($acao == 'projeto')) echo 'active'; ?>">
							<a href="?page=projetos">Projetos</a>
						</li>
						<li class="<?php if (($acao == 'servicos') or ($acao == 'servico')) echo 'active'; ?>">
							<a href="?page=servicos">Plotagens</a>
						</li>
						<li class="<?php if ($acao == 'contato') echo 'active'; ?>">
							<a href="?page=contato">Contato</a>
						</li>							
					</ul>
				</div><!--/.nav-collapse -->
			</div>

		</nav>		

		<nav class="navbar navbar-inverse navbar-fixed-top" id="sticky-main-menu">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="#top">
						<img src="images/logo_sm.png" class="img-responsive" alt="">
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="<?php if ($acao == 'home') echo 'active'; ?>">
							<a href="?page=home">Home</a>
						</li>
						<li class="<?php if ($acao == 'sobre') echo 'active'; ?>">
							<a href="?page=sobre">Sobre a Projelux</a>
						</li>
						<li class="<?php if (($acao == 'projetos') or ($acao == 'projeto')) echo 'active'; ?>">
							<a href="?page=projetos">Projetos</a>
						</li>
						<li class="<?php if (($acao == 'servicos') or ($acao == 'servico')) echo 'active'; ?>">
							<a href="?page=servicos">Plotagens</a>
						</li>
						<li class="<?php if ($acao == 'contato') echo 'active'; ?>">
							<a href="?page=contato">Contato</a>
						</li>							
					</ul>
				</div>
			</div>
		</nav>	

	<?php
		$file   = "pages/".$acao.".php";
			if( is_file($file) ){
				include($file);
			}else{
			// ERRO 404
			include("pages/home.php");
			}
	?>

		<footer>
			<div class="container-fluid footer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-2">
							<a href="#" >
								<img src="images/logo_w.png" class="img-responsive logo-footer" alt="">							
							</a>
						</div>									
						<div class="hidden-xs hidden-sm col-md-4">
							<p class="copyright">
								© 2015 Projelux. <br>
								Todos os direitos reservados. <br>
								Desenvolvido por <a href="http://www.rtisolucoes.com.br" target="_new">RTI</a>.
							</p>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3 address">
							<p class="">
								<strong>Localização</strong><br>
								Av. Placidina de Araújo, 916 - Centro <br>
								Nova Prata - Rio Grande do Sul
							</p>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3 contacts">
							<p class="">
								<strong>Fale Conosco</strong><br>
								Telefone: (54) 3242 1484 / 3242 6681 <br>
								E-mail: <a href="mailto:projelux@projelux.com.br">projelux@projelux.com.br</a>
							</p>
						</div>																	
					</div>
				</div>
			</div>				
			<nav class="navbar-inverse">		
				<div class="container">
					<ul class="nav navbar-nav visible-xs mobile-to-top">
						<li class="">					
							<a href="#top" class="text-center"><i class="fa fa-chevron-up fa-2x"></i></a>
						</li>		
					</ul>

					<ul class="nav navbar-nav pull-right hidden-xs">
						<li class="">
							<a href="#top" class="">Voltar ao topo</a>								
						</li>		
					</ul>
					<ul class="nav navbar-nav hidden-xs" id="menu-bottom">							
						<li class="<?php if ($acao == 'home') echo 'active'; ?>">
							<a href="?page=home">Home</a>
						</li>
						<li class="<?php if ($acao == 'sobre') echo 'active'; ?>">
							<a href="?page=sobre">Sobre a Projelux</a>
						</li>
						<li class="<?php if (($acao == 'projetos') or ($acao == 'projeto')) echo 'active'; ?>">
							<a href="?page=projetos">Projetos</a>
						</li>
						<li class="<?php if (($acao == 'servicos') or ($acao == 'servico')) echo 'active'; ?>">
							<a href="?page=servicos">Plotagens</a>
						</li>
						<li class="<?php if ($acao == 'contato') echo 'active'; ?>">
							<a href="?page=contato">Contato</a>
						</li>							
					</ul>

				</div>					
			</nav>			
		</footer>

		<!-- jQuery -->
		<script src="js/jquery-1.11.2.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
		<!-- Custom JavaScript -->
		<script src="js/scripts.js"></script>

	</body>
</html>