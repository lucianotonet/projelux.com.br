<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];
    
    // Verifica se já existe uma imagem, se sim deleta.
    $sql_deleta_imagem = "SELECT dic_imagem FROM dicas WHERE dic_id=".$id." ";
    $result_deleta_imagem =  mysqli_query($mysqli, $sql_deleta_imagem);
    $row_deleta_imagem = mysqli_fetch_array($result_deleta_imagem);

    if($row_deleta_imagem["dic_imagem"]!=''){
        $filename = "../img/dicas/".$row_deleta_imagem["dic_imagem"];
    }

    $sqltxt = "DELETE FROM dicas WHERE dic_id=".$id;
    $sql = mysqli_query($mysqli, $sqltxt);

	if ($sql) {
        unlink($filename);
	    echo "<script type=text/javascript>alert('Dica excluída com sucesso!')</script>";
	    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=dicas';</script>";
	}else {
	    echo "<script type=text/javascript>alert('Dica não excluída!')</script>";
	    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=dicas';</script>";
	}
    
?>