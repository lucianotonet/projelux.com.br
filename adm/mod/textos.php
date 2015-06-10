<div class="col-lg-2">
  <div class="bs-component">
    <div class="btn-group-vertical">
    	<a href="menu.php?sub=textos" class="btn btn-default">Textos</a>
    	<a href="menu.php?sub=textos&acao=cadastrar_item" class="btn btn-default">Novo Cadastro</a>
    </div>
  </div>
</div>    

<div class="col-lg-10">
  <blockquote>
    <?php
        $acao = (isset($_GET["acao"])) ? $_GET["acao"] : "index";
        include 'textos/'.$acao.'.php';
    ?>
  </blockquote>
</div>

<div class="clear"></div>