<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sql = "SELECT * FROM projetos WHERE pro_id=".$id." ";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h5>Projetos &raquo; <a href="#" class="active">Editar Projetos</a></h5>
<fieldset>
    <form action="mod/projetos/funcao_editar_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Categoria:</label>
	        <select name="categoria" style="width: 200px;">
	            <?php
	                $sql1="SELECT * FROM categorias_pro";
	                $result1=mysqli_query($mysqli, $sql1);
	                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
	                    if($row1["cat_id"]==$row["pro_cat_id"]){
	                        echo("<option value='".$row1['cat_id']."' selected>".$row1['cat_nome']."</option>");
	                    }else{
	                        echo("<option value='".$row1['cat_id']."'>".$row1['cat_nome']."</option>");
	                    }
	                }
	            ?>
	        </select>
	        </p>
	        <p><label>Nome:&nbsp;</label><input value="<?=$row["pro_nome"]?>" name="nome" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>Cliente:&nbsp;</label><input value="<?=$row["pro_cliente"]?>" name="cliente" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>Data:&nbsp;</label><input value="<?=$row["pro_data"]?>" name="data" type="date" style="width: 200px;" /></p>
	        <p><label>Descrição:</label>
	            <textarea name="descri" style="width: 100%;height: 250px;"><?=$row["pro_texto"]?></textarea>
	        </p>
		</div>
		<br />
        <input name="id" type="hidden" value="<?=$row["pro_id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar" />
    </form>
</fieldset>