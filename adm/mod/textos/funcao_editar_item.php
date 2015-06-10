<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    $descri=$_REQUEST["descri"];
    $txhome=$_REQUEST["txhome"];
    $destaq=$_REQUEST["destaq"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos&acao=editar_item&id=".$id."';</script>";
    }
    else{
    	// Insere os dados no banco
        $sqltxt = "UPDATE textos SET tex_nome='".$nome."',
        							 tex_texto='".$descri."',
        							 tex_home='".$txhome."',
        							 tex_destaque='".$destaq."'
        						 WHERE tex_id=".$id;
        $sql = mysqli_query($mysqli, $sqltxt);

        // Se os dados forem inseridos com sucesso
        if ($sql){
        	echo "<script type=text/javascript>alert('Cadastro alterado com sucesso!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos';</script>";
        }else {
            echo "<script type=text/javascript>alert('Cadastro Não alterado!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos';</script>";
		}
    }
?>