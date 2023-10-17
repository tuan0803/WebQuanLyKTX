<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Qlynhanvien extends Controller
{
    public $position;
    public $model_home;
    public $data = [];

    public function __construct()
    {
        $this->model_home = $this->model('NhanVien');
        $this->getPosition();
    }
    public function getPosition()
    {
        $session        = new Session();
        $user           = $session->data('user');
        $this->position = $user["position"];

    }

    public function index()
    {
        $this->data['content'] = 'staff/dashboard_NV.php';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function listnv()
    {
        $this->data['list']    = $this->model_home->all();
        $this->data['content'] = 'admin/danhsachnv';
        $this->render('layout/' . $this->position . '_layout', $this->data);

    }
    public function deletenv($id = 0)
    {
        $this->model_home->deletenv($id);
        $this->listnv();

    }
    public function showformsua($id = 1)
    {

        $detail                = $this->model_home->find($id);
        $this->data['content'] = 'admin/suanv';
        $this->data['info']    = $detail;

        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function suanv()
    {
        $request = new Request();
        $update  = $request->getFields();
        $id      = $update['id'];
        unset($update['id']);
        $condition = "id='$id'";
        $this->model_home->updateData('staff', $update, $condition);
        $this->data['content'] = 'admin/danhsachnv';
        $response              = new Response();
        $response->redirect("qlynhanvien/listnv");
    }
    public function showformthem()
    {
        $this->data['content'] = 'admin/themnv';
        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function themnv()
    {
        $request = new Request();
        $data    = $request->getFields();
        print_r($data);
        $this->model_home->insertData('staff', $data);
        $response = new Response();
        $response->redirect("qlynhanvien/listnv");
    }
    public function test()
    {

        $this->render('layout/' . $this->position . '_layout', $this->data);
    }
    public function export()
    {
        $this->excel();
        

        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $data_export = $this->model_home->all();
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);


        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'Mã nhân viên')
            ->setCellValue('B1', 'Tên nhân viên')
            ->setCellValue('C1', 'Năm sinh')
            ->setCellValue('D1', 'Giới tính')
            ->setCellValue('E1', 'SĐT')
            ->setCellValue('F1', 'Địa chỉ')
            ->setCellValue('G1', 'Lương')
            ->setCellValue('H1', 'Tuổi')
            ->setCellValue('I1', 'Chức vụ');


        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $value['id']);
            $sheet->setCellValue('B' . $rowCount, $value['name']);
            $sheet->setCellValue('C' . $rowCount, $value['year']);
            $sheet->setCellValue('D' . $rowCount, $value['gender']);
            $sheet->setCellValue('E' . $rowCount, $value['phone']);
            $sheet->setCellValue('F' . $rowCount, $value['address']);
            $sheet->setCellValue('G' . $rowCount, $value['salary']);
            $sheet->setCellValue('H' . $rowCount, $value['old']);
            $sheet->setCellValue('I' . $rowCount, $value['position']);

            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':I' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "Nhanvien" . time() . ".xlsx";
        $writer->save($filename);
        // header("location:" . $filename);
        $this->listnv();

    }

}
?>