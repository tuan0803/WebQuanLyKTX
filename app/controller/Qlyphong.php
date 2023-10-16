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
        $this->data['content'] = 'staff/dashboard_NV.php';
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
    public function searchroom()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql_room = "SELECT room.*,
            COUNT(CASE WHEN bed.status = 0 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus0,
            COUNT(CASE WHEN bed.status = 1 THEN 1 ELSE NULL END) AS SoLuongGiuongStatus1
            FROM room
            LEFT JOIN bed ON room.id = bed.roomid
            WHERE room.id like '%$key%' or room.name like '%$key%'";
            $list = $this->model_home->query($sql_room);
            $output = "";
            $i = 1;
            foreach ($list as $list1) {
                $id = $list1['id'] ?? '';
                $name = $list1['name'] ?? '';
                $currentquantity = $list1['SoLuongGiuongStatus1'] ?? '';
                $status = "";
                $maxquantity = $list1['SoLuongGiuongStatus0'] ?? '';
                if ($currentquantity == $maxquantity) {
                    $status = "<i class='bx bxs-circle' style='color: red;'></i>";
                } else {
                    $status = "<i class='bx bxs-circle' style='color: green;'></i>";
                }
                $output .= "
                <tr>
                    <td>" . $i . "</td>
                    <td>" . $id . "</td>
                    <td>" . $name . "</td>
                    <td>" . $currentquantity . '/' . $maxquantity . "</td>
                    <td>" . $status . "</td>
                    <td><a id='edit_link' href='javascript:void(0);' onclick='showEditRoom(`$id`)'><i class='bx bx-edit'></i></a></td>
                    </td>
                
                    <td> <a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyphong/delete/?roomId=$id' onclick='deleteRoom(" . $id . ")'>
                            <i class='bx bx-trash' style='color: red;'></i>
                        </a></td>
                    </td>
                </tr>
                <form action='http://localhost/WEBQUANLYKTX/qlyphong/suaphong' method='post'>
                    <div id='Edit-room-$id ' class='modal' tabindex='-1' role='dialog' style='display: none; margin-top: 10%;'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Sửa thông tin phòng " . $name . "</h5>
                                    <input type='hidden' value=" . $id . " name='id'>
                                    <button type='button' onclick='hidenEditRoom(" . $id . ")' class='close' data-dismiss='modal' aria-label='Close' style='outline: none; background: red;'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <div class='mb-3'>
                                        <label for='nameRoom' class='form-label'>Tên Phòng</label>
                                        <input type='text' id='nameRoom' name='name' value=" . $name . " class='form-control'>
                                    </div>
                                    <div class='mb-3'>
                                        <input type='hidden' id='maxquantity' name='maxquantity' value=" . $maxquantity . " class='form-control'>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <a  class='btn btn-primary'>Lưu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                ";
            }
            echo $output;
        }
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
    public function themphong()
    {
        $request = new Request();
        $data    = $request->getFields();
        $this->model_home->insertData('room', $data);
        $this->data['content'] = 'staff/NV_DSphong';
        $response = new Response();
        $response->redirect("qlyphong/listphong");
    }
    public function delete($id = 0)
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
