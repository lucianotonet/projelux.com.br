<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sqlBanner = "SELECT * FROM banners WHERE ban_id=".$id;
    $resultBanner = mysqli_query($mysqli, $sqlBanner);
    $rowBanner = mysqli_fetch_array($resultBanner, MYSQLI_ASSOC);
?>

<h5>Banner &raquo; <a href="#" class="active">Editar Cadastro</a></h5>
<fieldset>
    <form action="mod/banner/funcao_edita_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$rowBanner["ban_nome"]?>" name="nome" style="width: 450px;" type="text" class="text-long" /></p>
	        <p><label>Texto:&nbsp;</label><input value="<?=$rowBanner["ban_linha1"]?>" name="linha1" style="width: 650px;" type="text" class="text-long" /></p>
	        <p>Imagem atual :</p>
	        <p><label><b>Observação:</b></label>
	            <i>As imagens deverão ter tamanho de 1920px de largura e 850px de altura para se adequar ao layout.</i></p>
	        <p><img style="width: 650px;height: 288px;" src="../img/banners/<?=$rowBanner["ban_imagem"]?>" /></p>
	        <br/>
	        <p><label>Selecionar nova imagem do banner:</label><input style="width: 400px;" type="file" name="imagem" /></p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$rowBanner["ban_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>