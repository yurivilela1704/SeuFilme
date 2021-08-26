<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem dos Filmes</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo/estilo.css">
        <link rel="stylesheet" href="estilo/index-page.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
            require_once "includes/login.php";

            $ordem = $_GET['ordenar'] ?? "nome";
            $chave = $_GET['busca'] ?? "";
        ?>
        <div id="body">
            <?php include_once "topo.php"; ?>
            <h1 class='index-titulo'>Escolha seu filme</h1>
            <form method="get" id="busca" action="index.php">
                Ordenar por:
                <a href="index.php?ordenar=nome&busca=<?php echo $chave; ?>"> Nome</a> |
                <a href="index.php?ordenar=produtora&busca=<?php echo $chave; ?>"> Produtora</a> |
                <a href="index.php?ordenar=notaMaior&busca=<?php echo $chave; ?>"> Nota Alta</a> |
                <a href="index.php?ordenar=notaMenor&busca=<?php echo $chave; ?>"> Nota Baixa</a> |
                <a href="index.php"> Mostrar Todos</a> |
                Buscar: <input type="text" name="busca" size="10" maxlength="40">
                <input type="submit" value="OK">
            </form>
            <table class="listagem">
                <?php
                $joinQuery = "SELECT filmes.nome, filmes.cod, filmes.capa, generos.genero, produtoras.produtora FROM filmes 
                              JOIN generos ON filmes.genero = generos.cod
                              JOIN produtoras ON filmes.produtora = produtoras.cod ";

                if (!empty($chave))
                {
                    $joinQuery .= "WHERE filmes.nome like '%$chave%'
                    OR produtoras.produtora like '%$chave%'
                    OR generos.genero like '%$chave%' ";
                }

                switch ($ordem)
                {
                    case "produtora":
                        $joinQuery .= "ORDER BY produtoras.produtora";
                        break;
                    case "notaMaior":
                        $joinQuery .= "ORDER BY filmes.nota DESC";
                        break;
                    case "notaMenor":
                        $joinQuery .= "ORDER BY filmes.nota ASC";
                        break;
                    default:
                        $joinQuery .= "ORDER BY filmes.nome";
                        break;
                }

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