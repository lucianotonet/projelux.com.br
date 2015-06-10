<?php
include_once 'inc/functions.php';
 
sec_session_start();

$acao = (isset($_GET["sub"])) ? $_GET["sub"] : "projetos";

$sql_set = "SELECT * FROM setup LIMIT 1 ";
$res_set =  mysqli_query($mysqli, $sql_set);
$row_set = mysqli_fetch_array($res_set);

define('LANG', $row_set["set_lang"]);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Área Administrativa</title>

        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
		    <div class="container">
		      <div class="page-header" id="banner">
		          <img src="img/<?=$row_set["set_logo"]?>" alt="">
		          <p><br /> </p>
		          <p class="lead">Olá, você esta logado como: <b>
	              <?php echo htmlentities($_SESSION['username']); ?>
	              </b></p>
          	  </div>
			  <?php
				$sql_u = "SELECT tipo FROM members WHERE username='".$_SESSION['username']."'"; 
				$res_u = mysqli_query($mysqli, $sql_u);
				$row_u = mysqli_fetch_array($res_u, MYSQLI_ASSOC);
			  ?>
	          <div class="bs-docs-section clearfix">
	            <div class="row">
	              <div class="col-lg-12">
	                <div class="bs-component">
	                  <div class="navbar navbar-default" role="navigation">
                	    <div class="navbar-collapse collapse navbar-responsive-collapse">
							<?php if ($row_u["tipo"] == 'master') : ?>
                  		    <ul class="nav navbar-nav">
		                      <li class="<?php if (($acao == 'projetos') or ($acao == 'categorias_pro'))	echo 'active'; ?>"><a href="menu.php?sub=projetos">PROJETOS</a></li>
		                      <li class="<?php if (($acao == 'servicos') or ($acao == 'categorias_ser'))	echo 'active'; ?>"><a href="menu.php?sub=servicos">PLOTAGENS</a></li>
		                      <li class="<?php if ($acao == 'textos') 		echo 'active'; ?>"><a href="menu.php?sub=textos">TEXTOS</a></li>
		                      <li class="<?php if ($acao == 'dicas') 		echo 'active'; ?>"><a href="menu.php?sub=dicas">DICAS</a></li>
		                      <li class="<?php if ($acao == 'banner') 		echo 'active'; ?>"><a href="menu.php?sub=banner">BANNER</a></li>
		                      <li class="<?php if ($acao == 'opcoes') 		echo 'active'; ?>"><a href="menu.php?sub=opcoes">CONFIGURADOR</a></li>
		                      <li class="logout"><a href="inc/logout.php">LOGOUT</a></li>
                    	    </ul>
				        	<?php endif;
							if ($row_u["tipo"] == 'user') : ?>
	            			<ul id="mainNav">
	                			<li class="logout"><a href="../logout.php">LOGOUT</a></li>
            				</ul>
	        				<?php endif; ?>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
            <div class="container">
	          <div class="row">
	            <?php
	              $ano=date('Y');
	                        
			  	  if ($row_u["tipo"] == 'master') : 
	              	$acao = (isset($_GET["sub"])) ? $_GET["sub"] : "projetos";
	                include("mod/".$acao.".php");
	        	  endif;
				  if ($row_u["tipo"] == 'user') : 
	              	$acao = (isset($_GET["sub"])) ? $_GET["sub"] : "erro";
	              	include ("mod/".$acao.".php");
        		  endif;
                ?>
	        </div>
      	    <footer>
              <div class="container">
        	    <div class="row">
				  <div class="separador"></div>
          	      <div class="col-lg-6">
	                <p>Copyright © <?=$ano?> <?=$row_set["set_nome"]?>. Todos os direitos reservados.</p>
          	      </div>
          	      <div class="col-lg-6">
	                <p style="text-align: right;">Desenvolvido por RTI Soluções</b></p>
          	      </div>
        	    </div>
        	  </div>
            </footer>
        <?php else : ?>
		    <div class="container">
		      <div class="page-header" id="banner">
		        <div class="row">
		          <img src="img/<?=$row_set["set_logo"]?>" alt="">
		          <p><br /> </p>
		          <p class="lead">Você não tem autorização para acessar esta página. 
		          Por favor faço o seu <a href="index.php"><b>login</b></a>.</p>
            	</div>
          	  </div>
			</div>
        <?php endif; ?>

        <!-- JavaScripts-->
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// General options
		    	language : "pt",
				mode : "textareas",
				theme : "advanced",
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

				// Theme options
				theme_advanced_buttons1: "code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,fullscreen",

				// Theme options
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,print|,forecolor,backcolor",
				theme_advanced_buttons3 : "",
				theme_advanced_buttons4 : "",


				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				// Example content CSS (should be your site CSS)
			 	content_css : "css/content.css",

				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "lists/template_list.js",
				external_link_list_url : "lists/link_list.js",
				external_image_list_url : "lists/image_list.js",
				media_external_list_url : "lists/media_list.js",
		    	file_browser_callback : "tinyBrowser",
				// Replace values for the template plugin
				template_replace_values : {
					username : "Some User",
					staffid : "991234"
				}
			});
		</script>
		<!-- /TinyMCE -->

		<script>
			$(function () {
				$('#myTab a:first').tab('show')
			})    
		</script>

    </body>
</html>