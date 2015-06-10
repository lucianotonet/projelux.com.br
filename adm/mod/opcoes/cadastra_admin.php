<h5>Configurador &raquo; <a href="#" class="active">Cadastra Administrador</a></h5>
<fieldset>
    <form action="mod/opcoes/funcao_cadastra_admin.php" method="post">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input name="nome" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>E-mail:&nbsp;</label><input name="login" type="text" class="text-long" style="width: 400px;" /></p>
	        <p><label>Senha:&nbsp;</label><input id="password" name="password" type="text" class="text-long" style="width: 250px;" /></p>
        	<p><label>Tipo:</label>
        	<select name="tipo">
            	<option value='user' selected>USER</option>
				<option value='master'>MASTER</option>
        	</select>
        	</p>
		</div>
		<br />
        <input type="submit" value="Cadastrar" />
    </form>
</fieldset>