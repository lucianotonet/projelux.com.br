<?php
	include_once '../../inc/connect_db.php';
    include_once '../../js/wideimage/WideImage.php';

	echo "<meta charset='UTF-8'>";

    $nome=$_REQUEST["nome"];
    $linha1=$_REQUEST["linha1"];
  
     if($nome==''){
        echo "<script type=text/javascript>alert('Informe um nome para o banner !')</script>";
        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
    }else{
        $sql_consulta = "SELECT ban_nome FROM banners WHERE ban_nome='".$nome."' ";
        $result_consulta = mysqli_query($mysqli, $sql_consulta);
        $count_consulta = mysqli_num_rows($result_consulta);

        if($count_consulta!=false){
            echo "<script type=text/javascript>alert('Banner já existe!')</script>";
            echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
        }else{
            $imagem=$_FILES["imagem"];
             
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
				//echo count($error);
                // Se não houver nenhum erro
                if (count($error) == 0) {

                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

                    // Gera um nome único para a imagem
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                    // Caminho de onde ficará a imagem
                    $caminho_imagem = "../../../img/banners/".$nome_imagem;
                    
                     // Insere os dados no banco
					$sqltxt = "INSERT INTO banners VALUES(NULL, '".$nome."', '".$nome_imagem."', '".$linha1."', '')";
					$sql = mysqli_query($mysqli, $sqltxt);
                    
                    // Se os dados forem inseridos com sucesso
                    if ($sql){
	                    // Faz o upload da imagem para seu respectivo caminho
	                    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

	                    $image = WideImage::load("../../../img/banners/".$nome_imagem);
//	                    $cropped = $image->crop('center', 'center', 1920, 850);
//	                    $cropped->saveToFile("../../../img/banners/".$nome_imagem);
						$resized = $image->resize(1920, 850, 'inside', 'any');
						$resized->saveToFile("../../../img/banners/".$nome_imagem);
                    
                        echo "<script type=text/javascript>alert('Banner adicionado com sucesso!')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner';</script>";
                    }else {
                        echo "<script type=text/javascript>alert('Banner não adicionado!')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner';</script>";
					}
                }

                // Se houver mensagens de erro, exibe-as
                if (count($error) != 0) {
                    if($error[1]){
                        echo "<script type=text/javascript>alert('Isso não é uma imagem.')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
                    }
                    if($error[2]){
                        echo "<script type=text/javascript>alert('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
                    }
                    if($error[3]){
                        echo "<script type=text/javascript>alert('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
                    }
                    if($error[4]){
                        echo "<script type=text/javascript>alert('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
                        echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
                    }
                }
            }else{
                echo "<script type=text/javascript>alert('Favor escolher imagem para o banner !')</script>";
                echo "<script type=text/javascript>window.location.href = '../../menu.php?sub=banner&acao=cadastra_item';</script>";
                
            }
        }
    }
?>