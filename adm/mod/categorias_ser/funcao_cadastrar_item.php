<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $nome=$_REQUEST["nome"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_ser&acao=cadastrar_item';</script>";
    }else{
        $sql_consulta="SELECT cat_nome FROM categorias_ser WHERE cat_nome='".$nome."' ";
        $result_consulta=mysqli_query($mysqli, $sql_consulta);
        $count_consulta=mysqli_num_rows($result_consulta);

        if($count_consulta!=false){
            echo "<script type=text/javascript>alert('Cadastro já existe!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_ser&acao=cadastrar_item';</script>";
        }else{
        	// Insere os dados no banco
            $sqltxt = "INSERT INTO categorias_ser VALUES(NULL,'".$nome."')";
            $sql = mysqli_query($mysqli, $sqltxt);
                
            // Se os dados forem inseridos com sucesso
            if ($sql){
				echo "<script type=text/javascript>alert('Cadastro efetuado com sucesso!')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_ser';</script>";
            }else {
                echo "<script type=text/javascript>alert('Cadastro Não efetuado!')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=categorias_ser';</script>";
			}
        }

    }
?>