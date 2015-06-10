<?php
	include_once 'inc/connect_db.php';

    $id=$_REQUEST["id"];

    $sqltxt = "DELETE FROM categorias_pro WHERE cat_id=".$id;
    $sql=mysqli_query($mysqli, $sqltxt);

    echo "<script type=text/javascript>alert('Cadastro excluído com sucesso!')</script>";
    echo "<script type=text/javascript>window.location.href = 'menu.php?sub=categorias_pro';</script>";
    
?>