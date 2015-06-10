<?php
include_once 'inc/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

$sql_set = "SELECT * FROM setup LIMIT 1 ";
$res_set =  mysqli_query($mysqli, $sql_set);
$row_set = mysqli_fetch_array($res_set);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <head>
        <title>Área Administrativa</title>

        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body style="background-color: #fafafa; ">
        <div style="margin: 0 auto;margin-top: 15px;text-align: center;">
            <img  src="img/<?=$row_set["set_logo"]?>" />
            <br/><br/>
            <div style="width: 400px;height: 200px;margin: 0 auto;text-align: center;font-size: 18px;">
                <div style="margin-bottom: 10px;">
			        <?php
				        if (isset($_GET['error'])) {
				            echo '<p class="error">Erro ao fazer o login!</p>';
				        }
			        ?>
			    </div>
		        <fieldset>
		        	<legend style="color: gray;"><b>Área de Login</b></legend>
				    <form action="inc/process_login.php" method="post" name="login_form">                      
		                <table>
		                    <tr>
		                        <td style="color:gray; padding-bottom:10px;">Email:&nbsp;</td>
		                        <td style="padding-bottom:10px;"><input type="text" name="email" style="width: 340px;" /></td>
		                    </tr>
		                    <tr>
		                    	<td style="color:gray;">Senha:&nbsp;</td>
		                        <td><input type="password" name="password" id="password" style="width: 340px;" /></td>
		                    </tr>
		                </table>
                      	<div style="margin-top: 15px;">
                          	<input class="btn btn-default" type="submit" value="Entrar" onclick="formhash(this.form, this.form.password);" />
                       	</div>
				    </form>
				</fieldset>
			</div>
	    </div>

        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </body>
</html>