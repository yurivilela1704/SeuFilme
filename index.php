<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Filmes</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo/estilo.css">
        <link rel="stylesheet" href="estilo/table-listagem.css">
    </head>
    <body>
        <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
        ?>
        <div id="body">
            <h1>Escolha seu filme</h1>
            <table class="listagem">
                <?php
                    $busca = $banco->query("select * from filmes");

                if (!$busca)
                {
                    echo "<tr><td>Infelizmente a busca deu errado";
                } else {
                    if ($busca->num_rows == 0)
                    {
                        echo "<tr><td>Nenhum registro encontrado!";
                    } else {
                        while ($registro = $busca->fetch_object())
                        {
                            $thumb = thumbnail($registro->capa);
                            //Imagem
                            echo "<tr><td><img src='$thumb' class='mini'/>";
                            //Nome
                            echo "<td><a href='detalhes.php?cod=$registro->cod'>$registro->nome</a></td>";
                            //admin
                            echo "<td>Adm</td>";
                        }
                    }
                }
                ?>
            </table>
        </div>
        <?php
            $banco->close()
        ?>
    </body>
</html>