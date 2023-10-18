<?php
class Qlyhopdong extends Controller
{
    public $position;
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NvContract');
        $this->getPosition();
    }
    public function getPosition()
    {
        $session = new Session();
        $user    = $session->data('user');
        $this->position = $user["position"];
    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function listcontract()
    {
        $sql = "SELECT
        contract.*,
        student.name AS student_name,
        room.name AS roomname
    FROM contract
    INNER JOIN student ON contract.studentid = student.id
    LEFT JOIN room ON room.id = contract.roomid";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/NV_DShopdong';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function showformsua($id = 1)
    {
        $sql_contract = $this->model_home->find($id);
        $sql_student1 = "SELECT student.* FROM contract INNER JOIN student ON student.id=contract.studentid WHERE contract.id='$id'";
        $sql_room = "SELECT room.id as roomid, room.name as roomname FROM room";
        $sql_student = "SELECT student.* FROM student";
        $this->data['content'] = 'staff/NV_EditContract';
        $this->data['info']  = $sql_contract;
        $this->data['list_student'] = $this->model_home->query($sql_student);
        $this->data['list_student1'] = $this->model_home->query($sql_student1);
        $this->data['list_room'] = $this->model_home->query($sql_room);
        $this->render('layout/staff_layout', $this->data);
    }

    public function suacontract()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('contract', $update, $condition);
        $this->data['content'] = 'staff/NV_DShopdong';
        $response = new Response();
        $response->redirect("qlyhopdong/listcontract");
    }

    public function showformthem()
    {
        $sql_room = "SELECT room.id, room.name FROM room";
        $sql_student = "SELECT student.* FROM student";
        $this->data['list_student'] = $this->model_home->query($sql_student);
        $this->data['list_room'] = $this->model_home->query($sql_room);
        $this->data['content'] = 'staff/Nv_Addcontract';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }

    public function showBed()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT bed.bedid FROM bed WHERE bed.roomid='$key' AND bed.status=0";
            $result = $this->model_home->query($sql);
            $output = '';
            foreach ($result as $rows) {
                $output .= '
                <option value=' . $rows["bedid"] . '> ' . $rows["bedid"] . '</option>
                ';
            }
            echo $output;
        }
    }
    public function showCost()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT room.cost as roomcost FROM room WHERE room.id='$key'";
            $result = $this->model_home->query($sql);
            $output = '';
            foreach ($result as $rows) {
                $output .= "
                <input type='number' name='cost' value=" . $rows['roomcost'] . "  disabled readonly>
                ";
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
        $data1    = $request->getFields();
        unset($data1['id']);
        unset($data1['name']);
        unset($data1['studentid']);
        unset($data1['startdate']);
        unset($data1['finishdate']);
        unset($data1['cost']);
        unset($data1['codcost']);
        unset($data1['status']);
        unset($data1['description']);
        unset($data1['bedid']);
        $bedid = $data1['bedid'];
        $condition = "bedid='$bedid'";
        $this->model_home->updateData('contract', $data1, $condition);
        $this->data['content'] = 'staff/NV_DShopdong';
        $response = new Response();
        $response->redirect("qlyhopdong/listcontract");
    }
    public function searchcontract()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT contract.*, student.name AS student_name FROM contract  LEFT JOIN student on contract.studentid=student.id WHERE student.id LIKE '%$key%' or student.name LIKE '%$key%'";
            $list = $this->model_home->query($sql);
            $output = '';
            $i = 1;
            foreach ($list as $list1) {
                $id = $list1['id'] ?? '';
                $studentid = $list1['studentid'] ?? '';
                $studentname = $list1['student_name'] ?? '';
                $startdate = $list1['startdate'] ?? '';
                $finishdate = $list1['finishdate'] ?? '';
                $status = $list1['status'] ?? '';
                $description = $list1['description'] ?? '';
                $roomid = $list1['roomid'] ?? '';
                $bedid = $list1['bedid'] ?? '';
                $cost = $list1['cost'] ?? '';
                $output .= "
                    <tr>
                        <td>" . $i++ . "</td>
                        <td>" . $id . "</td>
                        <td>" . $studentid . "</td>
                        <td>" . $studentname . "</td>
                        <td>" . $startdate . "</td>
                        <td>" . $finishdate . "</td>
                        <td>" . $status . "</td>
                        <td style='width: 80px;'>" . $description . "</td>
                        <td>" . $roomid . "</td>
                        <td>" . $bedid . "</td>
                        <td>" . $cost . "</td>
                        <td><a id='edit_link' href='http://localhost/WEBQUANLYKTX/qlyhopdong/showformsua/" . $id . "' onclick='showEditContract(" . $id . ")'><i class='bx bx-edit'></i></a></td>
                        </td>
                        <td> <a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyhopdong/delete/?contractId=" . $id . "' onclick='deleteRoom(" . $id . ")'>
                                <i class='bx bx-trash' style='color: red;'></i>
                            </a></td>
                    </tr>
                ";
            }
            echo $output;
        }
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
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    //chuyển phòng
    public function movephong()
    {
        $sql = "SELECT contract.*,
        contract.id as contractid,
        student.id AS studentid,
        student.name AS student_name,
        room.name as roomname,
        contract.bedid as bedid
        FROM contract
        LEFT JOIN student on contract.studentid=student.id
        INNER JOIN room on contract.roomid=room.id
        GROUP BY contract.studentid";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/NV_Movephong';
        $this->render('layout/staff_layout', $this->data);
    }
    public function searchmove()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT contract.*,
            contract.id as contractid,
            student.id AS studentid,
            student.name AS student_name,
            room.name as roomname,
            contract.bedid as bedid
            FROM student
            LEFT JOIN contract on contract.studentid=student.id
            INNER JOIN room on contract.roomid=room.id
            WHERE student.id LIKE '%$key%' or student.name LIKE '%$key%' ";
            $list = $this->model_home->query($sql);
            $output = '';
            $i = 1;
            foreach ($list as $list1) {
                $id = $list1['contractid'] ?? '';
                $studentid = $list1['studentid'] ?? '';
                $student_name = $list1['student_name'] ?? '';
                $roomname = $list1['roomname'] ?? '';
                $bedid = $list1['bedid'] ?? '';
                $output .= "
                    <tr>
                        <td>" . $i . "</td>
                        <td>" . $studentid . "</td>
                        <td>" . $student_name . "</td>
                        <td>" . $roomname . "</td>
                        <td>" .  $bedid . "</td>
                        <td><a id='edit_link' href='http://localhost/WEBQUANLYKTX/qlyhopdong/showformmove/" . $id . "' onclick='showEditContract(" . $id . ")'><i class='bx bx-edit'></i></a></td>
                        </td>
                    </tr>
                ";
            }
            echo $output;
        }
    }
    public function showformmove($id = 1)
    {
        $sql = "SELECT contract.*,
        contract.id as contractid,
        student.id AS studentid,
        student.name AS student_name,
        room.name as roomname,
        contract.bedid as bedid
        FROM contract
        LEFT JOIN student on contract.studentid=student.id
        INNER JOIN room on contract.roomid=room.id
        
        WHERE contract.id='$id'";
        $this->data['list'] = $this->model_home->query($sql);
        $sql_room = "SELECT room.id as roomid, room.name as roomname FROM room";
        $this->data['list_room'] = $this->model_home->query($sql_room);
        $this->data['content'] = 'staff/NV_Editmovephong';
        $this->render('layout/staff_layout', $this->data);
    }
    public function editmovephong()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id = $update['id'];
        unset($update['id']);
        unset($update['status']);
        $condition = "id='$id'";
        $this->model_home->updateData('contract', $update, $condition);
        $update2   = $request->getFields();
        $bedid = $update2['bedid'];
        unset($update2['id']);
        unset($update2['bedid']);
        $condition2 = "bedid='$bedid'";
        $this->model_home->updateData('bed', $update2, $condition2);
        $this->movephong();
    }
    public function updatebed()
    {
        if (isset($_POST["bedid"])) {
            $key = $_POST["bedid"];
            $idRoom = $_POST["idRoom"];
            $status = $_POST["status"];
            $sql = "UPDATE bed SET status='$status', roomid='$idRoom' WHERE bedid ='$key'";
            $this->model_home->query($sql);
        }
    }

    //gia hạn hợp dồng
    public function giahancontract()
    {
        $sql = "SELECT contract.*,
        contract.id as contractid,
        student.id AS studentid,
        student.name AS student_name
        FROM student
        LEFT JOIN contract on contract.studentid=student.id
        INNER JOIN room on contract.roomid=room.id";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/NV_giaHanHD';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }

    public function EditcontractGH()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('contract', $update, $condition);
        $this->giahancontract();
    }
    public function searchcontractGH()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT contract.*,
            contract.id as contractid,
            student.id AS studentid,
            student.name AS student_name
            FROM student
            LEFT JOIN contract on contract.studentid=student.id
            INNER JOIN room on contract.roomid=room.id
            WHERE student.id LIKE '%$key%' or student.name LIKE '%$key%' ";
            $list = $this->model_home->query($sql);
            $output = '';
            $i = 1;
            foreach ($list as $list1) {
                $id = $list1['id'] ?? '';
                $studentid = $list1['studentid'] ?? '';
                $studentname = $list1['student_name'] ?? '';
                $startdate = $list1['startdate'] ?? '';
                $finishdate = $list1['finishdate'] ?? '';
                $status = $list1['status'] ?? '';
                $description = $list1['description'] ?? '';
                $roomid = $list1['roomid'] ?? '';
                $bedid = $list1['bedid'] ?? '';
                $cost = $list1['cost'] ?? '';
                $output .= "
                    <tr>
                        <td>" . $i . "</td>
                        <td>" . $id . "</td>
                        <td>" . $studentid . "</td>
                        <td>" . $studentname . "</td>
                        <td>" . $startdate . "</td>
                        <td>" .  $finishdate . "</td>
                        <td>" .  $status . "</td>
                        <td><a id='edit_link' href='javascript:void(0);' onclick='showEditcontractGH(`$id`)'><i class='bx bx-edit'></i></a></td>
                                
                    </tr>
                    <form action='<?php echo _WEB_ROOT ?>/qlyhopdong/EditcontractGH' method='post'>
                        <div id='Edit-contractGH-$id' class='modal' tabindex='-1' role='dialog' style='display: none; margin-top: 10%;'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Gia hạn hợp đồng " . $id  . "</h5>
                                        <input type='hidden' value='" . $id . "' name='id'>
                                        <button type='button' onclick='hidenEditcontractGH(" . $id . ")' class='close' data-dismiss='modal' aria-label='Close' style='outline: none; background: red;'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='mb-3'>
                                            <label for='finishdate' class='form-label'>Chọn ngày mới</label>
                                            <input type='date' id='finishdate' name='finishdate' class='form-control'>
                                        </div>
                                        <div class='mb-3'>
                                            <input type='hidden' id='studentid' name='studentid' value='" . $studentid . "'\class='form-control'>
                                            <input type='hidden' id='startdate' name='startdate' value='" . $startdate . "' class='form-control'>
                                            <input type='hidden' id='description' name='description' value='" . $description . "' class='form-control'>
                                            <input type='hidden' id='roomid' name='roomid' value='" . $roomid . "' class='form-control'>
                                            <input type='hidden' id='bedid' name='bedid' value='" . $bedid . "' class='form-control'>
                                            <input type='hidden' id='cost' name='cost' value='" . $cost . "' class='form-control'>
                                            <input type='hidden' id='status' name='status' value='1' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='submit' class='btn btn-primary'>Lưu</button>
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
}
