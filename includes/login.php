<?php
session_start();

if (!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}
function cripto()
{
    $criptografia = '';
    for ($posicao = 0; $posicao < strlen($senha); $posicao++)
    {
        $letra = ord($senha[$posicao]) + 1;
        $criptografia .= chr($letra);
    }
    return $criptografia;
}

function gerarHash($senha)
{
    $texto = cripto($senha);
    $hash = password_hash($texto, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash)
{
    $hashok = password_verify(cripto($senha), $hash);
    return $hashok;
}

