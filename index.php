<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Filmes</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo/estilo.css">
        <link rel="stylesheet" href="estilo/index-page.css">
    </head>
    <body>
        <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
        ?>
        <div id="body">
            <?php include_once "topo.php"; ?>
            <h1 class='index-titulo'>Escolha seu filme</h1>
            <table class="listagem">
                <?php
                $joinQuery = "SELECT filmes.nome, filmes.cod, filmes.capa, generos.genero, produtoras.produtora FROM filmes 
                              JOIN generos ON filmes.genero = generos.cod
                              JOIN produtoras ON filmes.produtora = produtoras.cod";
                $codigo = $_GET['cod'] ?? 0;
                $busca = $banco->query("$joinQuery");

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
                            echo "<tr><td><img alt='Imagem do filme $registro->nome' src='$thumb' class='mini'/>";
                            //Nome
                            echo "<td class='titulo-filme'><a href='detalhes.php?cod=$registro->cod'>$registro->nome</a> 
                            [$registro->genero]<br>$registro->produtora</td>";
                            //admin
                            echo "<td>Adm</td>";
                        }
                    }
                }
                ?>
            </table>
        </div>
        <?php include_once "rodape.php"?>
    </body>
</html>