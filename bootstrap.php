<?php
define('_DIR_ROOT', __DIR__); //setting dir
//Xu ly root http
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
echo $web_root;
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '',strtolower(_DIR_ROOT));
require_once './configs/routes.php';
require_once './app/App.php'; //load app
require_once './core/controller.php'; //load base controller