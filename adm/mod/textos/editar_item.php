<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sql = "SELECT * FROM textos WHERE tex_id=".$id." ";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h5>Textos &raquo; <a href="#" class="active">Editar Textos</a></h5>
<fieldset>
    <form action="mod/textos/funcao_editar_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$row["tex_nome"]?>" name="nome" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>Descrição:</label>
	            <textarea name="descri" style="width: 100%;height: 250px;"><?=$row["tex_texto"]?></textarea>
	        </p>
	        <p><label>Texto para Home:</label>
	            <textarea name="txhome" style="width: 100%;height: 150px;"><?=$row["tex_home"]?></textarea>
	        </p>
	        <p><label>Texto destaque:</label>
	            <textarea name="destaq" style="width: 100%;height: 100px;"><?=$row["tex_destaque"]?></textarea>
	        </p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$row["tex_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>