<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];
    
    // Verifica se já existe uma imagem, se sim deleta.
    $sql_deleta_imagem = "SELECT ban_imagem FROM banners WHERE ban_id=".$id." ";
    $result_deleta_imagem =  mysqli_query($mysqli, $sql_deleta_imagem);
    $row_deleta_imagem = mysqli_fetch_array($result_deleta_imagem);

    if($row_deleta_imagem["ban_imagem"]!=''){
        $filename = "../img/banners/".$row_deleta_imagem["ban_imagem"];
    }

    $sqltxt = "DELETE FROM banners WHERE ban_id=".$id;
    $sql = mysqli_query($mysqli, $sqltxt);

	if ($sql) {
        unlink($filename);
	    echo "<script type=text/javascript>alert('Banner excluído com sucesso!')</script>";
	    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=banner';</script>";
	}else {
	    echo "<script type=text/javascript>alert('Banner não excluído!')</script>";
	    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=banner';</script>";
	}
    
?>