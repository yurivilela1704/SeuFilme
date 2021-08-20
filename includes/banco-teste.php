<pre><?php
    // sempre lembrar dos contrutores que precisam ser colocados apos chamar mysqli
    $banco = new mysqli("localhost", "root", "", "db_filmes");

    //caso encontrar um erro, irá aparecer uma msg e colocado o 'die' também não continua a interpretar
    if ($banco->connect_errno) {
        echo "<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>";
        die();
    }

    $busca = $banco->query("select * from generos");

if (!$busca) {
    //error é para mostra na tela qual o erro ocorrido.
    echo "<p>Falha na busca! $banco->error</p>";
} else {
    //fetch_object, é um metodo que pega os dados e coloca em outro objeto
    while ($registro = $busca->fetch_object()) {
        //print r, faz
        print_r($registro);
    }
}
