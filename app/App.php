<?php

class App
{
    private $__controller, $__action, $__param;
    function __construct()
    {
        global $routes;
        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__param  = [];
        $this->handleUrl();
    }
    function getUrl()
    {
<<<<<<< HEAD
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url = substr($_SERVER['QUERY_STRING'],4) ;
            
        } else {
            $url = '/';
        }
        
        
        
=======
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
        return $url;
    }

    public function handleUrl()
    {
        $url    = $this->getUrl();
<<<<<<< HEAD
        
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
      
        //Xử lý controller
        if (!empty($urlArr[0])) {

            $this->__controller = ucfirst($urlArr[0]);
=======
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);

        //Xử lý controller
        if (!empty($urlArr[1])) {

            $this->__controller = ucfirst($urlArr[1]);
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
        }
        if (file_exists('app/controller/' . $this->__controller . '.php')) {
            require_once 'app/controller/' . $this->__controller . '.php';

            //check class
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
<<<<<<< HEAD
                 unset($urlArr[0]);
                
=======
                unset($urlArr[0]);
                unset($urlArr[1]);
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
            } else {
                $this->loadError();
            }
           
        } else {
            $this->loadError();
        }

        //Xử lý action
<<<<<<< HEAD
        if (!empty($urlArr[1])) {
            $this->__action = ucfirst($urlArr[1]);
             unset($urlArr[1]);
=======
        if (!empty($urlArr[2])) {
            $this->__action = ucfirst($urlArr[2]);
            unset($urlArr[2]);
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
        }

        //Xử lý Param
        $this->__param = array_values($urlArr);
        //check method
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__param);
        } else {
            $this->loadError();
        }


<<<<<<< HEAD
     }

=======
    }
>>>>>>> 42c53fa2b70b69bf36d268b79a6802b0822fec02
    public function loadError($name = '404')
    {
        echo "HUHU LOI ROIIIIIIIIIIIIIII";
    }
}

?>