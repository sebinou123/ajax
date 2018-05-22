<?php

if(get_magic_quotes_gpc()) 
{
	$_POST = array_map('stripslashes', $_POST);
	$_GET = array_map('stripslashes', $_GET);
	$_COOKIE = array_map('stripslashes', $_COOKIE);
}

$text = 'lala des " et encore des " ' . " et des ' sans oublier les
'";
echo $text;
echo addslashes($text);
?>
