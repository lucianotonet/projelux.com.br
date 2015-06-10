<?php
include_once 'inc/register_inc.php';
include_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <head>
        <title>Área Administrativa - Registrar Usuário</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body style="background-color: #fafafa; ">
        <div style="margin: 0 auto;margin-top: 15px;text-align: center;">
            <img  src="img/logo.png" />
            <br/><br/>
            <div style="width: 600px;height: 200px;margin: 0 auto;text-align: center;font-size: 18px;">
                <div style="margin-bottom: 10px;">
			        <h1>Registro de Usuário</h1>
			        <?php
				        if (!empty($error_msg)) {
				            echo $error_msg;
				        }
			        ?>
			        <div style="text-align: left;">
			        <ul>
			            <li>Os nomes de usuários devem conter apenas dígitos, letras maiúsculas e minúsculas e underlines (“_”)</li>
			            <li>Emails devem seguir um formato válido para email.</li>
			            <li>As senhas devem ter no mínimo 6 caracteres.</li>
			            <li>As senhas devem conter
			               <ul>
			                    <li>Pelo menos uma letra maiúscula (A..Z)</li>
			                    <li>Pelo menos uma letra minúscula (a..z)</li>
			                    <li>Pelo menos um número (0..9)</li>
			                </ul>
			            </li>
			            <li>Sua senha deve conferir exatamente</li>
			        </ul>
			        </div>
			    </div>
		        <fieldset>
		        	<legend style="color: gray;"><b>Área de Registro</b></legend>
				        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
				                method="post" 
				                name="registration_form">
			                <table>
			                    <tr>
				            		<td style="color:gray;">Username: </td> 
				            		<td><input type='text' name='username' id='username' style="width: 300px;" /></td>
				            	</tr>
				            	<tr>
				            		<td style="color:gray;">Email: </td>
				            		<td><input type="text" name="email" id="email" style="width: 300px;" /></td>
				            	</tr>
				            	<tr>
				            		<td style="color:gray;">Password: </td>
				            		<td><input type="password"
				                             name="password" 
				                             id="password" style="width: 300px;" /></td>
				            	</tr>
								<tr>
				            		<td style="color:gray;">Confirm password: </td>
				            		<td><input type="password" 
				                                     name="confirmpwd" 
				                                     id="confirmpwd" style="width: 300px;" /></td>
				            	</tr>
		                	</table>
                      		<div style="margin-top: 15px;">
				            	<input type="button" value="Registrar" onclick="return regformhash(this.form,
				                                   								this.form.username,
				                                   								this.form.email,
				                                   								this.form.password,
				                                   								this.form.confirmpwd);" /> 
                       		</div>
				        </form>
			        <p>Clique aqui para fazer <a href="index.php">login</a>.</p>
				</fieldset>
			</div>
		</div>
    </body>
</html>