<?php
class Qlysinhvien extends Controller
{
    public $position;
    public $model_home;
    public $data = [];
    static public $id;
    public function __construct()
    {
        $this->model_home = $this->model('SinhVien');
        $this->getPosition();
    }
    public function getPosition(){
        $session = new Session();
        $user    = $session->data('user');
        $this->position= $user["position"];
        
    }
    public function index()
    {
        $this->listsv();

    }
    public function showformthem()
    {
        $this->data['content'] = 'staff/addstudent';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function themsv()
    {
        $request = new Request();
        $data    = $request->getFields();

        $this->model_home->insertData('student', $data);
        $response = new Response();
        $response->redirect("qlysinhvien/listsv");

    }
    public function showformsua($id = 1)
    {
        $detail                = $this->model_home->find($id);
        $this->data['content'] = 'staff/fixstudent';
        $this->data['info']    = $detail;
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function suasv()
    {
        $request   = new Request();
        $update    = $request->getFields();
        print_r($update);
        $id        = $update["id"];
        $condition = "id=$id";
        unset($update["id"]);
        $this->model_home->updateData("student", $update, $condition);
        $response = new Response();
        $response->redirect("qlysinhvien/listsv");
    }
    public function deletesv($id = 0)
    {
        $condition = "id=$id";
        $this->model_home->deleteData("student", $condition);
        $this->listsv();

    }
    public function listsv()
    {
        $this->data['list']    = $this->model_home->all();
        $this->data['content'] = 'staff/numberstudent';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }

}
?>