
<!-- ----- debut config -->
<?php

// Débugage
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

$dsn = 'mysql:dbname=genealogie;host=localhost;charset=utf8';
$username = 'root';
$password = '';

// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



