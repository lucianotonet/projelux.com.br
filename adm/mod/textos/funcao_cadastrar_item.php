<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $nome=$_REQUEST["nome"];
    $descri=$_REQUEST["descri"];
    $txhome=$_REQUEST["txhome"];
    $destaq=$_REQUEST["destaq"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome!')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos&acao=cadastrar_item';</script>";
    }
    else{
        $sql_consulta="SELECT tex_nome FROM textos WHERE tex_nome='".$nome."' ";
        $result_consulta=mysqli_query($mysqli, $sql_consulta);
        $count_consulta=mysqli_num_rows($result_consulta);

        if($count_consulta!=false){
            echo "<script type=text/javascript>alert('Nome já existe!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos&acao=cadastrar_item';</script>";
        }
        else{
        	// Insere os dados no banco
			$sqltxt = "INSERT INTO textos VALUES(NULL,'".$nome."','".$descri."','".$txhome."','".$destaq."')";
            $sql = mysqli_query($mysqli, $sqltxt);

            // Se os dados forem inseridos com sucesso
            if ($sql){
            	echo "<script type=text/javascript>alert('Cadastro efetuado com sucesso!')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos';</script>";
            }else {
            	echo "<script type=text/javascript>alert('Cadastro Não efetuado!')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos';</script>";
			}
        }
	}
?>