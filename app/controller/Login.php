<?php
class Login extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('HomeModel');
    }

    public function index(){
        $this->data['content'] = 'home/login';
        $this->render('home/login', $this->data);
        
    }
    
    
   
}
?>