<?php
class Login extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('User');
    }

    public function index(){
        $sessionData = new Session();
        $sessionData->delete('user');
        $this->data['content'] = 'home/login';
        $this->render('home/login', $this->data);   
    }
    public function checkuser(){
        $sessionData = new Session();
        $reques = new Request();
        $userrq   = $reques->getFields();
        $id     = $userrq["username"];
        
        
        $tmp= $this->model_home->find($id);
        
        
        if($userrq["password"]==$tmp["password"]){
            $sessionData->data('user', [
                'name'=>$id,
                'position'=>$tmp["position"],
                'userid'=>$tmp["userid"]
            ]);
            if ($tmp["position"]=="admin") {
                $this->render('layout/admin_layout', $this->data);
                
            } elseif($tmp["position"]=="staff") {
                $this->render('layout/staff_layout', $this->data);
            }
            else {
                $this->render('layout/student_layout', $this->data);
            }
            
        }
        else {
            $this->render('layout/guest_layout', $this->data);
        }

    }

    
    
   
}
?>