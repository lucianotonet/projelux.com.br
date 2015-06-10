<div class="col-lg-2">
  <div class="bs-component">
    <div class="btn-group-vertical">
      <a href="menu.php?sub=opcoes" class="btn btn-default">Administradores</a>
      <a href="menu.php?sub=opcoes&acao=cadastra_admin" class="btn btn-default">Novo Cadastro</a>
      <a href="menu.php?sub=opcoes&acao=index_setup" class="btn btn-default">Configurador</a>
    </div>
  </div>
</div>    

<div class="col-lg-10">
  <blockquote>
    <?php
        $acao = (isset($_GET["acao"])) ? $_GET["acao"] : "index";
        include 'opcoes/'.$acao.'.php';
    ?>
  </blockquote>
</div>

<div class="clear"></div>