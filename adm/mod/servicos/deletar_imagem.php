<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];
    
    // Verifica se já existe uma imagem, se sim deleta.
    $sql_del_img = "SELECT * FROM fotos_servicos WHERE ftp_id=".$id;
    $res_del_img = mysqli_query($mysqli, $sql_del_img);
    $row_del_img = mysqli_fetch_array($res_del_img);

    if($row_del_img["ftp_imagem"]!=''){
        $filename = "../img/servicos/".$row_del_img["ftp_imagem"];
        unlink($filename);
    }

    $sqltxt = "DELETE FROM fotos_servicos WHERE ftp_id=".$id;
    $sql = mysqli_query($mysqli, $sqltxt);

    echo "<script type=text/javascript>alert('Imagem excluída com sucesso!')</script>";
    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=servicos&acao=cadastrar_imagens&id=".$row_del_img["ftp_ser_id"]."';</script>";
    
?>