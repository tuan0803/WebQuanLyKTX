<?php
class Qlyphong extends Controller
{
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NvPhong');
    }

    public function index()
    {
        // $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/staff_layout', $this->data);
    }
    public function listphong()
    {
        $sql = "SELECT room.*,
        COUNT(CASE WHEN bed.status = 0 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus0,
        COUNT(CASE WHEN bed.status = 1 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus1
        FROM room
        LEFT JOIN bed ON room.id = bed.roomid
        GROUP BY room.id
        ";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/NV_DSphong';
        $this->render('layout/staff_layout', $this->data);
    }
    public function suaphong()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id        = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('room', $update, $condition);
        $this->data['content'] = 'staff/NV_DSphong';
        $response = new Response();
        $response->redirect("qlyphong/listphong");
    }
    public function themgiuong()
    {
        $request = new Request();
        $data    = $request->getFields();
        $this->model_home->insertData('bed', $data);
        $this->data['content'] = 'staff/NV_DSphong';
        $response = new Response();
        $response->redirect("qlyphong/listphong");
    }
    public function themphong()
    {
        $request = new Request();
        $data    = $request->getFields();
        $this->model_home->insertData('room', $data);
        $this->data['content'] = 'staff/NV_DSphong';
        $response = new Response();
        $response->redirect("qlyphong/listphong");
    }
    public function delete($id=0)
    {
        $id = $_GET['roomId'];
        $this->model_home->deleteRoom($id);
        $this->data['content'] = 'staff/NV_DSphong';
        $response = new Response();
        $response->redirect("qlyphong/listphong");
    }
    public function test()
    {
        $this->render('staff/staff_layout', $this->data);
    }
}
