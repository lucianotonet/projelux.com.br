<?php
	include_once '../../inc/connect_db.php';
    include_once '../../js/wideimage/WideImage.php';
    
	echo "<meta charset='UTF-8'>";

    $id=$_REQUEST["id"];
    $nome=$_REQUEST["nome"];
    $descri=$_REQUEST["descri"];
    $destaq=$_REQUEST["destaq"];
    
    if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome para a dica !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas&acao=edita_item&id=".$id."';</script>";
    }
    else{
        $imagem=$_FILES["imagem"];
	        
        $errorIndex = $_FILES["imagem"]["error"];

        if ($errorIndex > 0) {

        }else{
            // Verifica se já existe uma imagem, se sim deleta.
            $sql_deleta_imagem = "SELECT dic_imagem FROM dicas WHERE dic_id=".$id;
            $result_deleta_imagem =  mysqli_query($mysqli, $sql_deleta_imagem);
            $row_deleta_imagem = mysqli_fetch_array($result_deleta_imagem);

            if($row_deleta_imagem["dic_imagem"]!=''){
                $filename="../../../img/dicas/".$row_deleta_imagem["dic_imagem"];
                unlink($filename);
            }
            // Fim função.
        }

        // Se a foto estiver sido selecionada
        if (!empty($imagem["name"])) {
            $error = array();
            // Largura máxima em pixels
            $largura = 9000;
            // Altura máxima em pixels
            $altura = 9000;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1500000;

            // Pega as dimensões da imagem
            $dimensoes = getimagesize($imagem["tmp_name"]);

            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes[0] > $largura) {
	            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
	        }

	        // Verifica se a altura da imagem é maior que a altura permitida
	        if($dimensoes[1] > $altura) {
	            $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
	        }

	        // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if($imagem["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            // Se não houver nenhum erro
            if (count($error) == 0) {
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                // Caminho de onde ficará a imagem
                $caminho_imagem = "../../../img/dicas/" . $nome_imagem;

                // Insere os dados no banco
        		$comando_sql = "UPDATE dicas SET dic_nome='".$nome."',
        										 dic_imagem='".$nome_imagem."', 
        										 dic_texto='".$descri."', 
        										 dic_destaq='".$destaq."' 
        									 WHERE dic_id=".$id." ";
                $sql = mysqli_query($mysqli, $comando_sql);

                // Se os dados forem inseridos com sucesso
                if ($sql){
	                // Faz o upload da imagem para seu respectivo caminho
	                move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
		                
	                $image = WideImage::load("../../../img/dicas/".$nome_imagem);
	                //$cropped = $image->crop('center', 'center', 1000, 1040);
	                //$cropped->saveToFile("../../../img/dicas/".$nome_imagem);
	                $resized = $image->resize(1000, 1040, 'inside', 'any');
	                $resized->saveToFile("../../../img/dicas/".$nome_imagem);

                    echo "<script type=text/javascript>alert('Dica alterada com sucesso!')</script>";
                    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas';</script>";
		        }else {
		        	echo "<script type=text/javascript>alert('Dica não alterada!')</script>";
		            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas';</script>";
				}
            }

            // Se houver mensagens de erro, exibe-as
            if (count($error) != 0) {
                if($error[1]){
                    echo "<script type=text/javascript>alert('Isso não é uma imagem.')</script>";
                    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas&acao=edita_item&id=".$id."';</script>";
                }
                if($error[2]){
                    echo "<script type=text/javascript>alert('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
                    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas&acao=edita_item&id=".$id."';</script>";
                }
                if($error[3]){
                    echo "<script type=text/javascript>alert('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
                    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas&acao=edita_item&id=".$id."';</script>";
                }
                if($error[4]){
                    echo "<script type=text/javascript>alert('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
                    echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas&acao=edita_item&id=".$id."';</script>";
                }
            }
        }
        else{
        	$comando_sql = "UPDATE dicas SET dic_nome='".$nome."', 
        									 dic_texto='".$descri."',
        									 dic_destaq='".$destaq."' 
        								 WHERE dic_id=".$id." ";
            $sql = mysqli_query($mysqli, $comando_sql);

            // Se os dados forem inseridos com sucesso
            if ($sql){
                echo "<script type=text/javascript>alert('dicas alterado com sucesso!')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas';</script>";
		    }else {
		        echo "<script type=text/javascript>alert('dicas não alterado!')</script>";
		        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=dicas';</script>";
			}
        }
   	}
?>