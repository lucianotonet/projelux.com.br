<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Aconteceu um erro desconhecido!';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Segurança de login: Erro</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>Temos um problema</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>

