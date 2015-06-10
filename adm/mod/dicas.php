<div class="col-lg-2">
  <div class="bs-component">
    <div class="btn-group-vertical">
    	<a href="menu.php?sub=dicas" class="btn btn-default">Lista dicas</a>
    	<a href="menu.php?sub=dicas&acao=cadastra_item" class="btn btn-default">Novo Cadastro</a>
    </div>
  </div>
</div>    

<div class="col-lg-10">
  <blockquote>
    <?php
        $acao = (isset($_GET["acao"])) ? $_GET["acao"] : "index";
        include 'dicas/'.$acao.'.php';
    ?>
  </blockquote>
</div>

<div class="clear"></div>