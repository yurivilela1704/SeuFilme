<?php
function thumbnail($arquivo)
{
    $caminho = "fotos/$arquivo";

    if (is_null($arquivo) || !file_exists($caminho))
    {
        return "fotos/indisponivel.png";
    } else
    {
        return $caminho;
    }
}
