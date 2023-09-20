<?php
define('_DIR_ROOT', __DIR__); //setting dir
//Xu ly root http
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
<<<<<<< HEAD
$folder = '/WEBQUANLYKTX';

$web_root = $web_root . $folder;
define('_WEB_ROOT', $web_root);

=======
echo $web_root;
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '',strtolower(_DIR_ROOT));
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
require_once './configs/routes.php';
require_once './app/App.php'; //load app
require_once './core/controller.php'; //load base controller