<h5>Textos &raquo; <a href="#" class="active">Novo Cadastro</a></h5>
<fieldset>
    <form action="mod/textos/funcao_cadastrar_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input name="nome" type="text" class="text-long" style="width: 400px;" /></p>
		    <p><label>Descrição:</label><textarea name="descri" style="width: 100%;height: 250px;"></textarea></p>
		    <p><label>Texto para Home:</label><textarea name="txhome" style="width: 100%;height: 150px;"></textarea></p>
		    <p><label>Texto Destaque:</label><textarea name="destaq" style="width: 100%;height: 100px;"></textarea></p>
		</div>
		<br />
        <input class="btn btn-default" type="submit" value="Cadastrar" />
    </form>
</fieldset>