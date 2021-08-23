<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da Página</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link rel="stylesheet" href="estilo/detalhes-page.css">
</head>
<body>
<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
?>
<div id="body">
    <?php
        include_once "topo.php";

        $codigo = $_GET['cod'] ?? 0;
        $joinQuery = "SELECT * FROM filmes WHERE cod='$codigo'";
        $busca = $banco->query("$joinQuery");
    ?>
    <h1>Detalhes do filme</h1>
    <table class='detalhes'>
        <?php
        if (!$busca)
        {
            echo "<tr><td>Busca falhou $banco->error";
        } else {
            if ($busca->num_rows == 1) {
                $registro = $busca->fetch_object();
                $thumb = thumbnail($registro->capa);
                //Imagem
                echo "<tr><td rowspan='3'><img class='imagem' src='$thumb'/>";
                echo "<td><h2 class='nome'>$registro->nome</h2>";
                echo "Nota no IMDB: " . number_format($registro->nota, 1) . "/10.0 ★";
                echo "<tr><td><p class='sinopse'><b>Sinopse:</b> $registro->sinopse</p>";
                echo "<tr><td>Adm";
            } else {
                echo "<tr><td>Nenhum registro encontrado.";
            }
        }
        ?>
    </table>
    <a href="index.php"><img src="icones/icoback.png"></a>
</div>
<?php include_once "rodape.php"?>
</body>
</html>