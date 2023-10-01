<?php
class Qlythongke extends Controller
{
    public $position;
    public $model_home;
    public $data = [];
    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
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
        $this->render('layout/admin_layout', $this->data);
    }
    public function sinhvien()
    {
       
        $sql_gender            = "SELECT
        SUM(CASE WHEN gender = 'nam' THEN 1 ELSE 0 END) AS SoLuongNam,
        SUM(CASE WHEN gender = 'nu' THEN 1 ELSE 0 END) AS SoLuongNu
    FROM
        student;";

        $sql_address           = "SELECT
        address,
        COUNT(*) AS SoLuongSinhVien
    FROM
        student
    GROUP BY
        address;";

        $sql_class             = "SELECT
        class,
        COUNT(*) AS SoLuongSinhVien
    FROM
        student
    GROUP BY
        class;";
        $this->data['gender']    = $this->model_home->query($sql_gender);
        $this->data['class']    = $this->model_home->query($sql_class);
        $this->data['address']    = $this->model_home->query($sql_address);
        // print_r($this->data['gender']);
        $this->data['content'] = 'staff/tkesinhvien';
        $this->render('layout/'.$this->position.'_layout', $this->data);

    }
    public function no(){

        $sql_no            = "SELECT
        SUM(CASE WHEN status = 'no' THEN cost ELSE 0 END) AS No,
        SUM(CASE WHEN status = 'thu du' THEN cost ELSE 0 END) AS DaThu
    FROM
        lastbill;";

        $sql_listsvno = "SELECT 
        s.id AS student_id, 
        s.name AS student_name, 
        lb.cost AS bill_cost,  
        lb.date AS bill_date,  
        lb.id AS bill_id,
        lb.description AS bill_desc
    FROM student s
    JOIN contract c ON s.id = c.studentid
    JOIN lastbill lb ON c.id = lb.contractid
    WHERE lb.status = 'No';";
     $this->data['no']    = $this->model_home->query($sql_no);
      $this->data['list']    = $this->model_home->query($sql_listsvno);
     $this->data['content'] = 'staff/tkno';

     $this->render('layout/'.$this->position.'_layout', $this->data);
    
    }
    
    public function test()
    {

        $this->render('layout/'.$this->position.'_layout', $this->data);
    }

}
?>