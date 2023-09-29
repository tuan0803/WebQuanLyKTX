<?php
class Studentnotif extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('Notif');
    }

    public function index(){
        $this->data['content'] = '';
        $this->render('layout/student_layout', $this->data);
    }
    public function listnotif(){
        $this->data['list']=$this->model_home->all();
        $this->data['content'] = "student/listthongbao";
        $this->render('layout/student_layout', $this->data);
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