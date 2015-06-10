<div class="col-lg-2">
  <div class="bs-component">
    <div class="btn-group-vertical">
    	<a href="menu.php?sub=banner" class="btn btn-default">Lista Banners</a>
    	<a href="menu.php?sub=banner&acao=cadastra_item" class="btn btn-default">Novo Cadastro</a>
    </div>
  </div>
</div>    

<div class="col-lg-10">
  <blockquote>
    <?php
        $acao = (isset($_GET["acao"])) ? $_GET["acao"] : "index";
        include 'banner/'.$acao.'.php';
    ?>
  </blockquote>
</div>

<div class="clear"></div>