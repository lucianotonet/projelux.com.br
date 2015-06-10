<h5>Banner &raquo; <a href="#" class="active">Novo Cadastro</a></h5>
<fieldset>
    <form action="mod/banner/funcao_cadastra_item.php" method="post" enctype="multipart/form-data">
    	<div class="bs-component">
	        <p><label>Nome:&nbsp;</label><input name="nome" style="width: 450px;" type="text" class="text-long" /></p>
	        <p><label>Texto:&nbsp;</label><input name="linha1" style="width: 650px;" type="text" class="text-long" /></p>
	        <p><label><b>Observação:</b></label>
	            <i>As imagens deverão ter tamanho de 1920px de largura e 850px de altura para se adequar ao layout.</i><br />
	        	<label>Imagem do banner:</label><input style="width: 400px;" type="file" name="imagem" />
	        </p>
		</div>
		<br />
        <input class="btn btn-default" type="submit" value="Cadastrar" />
    </form>
</fieldset>