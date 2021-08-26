<?php
echo "<p class='pequeno'>";
if (empty($_SESSION['user'])) {
    echo "<a href='user-login.php'>Olá, faça seu login</a>";
} else {
    echo "Olá, " . $_SESSION['nome'];
}

echo "</p>";