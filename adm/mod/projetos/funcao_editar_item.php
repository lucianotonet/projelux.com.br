<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    $descri=$_REQUEST["descri"];
    $cliente=$_REQUEST["cliente"];
    $data=$_REQUEST["data"];
    $cat=$_REQUEST["categoria"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=projetos&acao=editar_item&id=".$id."';</script>";
    }
    else{
    	// Insere os dados no banco
        $sqltxt = "UPDATE projetos SET pro_nome='".$nome."',
        							   pro_texto='".$descri."',
        							   pro_cliente='".$cliente."',
        							   pro_data='".$data."',
        							   pro_cat_id='".$cat."'
        						   WHERE pro_id=".$id;
        $sql = mysqli_query($mysqli, $sqltxt);

        // Se os dados forem inseridos com sucesso
        if ($sql){
        	echo "<script type=text/javascript>alert('Cadastro alterado com sucesso!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=projetos';</script>";
        }else {
            echo "<script type=text/javascript>alert('Cadastro Não alterado!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=projetos';</script>";
		}
    }
?>