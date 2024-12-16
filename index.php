<?php
session_start();

$url = parse_url($_SERVER['REQUEST_URI']);

$path = $url['path'] ?? '/';

switch($path){
    case '/tpApi/':
        echo 'Bienvenue';
        break;
    default:
        echo 'Erreur 404';
        break;
}
?>