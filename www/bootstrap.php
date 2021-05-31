<?php


define('HOST', '172.17.0.2');
define('BANCO', 'api');
define('USUARIO', 'root');
define('SENHA', 'docker');

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);
define('DIR_PROJETO', '');

if(file_exists('autoload.php')){
    include 'autoload.php';
} else {
    echo('Erro ao incluir bootstrap');
    exit;
}