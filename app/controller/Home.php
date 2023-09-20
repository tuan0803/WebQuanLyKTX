<?php
class Home extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('HomeModel');
    }

    public function index(){
        $this->data['content'] = 'home/index';
        $this->render('layout/guest_layout', $this->data);
    }
    public function detail($id=0){
        $this->data['info'] = $this->model_home->getDetail($id);
        $this->data['content'] = 'home/test';
        $this->render('layout/admin_layout', $this->data);
        
    }
    public function test(){
        
        $this->render('layout/admin_layout', $this->data);
    }
   
}
?>