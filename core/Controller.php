<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
    public function excel(){
        // require_once _DIR_ROOT . '/core/composer.json';
        // require_once _DIR_ROOT . '/core/composer.lock';
        require_once _DIR_ROOT . '/core/vendor/autoload.php';
        
    }
}

?>