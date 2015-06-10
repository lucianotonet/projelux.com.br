<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_pro&acao=editar_item&id=".$id."';</script>";
    }
    else{
    	// Insere os dados no banco
        $sqltxt = "UPDATE categorias_pro SET cat_nome='".$nome."' WHERE cat_id=".$id." ";
        $sql = mysqli_query($mysqli, $sqltxt);

        // Se os dados forem inseridos com sucesso
        if ($sql){
        	echo "<script type=text/javascript>alert('Cadastro alterado com sucesso!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_pro';</script>";
        }else {
        	echo "<script type=text/javascript>alert('Cadastro Não efetuado!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_pro';</script>";
		}
    }
?>