<?php
class Qlynotif extends Controller
{
    public $position;
    public $userid;
    public $model_home;
    public $data = [];
    public function __construct()
    {
        $this->model_home = $this->model('Notif');
        $this->getPosition();
    }
    public function getPosition()
    {
        $session        = new Session();
        $user           = $session->data('user');
        $this->position = $user["position"];
        $this->userid   = $user["userid"];

    }

    public function index()
    {
        $this->data['content'] = '';
        $this->render('layout/student_layout', $this->data);
    }
    public function listnotif()
    {
        if ($this->position == "admin") {
            $this->data['list']    = $this->model_home->all();
            $this->data['content'] = "staff/Nv_notif";
            $this->render('layout/admin_layout', $this->data);
        } elseif ($this->position == "staff") {
            $sql                   = "SELECT * FROM notif WHERE idstaff='$this->userid'";
            $this->data['list']    = $this->model_home->all();
            $this->data['content'] = "staff/Nv_notif";
            $this->render('layout/staff_layout', $this->data);
        } else {
            $this->data['list']    = $this->model_home->all();
            $this->data['content'] = "student/listthongbao";
            $this->render('layout/student_layout', $this->data);
        }
        
    }
    public function detail($id = 0)
    {
        $this->data['info']    = $this->model_home->getDetail($id);
        $this->data['content'] = 'home/test';
        $this->render('layout/admin_layout', $this->data);
    }
    public function test()
    {

        $this->render('layout/admin_layout', $this->data);
    }
    public function delete($id = 0)
    {
        $condiction = "id = '$id'";
        $this->model_home->deleteData("notif",$condiction);
        $this->listnotif();
    }
    public function updateNotif(){
        $request = new Request();
        $update = $request->getFields();
        // print_r($update);
        $id = $update["id"];
        $condiction = "id='$id'";
        unset($update["id"]);
        $this->model_home->updateData("notif", $update, $condiction);
        $this->listnotif();

    }
    public function insertNotif(){
        $request = new Request();
        $insert = $request->getFields();
        $insert["id"] = "null";
        
        $this->model_home->insertData("notif", $insert);
        $this->listnotif();
    }

}
?>