<?php
	include_once '../../inc/connect_db.php';

	echo "<meta charset='UTF-8'>";

    $nome=$_REQUEST["nome"];
    $login=$_REQUEST["login"];
    $tipo=$_REQUEST["tipo"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes&acao=cadastra_admin';</script>";
	}elseif($login==''){
        echo "<script type=text/javascript>alert('Informe um login !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes&acao=cadastra_admin';</script>";
    }else{
        $sql_consulta = "SELECT username FROM members WHERE username='".$nome."' ";
        $result_consulta = mysqli_query($mysqli, $sql_consulta);
        $count_consulta = mysqli_num_rows($result_consulta);
        
        if($count_consulta!=false){
            echo "<script type=text/javascript>alert('Nome já existe!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes&acao=cadastra_admin';</script>";
        }
        else{
            
            // A senha em hash do formulário
            $password = $_REQUEST['password'];
            
            $password_hash = hash('sha512', $password);
            // Cria um salt randômico
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Cria uma senha pós hash (Cuidado para não re-escrever)
            $password_hash = hash('sha512', $password_hash.$random_salt);

            // Adicione sua inserção ao script de base de dados aqui 
            // Certifique-se de utilizar declarações preparadas
            if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, tipo) VALUES (?, ?, ?, ?, ?)")) {    
               $insert_stmt->bind_param('sssss', $nome, $login, $password_hash, $random_salt, $tipo); 
               // Execute a query preparada.
               $insert_stmt->execute();
               echo "<script type=text/javascript>alert('Cadastro efetuado com sucesso !')</script>";
               echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=opcoes';</script>";
            }
        }
    }
?>