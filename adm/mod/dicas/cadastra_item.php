<h5>Dicas &raquo; <a href="#" class="active">Novo Cadastro</a></h5>
<fieldset>
    <form action="mod/dicas/funcao_cadastra_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input name="nome" style="width: 450px;" type="text" class="text-long" /></p>
	        <p><label>Texto:&nbsp;</label><textarea name="descri" style="width: 100%;height: 150px;"></textarea></p>
	        <p><label>Texto Destaque: (max. 150 caracteres)</label>
	        	<input name="destaq" style="width: 100%;" type="text" class="text-long" />
	        </p>
	        <p><label><b>Observação:</b></label>
	            <i>As imagens deverão ter tamanho de 1000px de largura e 1040px de altura para se adequar ao layout.</i><br />
	        	<label>Imagem da dica:</label><input style="width: 400px;" type="file" name="imagem" />
	        </p>
		</div>
		<br />
        <input class="btn btn-default" type="submit" value="Cadastrar" />
    </form>
</fieldset>