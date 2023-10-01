<?php
class Student extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('SinhVien');
    }

    public function index(){
        $this->data['content'] = '';
        $this->render('layout/student_layout', $this->data);
    }
    public function detail($id=0){
        $this->data['info'] = $this->model_home->getDetail($id);
        $this->data['content'] = 'home/test';
        $this->render('layout/admin_layout', $this->data);
        
    }
    public function showcontract(){
        $ss = new Session();
        $user = $ss->data('user', '');
        $id   = $user['userid'];
        $sql  = "SELECT * FROM  contract WHERE studentid='$id'";
        $this->data['contract'] = $this->model_home->query($sql);
        $this->data['content'] = 'student/contractsd';
        $this->render('layout/student_layout', $this->data);
    }
    public function showinfo(){
        $ss = new Session();
        $user = $ss->data('user', '');
        $id   = $user['userid'];
        
        $this->data['list1'] = $this->model_home->find($id);
        
        $this->data['content'] = 'student/infostudent';
        $this->render('layout/student_layout', $this->data);
    }
    public function suasv(){
        $reques = new Request();
        $update = $reques->getFields();
        $id     = $update['id'];
        unset($update['id']);
        $condition = "id=$id";
        $this->model_home->updateData('student',$update,$condition);
        $this->showinfo();
    }
    public function listbill(){
        $ss = new Session();
        $user = $ss->data('user', '');
        $id   = $user['userid'];
        $sql  = "SELECT student.name, servicebill.roomid,servicebill.totalelectric,servicebill.totalwater,servicebill.electriccost,servicebill.watercost,servicebill.wificost,servicebill.wastcost,servicebill.totalcost,servicebill.indivisualcost, lastbill.*
        FROM student
        LEFT JOIN lastbill ON student.contractid = lastbill.contractid
        LEFT JOIN servicebill ON lastbill.serviceid = servicebill.id
        WHERE student.id = 3; ";
        $this->data['bill']=$this->model_home->query($sql);
        // print_r($this->data['bill']);
        $this->data['content'] = 'student/listbill';
        $this->render('layout/student_layout', $this->data);

    }
    public function test(){
        
        $this->render('layout/admin_layout', $this->data);
    }
    
   
}
?>