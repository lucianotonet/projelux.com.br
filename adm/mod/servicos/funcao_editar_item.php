<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    $descri=$_REQUEST["descri"];
    $info=$_REQUEST["info"];
    $cat=$_REQUEST["categoria"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=servicos&acao=editar_item&id=".$id."';</script>";
    }
    else{
    	// Insere os dados no banco
        $sqltxt = "UPDATE servicos SET ser_nome='".$nome."',
        							   ser_cat_id='".$cat."',
        							   ser_texto='".$descri."',
        							   ser_info='".$info."'
        						   WHERE ser_id=".$id;
        $sql = mysqli_query($mysqli, $sqltxt);

        // Se os dados forem inseridos com sucesso
        if ($sql){
        	echo "<script type=text/javascript>alert('Cadastro alterado com sucesso!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=servicos';</script>";
        }else {
            echo "<script type=text/javascript>alert('Cadastro Não alterado!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=servicos';</script>";
		}
    }
?>