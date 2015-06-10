<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sqldicas = "SELECT * FROM dicas WHERE dic_id=".$id;
    $resultdicas = mysqli_query($mysqli, $sqldicas);
    $rowdicas = mysqli_fetch_array($resultdicas, MYSQLI_ASSOC);
?>

<h5>Dicas &raquo; <a href="#" class="active">Editar Cadastro</a></h5>
<fieldset>
    <form action="mod/dicas/funcao_edita_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$rowdicas["dic_nome"]?>" name="nome" style="width: 450px;" type="text" class="text-long" /></p>
	        <p><label>Texto:&nbsp;</label>
	        	<textarea name="descri" style="width: 100%;height: 150px;"><?=$rowdicas["dic_texto"]?></textarea>
	       	</p>
	        <p><label>Texto Destaque: (max. 150 caracteres)</label>
	        	<input value="<?=$rowdicas["dic_destaq"]?>" name="destaq" style="width: 100%;" type="text" class="text-long" />
	        </p>
	        <p>Imagem atual:</p>
	        <p><label><b>Observação:</b></label>
	            <i>As imagens deverão ter tamanho de 1000px de largura e 1040px de altura para se adequar ao layout.</i></p>
	        <p><img style="width: 200px;height: 208px;" src="../img/dicas/<?=$rowdicas["dic_imagem"]?>" /></p>
	        <br/>
	        <p><label>Selecionar nova imagem para dica:</label><input style="width: 400px;" type="file" name="imagem" /></p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$rowdicas["dic_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>