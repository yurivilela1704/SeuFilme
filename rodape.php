<?php
echo "<footer>";
echo "<p>Acessador por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/Y') .".</p>";
echo "<p> Desensolvivo por Yuri Vilela estudando pela estudonauta &copy;</p>";
echo "</footer>";
$banco->close();
