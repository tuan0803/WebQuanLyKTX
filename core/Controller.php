<?php
class Controller
{
    public function model($model)
    {
        if (file_exists(_DIR_ROOT . '/app/model/' . $model . '.php')) {
            require_once _DIR_ROOT . '/app/model/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;

            }
        }
        return false;
    }
    
    public function render($view, $data=[])
    {
        extract($data);
        if (file_exists(_DIR_ROOT . '/app/view/' . $view . '.php')){
            require_once _DIR_ROOT . '/app/view/' . $view . '.php';
        }
        
            
    }
}

?>