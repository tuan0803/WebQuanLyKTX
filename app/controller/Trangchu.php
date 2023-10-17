<?php
 class Trangchu extends Controller{
    public $model_home;
    public $data = [];
    public $position;
    public function __construct()
    {
        $this->model_home = $this->model('User');
        $this->getPosition();
    }
    public function getPosition()
    {
        $session        = new Session();
        $user           = $session->data('user');
        $this->position = $user["position"];
        
    }

    public function index(){
        $this->data['content'] = 'admin/home';
        $this->render('layout/admin_layout', $this->data);
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