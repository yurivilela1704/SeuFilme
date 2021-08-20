<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da Página</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link rel="stylesheet" href="estilo/table-detalhes.css">
</head>
<body>
<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
?>
<div id="body">
    <?php
        $codigo = $_GET['cod'] ?? 0;
        $busca = $banco->query("SELECT * FROM filmes WHERE cod='$codigo'")
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
                echo "<td><h2 class='nome-nota'>$registro->nome - Nota IMDB: $registro->nota ★</h2>";
                echo "<tr><td><p class='sinopse'>$registro->sinopse</p>";
                echo "<tr><td>Adm";
            } else {
                echo "<tr><td>Nenhum registro encontrado";
            }
        }
        ?>
    </table>
</div>
</body>
</html>