<script type="text/javascript">
  function excluir(id){
      if(window.confirm('Excluir esta imagem ?')){
          window.location.href='menu.php?sub=textos&acao=deletar_imagem&id='+id;
      }
  }
  $(document).ready(function(){
    $('.add_more').click(function(e){
        e.preventDefault();
        $(this).before("<br/><input name='file[]' type='file' /><br/><br/>");
    });
});

	function muda_destaque(id,contador){
	    var destaque = document.getElementById("destaque_imagem"+contador).value;
	    window.location.href="menu.php?sub=textos&acao=funcao_destaque&id="+id+"&destaque="+destaque;
	}
</script>
<?php
	include_once 'inc/connect_db.php';

    $id_item=$_REQUEST["id"];

    $num_pag=6;

    if(isset($_GET["pagina"])){ 
		$pagina = $_GET["pagina"];
	} else {
		$pagina = 1;	
	}
    $primeiro_registro = ($pagina-1)*($num_pag);

	$sql1="SELECT * FROM textos WHERE tex_id=".$id_item;
	$res1=mysqli_query($mysqli, $sql1);
	$row_res1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);

?>

<!-- h2 stays for breadcrumbs -->
<h5><?=$row_res1['tex_nome']?> &raquo; <a href="#" class="active" >Lista de Imagens</a></h5>

<fieldset>
	<form enctype="multipart/form-data" action="mod/textos/upload_imagens.php" method="post">
    	<div class="bs-component">
	        <p><label><b>Observação:</b></label>
	            <i>As imagens deverão ter 1200px de largura e 462px de altura para ficar adequada ao layout.</i>
	        </p>
		    <input type="file" name="file[]" multiple=""/>
		</div>
		<br/>
	    <input type="hidden" name="id_item" value="<?=$id_item?>" />
	    <input class="btn btn-default" type="submit" id="upload" value="Fazer Upload" />
		<br/><br/>
	</form>
</fieldset>

<?php
    $sql_total="SELECT * FROM fotos_textos WHERE ftp_tex_id=".$id_item;
    $sql="SELECT * FROM fotos_textos WHERE ftp_tex_id=".$id_item." ORDER BY ftp_id DESC LIMIT ".$primeiro_registro.", ".$num_pag." ";

    $result=mysqli_query($mysqli, $sql);
    
    $pesquisa_total = mysqli_query($mysqli, $sql_total);
    $total_reg = mysqli_num_rows($pesquisa_total);
    $total_paginas = ceil($total_reg/$num_pag);

    $contQtd=0;

    $prev = $pagina - 1;
    $next = $pagina + 1;
    
    $pg_atual = "menu.php?sub=textos&acao=cadastrar_imagens&id=".$id_item."&pagina=";
    
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
                echo "<td style='width:75%'>";
                    echo "<img style='width: 150px;height: 58px;' src='../img/textos/".$row["ftp_imagem"]."' />";
                echo "</td>";
                echo "<td class='action' style='width:20%'>";
                    echo "Destaque: ";
                    echo "<select id='destaque_imagem".$contQtd."' onchange='muda_destaque(".$row['ftp_id'].",".$contQtd.")'>";
                        if($row["ftp_destaque"]=='SIM'){
                            echo "<option value='SIM' selected>SIM</option>";
                            echo "<option value='NÃO'>NÃO</option>";
                        }
                        else if($row["ftp_destaque"]=='NÃO'){
                            echo "<option value='SIM'>SIM</option>";
                            echo "<option value='NÃO' selected>NÃO</option>";
                        }
                    echo "</select>";
                echo "</td>";
                echo "<td class='action' style='width:5%'>";
                    echo "<a onclick='excluir(".$row['ftp_id'].")' href='#' class='delete'><i class='fa fa-remove fa-fw'></a>";
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
