<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sql="SELECT * FROM members WHERE id=".$id." ";
    $result=mysqli_query($mysqli, $sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h5>Configurador &raquo; <a href="#" class="active">Editar Administrador</a></h5>
<fieldset>
    <form action="mod/opcoes/funcao_edita_admin.php" method="post" >
	    <div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input value="<?=$row["username"]?>" name="nome" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>E-mail:&nbsp;</label><input value="<?=$row["email"]?>" name="login" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>Senha:&nbsp;</label><input id="password" name="password" type="text" class="text-long" style="width: 250px;" /></p>
        	<p><label>Tipo:</label>
        	<select name="tipo">
        	<?php
        		if ($row["tipo"]=='master'){
					echo "<option value='master' selected>MASTER</option>";
					echo "<option value='user'>USER</option>";
				} else {
            		echo "<option value='user' selected>USER</option>";
					echo "<option value='master'>MASTER</option>";
				}
			?>
        	</select>
        	</p>
		</div>
		<br />
	    <input name="id" type="hidden" value="<?=$row["id"]?>" />
        <input class="btn btn-default" type="submit" value="Alterar"/>
    </form>
</fieldset>