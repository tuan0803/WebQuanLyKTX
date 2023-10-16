<?php
class Qlyreport extends Controller{
    public $position;
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('Report');
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
    public function showthemrp(){
        $this->data['content'] = 'student/formreport';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function detail($id=0){
        $this->data['info'] = $this->model_home->getDetail($id);
        $this->data['content'] = 'home/test';
        $this->render('layout/'.$this->position.'_layout', $this->data);
        
    }
    public function saverp(){
        $ss = new Session();
        $user = $ss->data('user', '');
        $id   = $user['userid'];
        $request = new Request();
        $info    = $request->getFields();
        $info['studentid'] = $id;
        $this->model_home->insertData('report', $info);

    }
    public function listreport(){
        $ss = new Session();
        $user = $ss->data('user', '');
        $id   = $user['userid'];
        $sql                   = "SELECT * FROM report WHERE studentid=$id";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'student/listreport';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function listreport_nv(){
        echo $this->position;
        if($this->position=='staff'||$this->position=='admin'){
            $this->data['list'] = $this->model_home->all();
            $this->data['content'] = 'staff/listReport_nv';
            $this->render('layout/'.$this->position.'_layout', $this->data);
        }
        else{
            $this->listreport();
        }
    }
    public function deletereport($id){
        if($this->position=="staff"||$this->position=="admin"){
            $condiction = "id='$id'";
            $this->model_home->deleteData("report", $condiction);
            $this->listreport_nv();
        }
        else {
            $this->listreport();
        }
        
    }

    public function wait($id){
        if($this->position=="staff"||$this->position=="admin"){
            $sql = "UPDATE report
            SET status = 0
            WHERE id='$id';
            ";
            $this->model_home->query($sql);
            $this->listreport_nv();
        }
        else {
            $this->listreport();
        }
    }
    public function fixing($id){
        if($this->position=="staff"||$this->position=="admin"){
            $sql = "UPDATE report
            SET status = 1
            WHERE id='$id';
            ";
            $this->model_home->query($sql);
            $this->listreport_nv();
        }
        else {
            $this->listreport();
        }
    }
    public function fixed($id){
        if($this->position=="staff"||$this->position=="admin"){
            $sql = "UPDATE report
            SET status = 2
            WHERE id='$id';
            ";
            $this->model_home->query($sql);
            $this->listreport_nv();
        }
        else {
            $this->listreport();
        }
    }
    
    public function test(){
        
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
   
}
?>