<?php
class Qlyservicebill extends Controller{
    public $position;
    public $model_home;
    public $data = [];
    public function __construct(){
        $this->model_home = $this->model('Servicebill');
        $this->getPosition();
    }
    public function getPosition(){
        $session = new Session();
        $user    = $session->data('user');
        $this->position= $user["position"];
        
    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function listservicebill(){
        $this->data['list'] = $this->model_home->all();
        $this->data['content'] = 'staff/servicecost';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function showformsua($id){
        $info               = $this->model_home->find($id);
        $this->data['info']   = $info;
        $this->data['content'] = 'staff/fixservice';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function deleteservicebill($id){
        $condiction = "id=$id";
        $this->model_home->deleteData("servicebill",$condiction);
        $this->listservicebill();

    }
    public function showformthem(){
        $this->data['content'] = 'staff/updateservice';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function themsb(){ 
        $request = new Request();
        $data    = $request->getFields();
        $totalelectric = $data["electricnumnew"]-$data["electricnumold"];
        $totalwater = $data["waternumnew"]-$data["waternumold"];
        $electriccost  = 2500;
        $watercost     = 2000;
        $totalcost     = $totalelectric * $electriccost + $totalwater * $watercost + $data["wificost"] + $data["wastcost"];
        echo $totalcost;
        
        $roomid                = $data["roomid"];
        echo $roomid;
        $sql = "SELECT room.*,
        COUNT(CASE WHEN bed.status = 0 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus0,
        COUNT(CASE WHEN bed.status = 1 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus1
        FROM room
        LEFT JOIN bed ON room.id = bed.roomid
        WHERE room.id='$roomid';
        ";
        $roominfo              = $this->model_home->query($sql);
        foreach ($roominfo  as  $roominfo1 ) {
            $tv             = $roominfo1["SoLuongGiuongStatus1"];
        }
        
        $indivisualcost        = $totalcost / $tv;

        $data["watercost"] = $watercost;
        $data["totalelectric"] = $totalelectric;
        $data["electriccost"] = $watercost;
        $data["totalwater"] = $totalwater;
        $data["totalcost"]     = $totalcost;
        $data["indivisualcost"] = $indivisualcost;

        
        
        $this->model_home->insertData('servicebill',$data);
        $response = new Response();
        $response->redirect("qlyservicebill/listservicebill");
    }
   
}
?>