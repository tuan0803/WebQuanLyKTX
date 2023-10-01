<?php
class Qlyreport extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('Report');
    }

    public function index(){
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/admin_layout', $this->data);
    }
    public function showthemrp(){
        $this->data['content'] = 'student/formreport';
        $this->render('layout/student_layout', $this->data);
    }
    public function detail($id=0){
        $this->data['info'] = $this->model_home->getDetail($id);
        $this->data['content'] = 'home/test';
        $this->render('layout/admin_layout', $this->data);
        
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
        $this->render('layout/student_layout', $this->data);
    }
    public function test(){
        
        $this->render('layout/admin_layout', $this->data);
    }
   
}
?>