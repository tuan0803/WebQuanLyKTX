<?php
class Qlyhopdong extends Controller
{
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NvContract');
    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/staff_layout', $this->data);
    }
    public function listcontract()
    {
        $sql = "SELECT contract.*, student.name AS student_name FROM contract LEFT JOIN student on contract.studentid=student.id GROUP BY contract.studentid";
        $this->data['list'] = $this->model_home->query($sql);
        $sql_room = "SELECT room.id, room.name FROM room";
        $this->data['list_room'] = $this->model_home->query($sql_room);
        $this->data['content'] = 'staff/NV_DShopdong';
        $this->render('layout/staff_layout', $this->data);
    }
    public function suacontract()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id        = $update['id'];
        unset($update['id']);
        
        $condition = "id='$id'";
        $this->model_home->updateData('contract', $update, $condition);
        $this->data['content'] = 'staff/NV_DShopdong';
        $response = new Response();
        $response->redirect("qlyhopdong/listcontract");
    }
   
    public function showformthem()
    {
        $sql = "SELECT room.id, room.name FROM room";
        $this->data['list_room'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/Nv_Addcontract';
        $this->render('layout/staff_layout', $this->data);
    }

    public function showBed()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT bed.id FROM bed WHERE bed.roomid='$key'";
            $result = $this->model_home->query($sql);
            $output = '';
            foreach ($result as $rows) {
                $output .= '
                <option value=' . $rows["id"] . '>' . $rows["id"] . '</option>
                ';
            }
            echo $output;
        }
    }
    public function themcontract()
    {
        $request = new Request();
        $data    = $request->getFields();
        unset($data['name']);
        $this->model_home->insertData('contract', $data);
        $this->data['content'] = 'staff/NV_DShopdong';
        $response = new Response();
        $response->redirect("qlyhopdong/listcontract");
    }
    public function delete()
    {
        $id = $_GET['contractId'];
        $condition = "id='$id'";
        $this->model_home->deleteData('contract', $condition);
        $this->data['content'] = 'staff/NV_DShopdong';
        $response = new Response();
        $response->redirect("qlyhopdong/listcontract");
    }
    public function test()
    {
        $this->render('layout/admin_layout', $this->data);
    }
}
