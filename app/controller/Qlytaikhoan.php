<?php
class Qlytaikhoan extends Controller
{
    private $tmp;
    private $position;
    private $model_home;
    public $data = [];

    private $userid;
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
        $this->userid   = $user["userid"];
    }
    public function index()
    {
        $this->data['content'] = '';
        $this->render('layout/student_layout', $this->data);
    }
    public function liststaff(){
        $this->listaccount("staff");
    }
    public function liststudent(){
        $this->listaccount("student");
    }
    public function listaccount($type)
    {
        $this->tmp = $type;
        $sql                   = "SELECT * FROM user WHERE position='".$type."'";
        $this->data['list']          = $this->model_home->query($sql);
        
        $this->data['content'] = "staff/staff_user";
        $this->render('layout/'.$this->position.'_layout', $this->data);

    }

    public function deleteaccount($username){
        $condiction = "username='$username'";
        $info       = $this->model_home->find($username);

        $this->model_home->deleteData("user", $condiction);
        $this->listaccount($info["position"]);
    }

    public function updateaccount(){
        $request = new Request();
        $update = $request->getFields();
        
        $username = $update["username"];
        $condiction = "username='$username'";
        unset($update["username"]);
        $this->model_home->updateData("user", $update, $condiction);
        
        $this->listaccount($update["position"]);
    }
    public function addaccount(){
        $request = new Request();
        $insert = $request->getFields();
        $this->model_home->insertData("user", $insert);
        $this->listaccount($insert["position"]);
    }
}
?>