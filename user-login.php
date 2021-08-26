<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="estilo/estilo.css">
        <link rel="stylesheet" href="estilo/detalhes-page.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Login do Usuário</title>

        <style>
            div#body
            {
                width: 320px;
                font-size: 16pt;
            }
            table{

            }
        </style>
    </head>
    <body>
        <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
            require_once "includes/login.php";
        ?>
        <div id="body">
            <?php
            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (is_null($usuario) || is_null($senha)){
                require "user-login-form.php";
            } else{
                echo "1";
;            }
            ?>
        </div>
    </body>
</html>