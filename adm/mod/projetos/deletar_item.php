<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];
    
    // Verifica se já existe uma imagem, se sim deleta.
    $sql_deleta_imagem="SELECT ftp_imagem FROM fotos_projetos WHERE ftp_pro_id=".$id;
    $result_deleta_imagem = mysqli_query($mysqli, $sql_deleta_imagem);
    while ($row_deleta_imagem= mysqli_fetch_array($result_deleta_imagem)){

    	if($row_deleta_imagem["ftp_imagem"]!=''){
        	$filename="../img/projetos/".$row_deleta_imagem["ftp_imagem"];
        	unlink($filename);
    	}
    }
    $sqltxt_o = "DELETE FROM fotos_projetos WHERE ftp_pro_id=".$id;
    $sql_o = mysqli_query($mysqli, $sqltxt_o);

    $sqltxt = "DELETE FROM projetos WHERE pro_id=".$id;
    $sql = mysqli_query($mysqli, $sqltxt);

    echo "<script type=text/javascript>alert('Cadastro excluído com sucesso!')</script>";
    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=projetos';</script>";
    
?>
