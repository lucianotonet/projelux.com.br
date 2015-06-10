<?php
include_once 'functions.php';
 
sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php.

echo "<meta charset='UTF-8'>";
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login com sucesso 
		echo "<script type=text/javascript>window.location.href='../../index.php?page=restrito'</script>";
        //header('Location: ../protected_page.php');
    } else {
        // Falha de login 
		echo "<script type=text/javascript>window.location.href='../../index.php?page=404'</script>";
        //header('Location: ../index.php?error=1');
    }
} else {
    // As variáveis POST corretas não foram enviadas para esta página. 
    echo 'Requisição Inválida';
}
?>