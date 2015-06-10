<?php
	include_once '../../inc/connect_db.php';
    include_once '../../js/wideimage/WideImage.php';

	echo "<meta charset='UTF-8'>";

    $id_item=$_REQUEST["id_item"];

    for($i=0; $i<count($_FILES['file']['name']); $i++){
        $ext = explode('.', basename( $_FILES['file']['name'][$i]));
        $nome_imagem = md5(uniqid(time())) . "." . $ext[count($ext)-1];
        $target_path = "../../../img/textos/" . $nome_imagem; 

        if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
        	
        	$image = WideImage::load("../../../img/textos/".$nome_imagem);
        	$resized = $image->resize(1200, 462, 'inside', 'any');
        	$resized->saveToFile("../../../img/textos/".$nome_imagem);

            $sqltxt = "INSERT INTO fotos_textos VALUES(NULL, ".$id_item.", '".$nome_imagem."','NÃO')";
            $sql = mysqli_query($mysqli, $sqltxt);
        } else{
            echo "<script type=text/javascript>alert('Erro no upload das imagens')</script>";
        }
    }
    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=textos&acao=cadastrar_imagens&id=".$id_item."';</script>";
 ?>