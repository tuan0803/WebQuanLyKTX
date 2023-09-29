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

//Tu dong load config
$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;

        }
    }
}

require_once './configs/routes.php'; //laod routes
 require_once 'core/Session.php'; //load base session
require_once './app/App.php'; //load app

//check config and load database
if (!empty($config['database'])){
    
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/Database.php';
        
        
    }
}

require_once 'core/Request.php'; //load base request
require_once 'core/Response.php'; //load base response
require_once 'core/Controller.php'; //load base controller
require_once 'core/Model.php'; //load base Model