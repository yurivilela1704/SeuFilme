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

function voltar()
{
     return "<a href='index.php'><i class='material-icons'>arrow_back</i></a>";
}

function msg_sucesso($mensagem)
{
    $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i> $mensagem</div>";
    return $resp;
}

function msg_aviso($mensagem)
{
    $resp = "<div class='aviso'><span class='material-icons'>info</span> $mensagem</div>";
    return $resp;
}

function msg_erro($mensagem)
{
    $resp = "<div class='erro'><span class='material-icons'>error</span> $mensagem</div>";
    return $resp;
}
