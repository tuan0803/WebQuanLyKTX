<?php
class Qlynhanvien extends Controller{
    public $position;
    public $model_home;
    public $data = [];
    
    public function __construct(){
        $this->model_home = $this->model('NhanVien');
        $this->getPosition();
    }
    public function getPosition(){
        $session = new Session();
        $user    = $session->data('user');
        $this->position= $user["position"];
        
    }

    public function index(){
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function listnv(){
        $this->data['list'] = $this->model_home->all();
        $this->data['content'] = 'admin/danhsachnv';
        $this->render('layout/'.$this->position.'_layout', $this->data);
        
    }
    public function deletenv($id=0){
        $this->model_home->deletenv($id);
        $this->listnv();
        
    }
    public function showformsua($id=1){
        
        $detail                  = $this->model_home->find($id);
         $this->data['content'] = 'admin/suanv';
        $this->data['info']  = $detail;
        
         $this->render('layout/'.$this->position.'_layout', $this->data);  
     }
    public function suanv(){
        $request = new Request();
        $update   = $request->getFields();
        $id        = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('staff',$update,$condition);
        $this->data['content'] = 'admin/danhsachnv';
        $response = new Response();
        $response->redirect("qlynhanvien/listnv");  
    }
    public function showformthem(){
         $this->data['content'] = 'admin/themnv';
         $this->render('layout/'.$this->position.'_layout', $this->data);  
     }
     public function themnv(){
        $request = new Request();
        $data    = $request->getFields();
        print_r($data);
        $this->model_home->insertData('staff',$data);
        $response = new Response();
        $response->redirect("qlynhanvien/listnv");  
     }
    public function test(){
        
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
   
}
?>