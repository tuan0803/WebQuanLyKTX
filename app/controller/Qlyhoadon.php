<?php
class Qlyhoadon extends Controller
{
    public $position;
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NvHoadon');
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
    public function listbill()
    {
        $sql = "SELECT lastbill.*,
        servicebill.id as servicebill_id,
        servicebill.id as electric_cost,
        servicebill.watercost as water_cost,
        servicebill.wificost as wifi_cost,
        servicebill.wastcost as wast_cost,
        contract.id AS contractid, 
        contract.cost AS cost_room, 
        student.id AS student_id, 
        student.name AS student_name, 
        room.name AS room_name
        FROM lastbill
        INNER JOIN servicebill ON servicebill.id = lastbill.serviceid
        INNER JOIN contract ON contract.id = lastbill.contractid
        LEFT  JOIN student ON student.id =  contract.studentid
        LEFT JOIN room ON room.id = servicebill.roomid
         ";
        $this->data['list'] = $this->model_home->query($sql);
        $this->data['content'] = 'staff/Nv_DShoadon';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }

    public function searchlastbill()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql = "SELECT 
            student.id AS student_id,
            student.name AS student_name,
            contract.id AS contractid,
            lastbill.id AS id,
            lastbill.date AS date,
            lastbill.cost AS cost,
            lastbill.description AS description,
            lastbill.status AS status,
             servicebill.id as servicebill_id,
            servicebill.id as electric_cost,
            servicebill.watercost as water_cost,
            servicebill.wificost as wifi_cost,
            servicebill.wastcost as wast_cost,
            contract.id AS contractid, 
            contract.cost AS cost_room,  
            room.name AS room_name
            FROM student
            INNER JOIN contract ON contract.studentid = student.id
            LEFT JOIN lastbill ON lastbill.contractid=contract.id
            INNER JOIN servicebill ON servicebill.id = lastbill.serviceid
            LEFT JOIN room ON room.id = servicebill.roomid
            WHERE  student.id Like'%$key%' or student.name like '%$key%'
         ";
             $list = $this->model_home->query($sql);
             $output = "";
             $i=1;
             foreach ($list as $list1) {
                $id = $list1['id'] ?? '';
                $contractid = $list1['contractid'] ?? '';
                $student_id = $list1['student_id'] ?? '';
                $student_name = $list1['student_name'] ?? '';
                $room_name = $list1['room_name'] ?? '';
                $servicebill_id = $list1['servicebill_id'] ?? '';
                $date = $list1['date'] ?? '';
                $cost = $list1['cost'] ?? '';
                $description = $list1['description'] ?? '';
                $status = "";
                if($list1['status'] =="1"){
                    $status="Thanh toán đủ";
                }else{
                    $status="Chưa thanh toán";
                }
                $output .= "
                <tr>
                    <td>" . $i++ . "</td>
                    <td>" . $id . "</td>
                    <td>" . $contractid . "</td>
                    <td>" . $student_id . "</td>
                    <td>" . $student_name . "</td>
                    <td>" . $room_name . "</td>
                    <td>" . $servicebill_id . "</td>
                    <td>" . $date . "</td>
                    <td>" . $cost . "</td>
                    <td>" . $description . "</td>
                    <td>" . $status . "</td>
                    <td><a id='edit_link' href='javascript:void(0);' onclick='showEditContract(" . $id . ")'><i class='bx bx-edit'></i></a></td>
                    </td>
                    <td> <a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyhopdong/delete/?contractId=" . $id . "' onclick='deleteRoom('" . $id . "')'>
                            <i class='bx bx-trash' style='color: red;'></i>
                        </a></td>
                </tr>
                ";
             }
             echo $output;

        }
    }
    public function suabill()
    {
        $request = new Request();
        $update   = $request->getFields();
        $id        = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('lastbill', $update, $condition);
        $this->data['content'] = 'staff/Nv_DShoadon';
        $response = new Response();
        $response->redirect("qlyhoadon/listbill");
    }
    public function showformthem()
    {
        $sql_student = "SELECT student.* FROM student";
        $sql_contract = "SELECT student.*, contract.cost as cost_room
        FROM student
        INNER JOIN contract ON contract.studentid=student.id";
        $sql_service = "SELECT servicebill.id as id,
        servicebill.electriccost as electric_cost,
        servicebill.watercost as water_cost,
        servicebill.wificost as wifi_cost,
        servicebill.wastcost as wast_cost,
        servicebill.totalcost as totalcost,
        servicebill.indivisualcost as cost,
        servicebill.date as date,
        room.name as roomname
        FROM servicebill
        INNER JOIN room ON room.id=servicebill.roomid
        ";
        $this->data['list_student'] = $this->model_home->query($sql_student);
        $this->data['list_contract'] = $this->model_home->query($sql_contract);
        $this->data['list_service'] = $this->model_home->query($sql_service);
        $this->data['content'] = 'staff/Nv_themhoadon';
        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
    public function showDetail()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $date = $_POST["date"];
            $sql = "SELECT student.id AS studentid,
            student.name AS studentname,
            servicebill.id AS serviceid,
         servicebill.electriccost AS electric_cost,
         servicebill.watercost AS water_cost,
        servicebill.wificost AS wifi_cost,
        servicebill.wastcost AS wast_cost,
     servicebill.totalcost AS totalcost,
        servicebill.indivisualcost AS indivisualcost,
        servicebill.date AS date,
        contract.id AS contractid,
           contract.cost AS contractcost,
           room.name AS roomname
            FROM student
            INNER JOIN contract ON contract.studentid = student.id
            INNER JOIN room ON room.id=contract.roomid
            INNER JOIN servicebill ON servicebill.roomid = room.id
            WHERE student.id LIKE '$key' AND servicebill.date LIKE '$date'
            ";


            $result = $this->model_home->query($sql);
            $output = "";
            foreach ($result as $list2) {
                $studentid = $list2['studentid'] ?? '';
                $studentname = $list2['studentname'] ?? '';
                $serviceid = $list2['serviceid'] ?? '';
                $electric_cost = $list2['electric_cost'] ?? '';
                $water_cost = $list2['water_cost'] ?? '';
                $wifi_cost = $list2['wifi_cost'] ?? '';
                $wast_cost = $list2['wast_cost'] ?? '';
                $cost = $list2['indivisualcost'] ?? '';
                $date = $list2['date'] ?? '';
                $contractid = $list2['contractid'] ?? '';
                $contractcost = $list2['contractcost'] ?? '';
                $roomname = $list2['roomname'] ?? '';
                $total_cost = $contractcost + $cost;


                $output .= "
                        <div class='mb-3' style='display: flex; gap: 2rem; padding: 10px;'>
                            <div>
                                <label style='font-size: 1.4rem;'>Nhập mã hóa đơn</label>
                                <input type='text' name='id' class='form-control' style=' font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label  style='font-size: 1.4rem;'>Mã sinh viên:</label>
                                <input type='text' class='studentid form-control' value=" . $studentid . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label  style='font-size: 1.4rem;'>Họ và tên</label>
                                <p type='text' class='form-control' style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>$studentname  </p>
                            </div>
                        </div>
                        <div class='mb-3' style='display: flex; gap: 2rem; padding: 10px;'>
                            <div>
                                <label style='font-size: 1.4rem;'>Mã hợp đồng</label>
                                <input type='text' class='studentid form-control' name='id'  value=" . $contractid . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Mã service</label>
                                <input type='text' class='studentid form-control' name='serviceid' value=" . $serviceid . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Phòng</label>
                                <p type='text' class='studentid form-control'  style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'> $roomname  </p>
                            </div>
                        </div>
                        <div class='mb-3' style='display: flex; gap: 2rem; padding: 10px;'>
                            <div>
                                <label  style='font-size: 1.4rem;'>Tháng thanh toán</label>
                                <input type='text' class='studentid form-control'  value=" . $date . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Tiền phòng</label>
                                <input type='text' class='studentid form-control'  value=" . $contractcost . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Tiền điện</label>
                                <input type='text' class='studentid form-control' value=" . number_format($electric_cost, 0) . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                        </div>
                        <div class='mb-3' style='display: flex; gap: 2rem; padding: 10px;'>
                            <div>
                                <label style='font-size: 1.4rem;'>Tiền nước</label>
                                <input type='text' class='studentid form-control'  value=" . number_format($water_cost, 0) . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Tiền mạng</label>
                                <input type='text' class='studentid form-control'  value=" . number_format($wifi_cost, 0) . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label  style='font-size: 1.4rem;'>Tiền rác</label>
                                <input type='text' class='studentid form-control'  value=" . number_format($wast_cost, 0)  . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                        </div>
                        <div class='mb-3' style='display: flex; gap: 2rem; padding: 10px;'>
                            <div>
                                <label style='font-size: 1.4rem;'>Tổng tiền dịch vụ</label>
                                <input type='text' class='studentid form-control'  value=" . number_format($cost, 0)  . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label style='font-size: 1.4rem;'>Tổng thanh toán</label>
                                <input type='text' class='studentid form-control' name='cost' value=" . number_format($total_cost, 0) . " style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                            <div>
                                <label  style='font-size: 1.4rem;'>Ngày thanh toán</label>
                                <input type='date' class='studentid form-control' name='date' style='max-width: 600px; font-size: 1.6rem; background: #F5F5F5;'>
                            </div>
                        </div>
                        <div class='mb-3' style='display: flex; gap: 3rem; padding: 10px;'>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='status' value='1' style='transform: scale(2); padding: 10px;'>
                                <label class='form-check-label' for='flexCheckDefault' style='font-size: 1.4rem;'>
                                    Thu đủ
                                </label>
                            </div>
                            <div>
                                <label for=' style='font-size: 1.4rem;'>Ghi chú</label>
                                <textarea name='description' class='form-control'   cols='60' rows='3' style='background: #F5F5F5;'></textarea>
                            </div>
                        </div>
                    ";
            }
            echo $output;
        }
    }
    public function themhoadon()
    {
        $request = new Request();
        $data    = $request->getFields();
        print_r($data);
        $this->model_home->insertData('lastbill', $data);
        $response = new Response();
        $response->redirect("qlyhoadon/listbill");
    }
    public function searchContract()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql_contract = "SELECT student.*, 
            contract.id as contractid,
            contract.cost as cost_room
            FROM student
            INNER JOIN contract ON contract.studentid=student.id 
            WHERE student.id like '$key'";
            $list_contract = $this->model_home->query($sql_contract);
            $output = "";
            $i = 1;
            foreach ($list_contract as $list2) {
                $id = $list2['id'] ?? '';
                $contractid = $list2['contractid'] ?? '';
                $cost_room = $list2['cost_room'] ?? '';
                $name = $list2['name'] ?? '';
                $output .= "
                    <tr>
                        <td>" . $i++ . "</td>
                        <td>" . $id . "</td>
                        <td> " . $name . "</td>
                        <td><input type='text' value=" . $contractid . " style=' width: auto; width: 70px;'></td>
                        <td><input type='text' value=" . number_format($cost_room, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    </tr>
                ";
            }
            echo $output;
        }
    }
    public function searchDate()
    {
        if (isset($_POST["id"])) {
            $key = $_POST["id"];
            $sql_contract = "SELECT servicebill.date as date
            FROM student
            INNER JOIN contract ON contract.studentid=student.id 
            LEFT JOIN servicebill ON servicebill.roomid=contract.roomid
            WHERE student.id like '%$key%' or student.name like '%$key%' or contract.id like '%$key%'";
            $list_date = $this->model_home->query($sql_contract);
            $output = "";
            foreach ($list_date as $list3) {
                $date = $list3['date'] ?? '';
                $output .= "
                    <option id='date' value=" . $date . " >" . $date . " </option>
                ";
            }
            echo $output;
        }
    }
    public function searchbill()
    {
        if (isset($_POST["date"])) {
            $key = $_POST["date"];
            $sql_service = "SELECT servicebill.id as id,
            servicebill.electriccost as electric_cost,
            servicebill.watercost as water_cost,
            servicebill.wificost as wifi_cost,
            servicebill.wastcost as wast_cost,
            servicebill.totalcost as totalcost,
            servicebill.indivisualcost as indivisualcost,
            servicebill.date as date
            FROM servicebill
            WHERE servicebill.date like '%$key%'
            ";
            $list_service = $this->model_home->query($sql_service);
            $output = '';
            $i = 1;
            foreach ($list_service as $list2) {
                $id = $list2['id'] ?? '';
                $electric_cost = $list2['electric_cost'] ?? '';
                $water_cost = $list2['water_cost'] ?? '';
                $wifi_cost = $list2['wifi_cost'] ?? '';
                $wast_cost = $list2['wast_cost'] ?? '';
                $totalcost = $list2['totalcost'] ?? '';
                $cost = $list2['indivisualcost'] ?? '';
                $date = $list2['date'] ?? '';
                $output .= "
                <tr>
                    <td><input type='text' value= " . $id . " style=' width: auto; width: 70px;' disabled></td>
                    <td>" . $date . "</td>
                    <td><input type='text' value=" . number_format($electric_cost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    <td><input type='text' value=" . number_format($water_cost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    <td><input type='text' value=" . number_format($wifi_cost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    <td><input type='text' value= " . number_format($wast_cost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    <td><input type='text' value= " . number_format($totalcost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                    <td><input type='text' value= " . number_format($cost, 0) . " style=' width: auto; width: 70px;' disabled></td>
                </tr>
            
                ";
            }
            echo $output;
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->model_home->deletebill($id);
        $this->listbill();
    }
    public function test()
    {

        $this->render('layout/'.$this->position.'_layout', $this->data);
    }
}
