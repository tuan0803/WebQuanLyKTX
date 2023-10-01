<?php

class App
{
    private $__controller, $__action, $__param, $__session;
    private $__controllertmp;
    function __construct()
    {
        global $routes;
        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__param  = [];
        $this->__session = new Session();
        $tmp             = $this->__session->data("user", "");
        if (!isset($tmp)) {
            $this->__session->data('user', [
                'name'=>'',
                'position'=>'guest',
                'userid'=>''
            ]);
        }
        
        
        $this->handleUrl();
    }
    function getUrl()
    {

        if (!empty($_SERVER['QUERY_STRING'])) {
            $url = substr($_SERVER['QUERY_STRING'],4) ;
            
        } else {
            $url = '/';
        }
        
        return $url;
    }

    public function handleUrl()
    {
        $url    = $this->getUrl();

        
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
      
        //Xử lý controller
        if (!empty($urlArr[0])) {

            $this->__controller = ucfirst($urlArr[0]);
            

        }
        if (file_exists('app/controller/' . $this->__controller . '.php')) {
            require_once 'app/controller/' . $this->__controller . '.php';


            //check class
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                $this->__controllertmp = ucfirst($urlArr[0]);
                 unset($urlArr[0]);
                

            } else {
                $this->loadError();
            }
           
        } else {
            $this->loadError();
        }

        //Xử lý action

        if (!empty($urlArr[1])) {
            $this->__action = ucfirst($urlArr[1]);
             unset($urlArr[1]);

        }

        //Xử lý Param
        $this->__param = array_values($urlArr);
        //check method
        $user = $this->__session->data("user", "");
        
        require_once 'app/controller/Login.php';
        if (method_exists($this->__controller, $this->__action)) {
            if ($user['position']=='admin') {
                call_user_func_array([$this->__controller, $this->__action], $this->__param);
            } 
            
            elseif ($user['position']=='staff') {
                if ($this->__controllertmp!='Qlynhanvien') {
                    call_user_func_array([$this->__controller, $this->__action], $this->__param);
                } else {

                    $this->__controller = new Login();
                    $this->__action     = "index";
                    call_user_func_array([$this->__controller, $this->__action], $this->__param);
                }
            }
            elseif ($user['position']!='student') {
                if ($this->__controllertmp=='Home'||$this->__controllertmp=='Login') {
                    call_user_func_array([$this->__controller, $this->__action], $this->__param);
                } else {
                    
                    $this->__controller = new Login();
                    $this->__action     = "index";
                    call_user_func_array([$this->__controller, $this->__action], $this->__param);
                }
                
            }
            else {
                call_user_func_array([$this->__controller, $this->__action], $this->__param);
            }
            
           
        } else {
            $this->loadError();
        }



     }


    public function loadError($name = '404')
    {
        echo "HUHU LOI ROIIIIIIIIIIIIIII";
    }
}

?>