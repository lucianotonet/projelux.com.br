<h5>Plotagens &raquo; <a href="#" class="active">Novo Cadastro</a></h5>
<fieldset>
    <form action="mod/servicos/funcao_cadastrar_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Categoria:</label>
	        <select name="categoria" style="width: 200px;">
	            <?php
	    			include_once 'inc/connect_db.php';
	                $sql1="SELECT * FROM categorias_ser";
	                $result1=mysqli_query($mysqli, $sql1);
	                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
	                    echo("<option value='".$row1['cat_id']."'>".$row1['cat_nome']."</option>");
	                }
	            ?>
	        </select>
	        </p>
	        <p><label>Nome:&nbsp;</label><input name="nome" type="text" class="text-long" style="width: 400px;" /></p>
		    <p><label>Descrição:</label><textarea name="descri" style="width: 100%;height: 250px;"></textarea></p>
		    <p><label>Informações:</label><textarea name="info" style="width: 100%;height: 250px;"></textarea></p>
		</div>
		<br />
        <input class="btn btn-default" type="submit" value="Cadastrar" />
    </form>
</fieldset>