<?php
class Login extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('User');
    }

    public function index(){
        $this->data['content'] = 'home/login';
        $this->render('home/login', $this->data);   
    }
    public function checkuser(){
        $reques = new Request();
        $userrq   = $reques->getFields();
        $id     = "viet";
        print_r($userrq);
        
        $tmp= $this->model_home->all();
        print_r($tmp);
        print_r($this->model_home->find($id));
        if($userrq["password"]==$tmp["password"]){
            if ($tmp["position"]=="admin") {
                $this->render('layout/admin_layout', $this->data); 
            } elseif($tmp["position"]=="staff") {
                $this->render('layout/staff_layout', $this->data);
            }
            else {
                $this->render('layout/student_layout', $this->data);
            }
            
        }

    }

    
    
   
}
?>