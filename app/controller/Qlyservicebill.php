<?php
class Qlyservicebill extends Controller{
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('Servicebill');
    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/admin_layout', $this->data);
    }
    public function listservicebill(){
        $this->data['list'] = $this->model_home->all();
        $this->data['content'] = 'staff/servicecost';
        $this->render('layout/admin_layout', $this->data);
    }
    public function showformsua($id){
        $info               = $this->model_home->find($id);
        $this->data['info']   = $info;
        $this->data['content'] = 'staff/fixservice';
        $this->render('layout/admin_layout', $this->data);
    }
    public function deleteservicebill($id){
        $condiction = "id=$id";
        $this->model_home->deleteData("servicebill",$condiction);
        $this->listservicebill();

    }
    public function showformthem(){
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/admin_layout', $this->data);
    }
    public function themsb(){
        $request = new Request();
        $data    = $request->getFields();
        $oldelec = $data["electricnumold"];
        new
        $this->model_home->insertData('servicebill',$data);
        $response = new Response();
        $response->redirect("qlyservicebill/listservicebill");
    }
   
}
?>