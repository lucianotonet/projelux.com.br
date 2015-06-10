<div class="col-lg-2">
  <div class="bs-component">
    <div class="btn-group-vertical">
    	<a href="menu.php?sub=projetos" class="btn btn-default">Projetos</a>
    	<a href="menu.php?sub=projetos&acao=cadastrar_item" class="btn btn-default">Novo Cadastro</a>
    	<a href="menu.php?sub=categorias_pro" class="btn btn-default">Categorias</a>
    </div>
  </div>
</div>    

<div class="col-lg-10">
  <blockquote>
    <?php
        $acao = (isset($_GET["acao"])) ? $_GET["acao"] : "index";
        include 'projetos/'.$acao.'.php';
    ?>
  </blockquote>
</div>

<div class="clear"></div>