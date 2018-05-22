<?php
// Inclusion du fichier de configuration (qui définit desconstantes)
include 'global/config.php';
// Désactivation des guillemets magiques
if (1 == get_magic_quotes_gpc())
{
	function remove_magic_quotes_gpc(&$value) {
	$value = stripslashes($value);
}
array_walk_recursive($_GET, 'remove_magic_quotes_gpc');
array_walk_recursive($_POST, 'remove_magic_quotes_gpc');
array_walk_recursive($_COOKIE, 'remove_magic_quotes_gpc');
}
// Inclusion de Pdo2, potentiellement utile partout
include CHEMIN_LIB.'pdo2.php';
