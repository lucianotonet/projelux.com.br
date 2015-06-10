<script type="text/javascript">
  function excluir(id){
      if(window.confirm('Excluir este Cadastro?')){
          window.location.href='menu.php?sub=textos&acao=deletar_item&id='+id;
      }
  }
</script>
<?php
	include_once 'inc/connect_db.php';

    $num_pag=8;

    if(isset($_GET["pagina"])){ 
		$pagina = $_GET["pagina"];
	} else {
		$pagina = 1;	
	}
    $primeiro_registro = ($pagina-1)*($num_pag);
?>

<!-- h2 stays for breadcrumbs -->
<h5>Textos &raquo; <a href="#" class="active" >Lista de Textos</a></h5>

<?php
    $sql_total="SELECT * FROM textos";
    $sql="SELECT * FROM textos ORDER BY tex_id DESC LIMIT ".$primeiro_registro.", ".$num_pag." ";
    $result=mysqli_query($mysqli, $sql);
    
    $pesquisa_total = mysqli_query($mysqli, $sql_total);
    $total_reg = mysqli_num_rows($pesquisa_total);
    $total_paginas = ceil($total_reg/$num_pag);

    $contQtd=0;

    $prev = $pagina - 1;
    $next = $pagina + 1;
    
    $pg_atual = "menu.php?sub=textos&pagina=";
    
    if($pagina > 1){
        $prev_link = "<a href=\"$pg_atual"."$prev\" onclick=\"return mudarPagina('$pg_atual"."pagina=".$prev."')\">&laquo;Anterior</a>";
    }

    if($total_paginas > $pagina){
        $next_link = "<a href=\"$pg_atual"."$next\" onclick=\"return mudarPagina('$pg_atual"."pagina=".$next."')\">Pr&oacute;xima&raquo;</a>";
    }

    $painel = null;

    for($x=1; $x <= $total_paginas; $x++){
        if($x==$pagina){ $painel .= "<li class='active'><span class='selecionado'>  $x  </span></li>";}
        else{ $painel .= "<li><a href=\"$pg_atual"."$x\" onclick=\"return mudarPagina('$pg_atual"."pagina=".$x."')\">  $x  </a></li>";}
    }
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
<div class="bs-component">
  <table class="table table-striped table-hover ">
        <?php
            echo "<tr>";
                echo "<td style='width:85%'>";
                    echo $row["tex_nome"];
                echo "</td>";
                echo "<td class='action' style='width:5%'>";
                    echo "<a href='menu.php?sub=textos&acao=cadastrar_imagens&id=".$row['tex_id']."' class='edit'><i class='fa fa-image fa-fw'></i></a>";
                echo "</td>";
                echo "<td class='action' style='width:5%'>";
                    echo "<a href='menu.php?sub=textos&acao=editar_item&id=".$row['tex_id']."' class='edit'><i class='fa fa-pencil fa-fw'></i></a>";
                echo "</td>";
                echo "<td class='action' style='width:5%'>";
                    echo "<a onclick='excluir(".$row['tex_id'].")' href='#' class='delete'><i class='fa fa-remove fa-fw'></i></a>";
                echo "</td>";
            echo "</tr>";
        ?>
    </table>
</div>
<?php
    $contQtd++;
    }
?>
<br/>
<div class="bs-component">
  <ul class="pagination pagination-sm">
    <?php
	    if(isset($prev_link)){ echo "<li>".$prev_link."</li>"; } 
        echo $painel;
		if(isset($next_link)){ echo "<li>".$next_link."</li>"; }
    ?>
  </ul>
</div>
