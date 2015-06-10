<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sql="SELECT * FROM categorias_pro WHERE cat_id=".$id." ";
    $result=mysqli_query($mysqli, $sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h5>Projetos &raquo; Categorias &raquo; <a href="#" class="active">Editar Cadastro</a></h5>
<fieldset>
    <form action="mod/categorias_pro/funcao_editar_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$row["cat_nome"]?>" name="nome" type="text" class="text-long" style="width: 400px;" /></p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$row["cat_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>