<?php
define('_DIR_ROOT', __DIR__); //setting dir
//Xu ly root http
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$folder = '/WEBQUANLYKTX';

$web_root = $web_root . $folder;
define('_WEB_ROOT', $web_root);



require_once './configs/routes.php';
require_once './app/App.php'; //load app
require_once './core/controller.php'; //load base controller