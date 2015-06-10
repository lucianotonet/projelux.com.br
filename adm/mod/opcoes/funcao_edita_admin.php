<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    $login=$_REQUEST["login"];
    $tipo=$_REQUEST["tipo"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes&acao=cadastra_admin';</script>";
    }if($login==""){
        echo "<script type=text/javascript>alert('Informe um login !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes&acao=cadastra_admin';</script>";
    }
    else{
        if($_REQUEST['password']!=""){
            // A senha em hash do formulário
            $password = $_REQUEST['password'];
            
            $password_hash = hash('sha512', $password);
            // Cria um salt randômico
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Cria uma senha pós hash (Cuidado para não re-escrever)
            $password_hash = hash('sha512', $password_hash.$random_salt);
            
            if ($insert_stmt = $mysqli->prepare("UPDATE members SET username=?, email=?, password=?, salt=?, tipo=? WHERE id=".$id." ")) {    
               $insert_stmt->bind_param('sssss', $nome, $login, $password_hash, $random_salt, $tipo); 
               // Execute a query preparada.
               $insert_stmt->execute();
               echo "<script type=text/javascript>alert('Cadastro alterado com sucesso !')</script>";
               echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes';</script>";
            }
        }
        else{
            if ($insert_stmt = $mysqli->prepare("UPDATE members SET username=?, email=?, tipo=? WHERE id=".$id." ")) {    
               $insert_stmt->bind_param('sss', $nome, $login, $tipo); 
               // Execute a query preparada.
               $insert_stmt->execute();
               echo "<script type=text/javascript>alert('Cadastro alterado com sucesso !')</script>";
               echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes';</script>";
            }
        }
    }
?>