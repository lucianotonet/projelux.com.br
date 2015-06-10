<?php
    include_once "inc/connect_db.php";

    $id=$_REQUEST["id"];

    $sql="SELECT * FROM setup WHERE set_id=".$id." ";
    $result=mysqli_query($mysqli, $sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h5>Configurador &raquo; <a href="#" class="active">Editar Configuração</a></h5>
<fieldset>
    <form action="mod/opcoes/funcao_editar_setup.php" method="post" enctype="multipart/form-data">
	    <div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$row["set_nome"]?>" name="nome" type="text" class="text-long" /></p>
	        <p><label>Lingua Padrão:&nbsp;</label><input value="<?=$row["set_lang"]?>" name="lingua" type="text" class="text-long" /></p>
	        <p>Logo Atual:</p>
	        <p><img style="width: auto;height: auto;" src="img/<?=$row["set_logo"]?>" /></p>
	        <p><label style="width: 600px;">Selecionar Logo:<br/>
	        <i>A imagem deverá estar com de largura de no máximo 85px de altura.</i>
	        </label><input style="width: 400px;" type="file" name="imagem" /></p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$row["set_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>