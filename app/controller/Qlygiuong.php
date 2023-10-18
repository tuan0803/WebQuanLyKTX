<?php
class Qlygiuong extends Controller
{
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NvGiuong');
    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/staff_layout', $this->data);
    }
    public function listbed()
    {
        $sql_bed = "SELECT bed.bedid as bedid, bed.status as bedstatus, bed.roomid as bedroom
        FROM bed";
        $sql_room = "SELECT room.id, room.name FROM room";
        $this->data['list_bed'] = $this->model_home->query($sql_bed);
        $this->data['list_room'] = $this->model_home->query($sql_room);
        $this->data['content'] = 'staff/NV_Giuong';
        $this->render('layout/staff_layout', $this->data);
    }
    public function showformedit($id = 1)
    {
        $detail = $this->model_home->find($id);
        $this->data['content'] = 'staff/NV_EditGiuong';
        $this->data['info']  = $detail;
        $this->render('layout/staff_layout', $this->data);
    }
    public function suagiuong()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id        = $update['bedid'];
        unset($update['bedid']);
        $condition = "bedid='$id'";
        $this->model_home->updateData('bed', $update, $condition);
        $this->data['content'] = 'staff/NV_NV_Giuong';
        $response = new Response();
        $response->redirect("qlygiuong/listbed");
    }


    public function showBed()
    {
        if (isset($_POST["roomId"])) {
            $key = $_POST["roomId"];
            $sql = "SELECT bed.bedid as bedid, bed.status as bedstatus, bed.roomid as roomid FROM bed WHERE bed.roomid='$key'";
            $list_bed = $this->model_home->query($sql);
            $output = '';
            foreach ($list_bed as $list2) {
                $bedid = $list2['bedid'];
                $bedroom = $list2['roomid'];
                $status = "";
                if ($list2['bedstatus'] == "1") {
                    $status = "Có người";
                } else {
                    $status = "Trống";
                }
                $output .= "
                <tr>
                    <td>
                    <p>" .  $bedid . "</p>
                    </td>
                    <td>
                    <p>" .  $status . "</p>
                    </td>
                    <td><a id='edit_link' href='http://localhost/WEBQUANLYKTX/qlygiuong/showformedit/$bedid' ><i class='bx bx-edit'></i></a></td>
                    <td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlygiuong/delete/?id=$bedid'> <i class='bx bx-trash' style='color: red;'></i></a></td>
                </tr>
                ";
            }

            echo $output;
        }
    }

    public function themgiuong()
    {
        $request = new Request();
        $data    = $request->getFields();
        $this->model_home->insertData('bed', $data);
        $this->data['content'] = 'staff/NV_Giuong';
        $response = new Response();
        $response->redirect("qlygiuong/listbed");
    }
    public function delete($id = 0)
    {
        $id = $_GET['id'];
        $this->model_home->deletebed($id);
        $this->data['content'] = 'staff/NV_Giuong';
        $response = new Response();
        $response->redirect("qlygiuong/listbed");
    }
    public function test()
    {
        $this->render('layout/admin_layout', $this->data);
    }
}
