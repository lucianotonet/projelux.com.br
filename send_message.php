<?php
if($_POST)
{	
	$to_Email   = "tonetlds@gmail.com"; //Replace with recipient email address		

	$subject        = 'Novo contato pelo site'; //Subject line for emails
	$from_email		= 'no-reply@lucianotonet.com';
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
		//exit script outputting json data
		$output = json_encode(
		array(
			'type'=>'error', 
			'text' => 'A requisicao deve ser feita via Ajax'
		));
		
		die($output);
    } 
	
	//check $_POST vars are set, exit if any missing
	if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userSubject"]) || !isset($_POST["userMessage"]))
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Os campos estão vazios!'));
		die($output);
	}
	//Sanitize input data using PHP filter_var().
	$user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
	$user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
	$subject          = filter_var($_POST["userSubject"], FILTER_SANITIZE_STRING);
	$user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
	
	//additional php validation
	if(strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Ei! '.ucfirst($user_Name).' é mesmo seu nome?'));
		die($output);
	}
	if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Digite um e-mail válido!'));
		die($output);
	}
	
	if(strlen($user_Message)<5) //check emtpy message
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Mensagem muito curta. Escreva alguma coisa.'));
		die($output);
	}
	
	$headers = 'From: '.$from_email.'' . "\r\n" .
	'Reply-To: '.$user_Email.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	$body  = "Nome: ".$user_Name."\r\n";
	$body .= "Assunto: ".$subject."\r\n";
	$body .= "E-mail: ".$user_Email."\r\n";
	$body .= $user_Message."\r\n";

	//send the mail
	$sentMail = @mail($to_Email, $subject, $body, $headers);	
	$debug = array( $to_Email , $subject, $body, $headers );
	
	if(!$sentMail) //output success or failure messages
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Não foi possível enviar o e-mail. Por favor, contate o serviço de hospedagem.', 'debug' => $debug ));
		die($output);
	}else{
		$output = json_encode( array('type'=>'message', 'text' => 'Obrigado, '.$user_Name .'. Analisaremos seu pedido e entraremos em contato.', 'debug' => $debug ));
		die($output);
	}
}