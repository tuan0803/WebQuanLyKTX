<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/admin/css/listnv.css">
    <title>Document</title>
</head>
<body>
    <h2 align = "center" >Danh Sách Nhân Viên</h2>
    <?php
        echo "<table>";
        echo "<tr><th>Thời gian</th><th>Loại lỗi</th><th>Chi tiết</th><th>Id SV</th><th>Trại thái</th><th colspan='2'>Lua chon</th></tr>";
        
        foreach ($list as $list1) {
            $id      = $list1['id'] ?? '';
            $name    = $list1['name'] ?? '';
            
            $fulldesc   = $list1['fulldesc'] ?? '';
            $studentid    = $list1['studentid'] ?? '';
            if($list1['status']==0){
                $status = "chưa xử lý";
            }elseif ($list1['status']==1) {
                $status = "đang xử lý";
            }
            elseif ($list1['status']==2){
                $status = "đã xử lý";
            }
            else {
                $status = "###";
            }
            
            


            echo "<tr>";
            echo "<td>" . "<p>$id</p>" . "</td>";
            echo "<td>" . "<p>$name</p>" . "</td>";
            echo "<td>" . "<p>$fulldesc </p>" . "</td>";
            echo "<td>" . "<p>$studentid</p>" . "</td>";
            echo "<td>" . "<p>$status</p>" . "</td>";
            

            echo "<td>
            <div class='dropdown'>
            <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
              Cập nhập trạng thái
            </button>
            <ul class='dropdown-menu'>
              <li><a class='dropdown-item' href='http://localhost/WEBQUANLYKTX/qlyreport/wait/" . $id . "'>Chưa xử lý</a></li>
              <li><a class='dropdown-item' href='http://localhost/WEBQUANLYKTX/qlyreport/fixing/" . $id . "'>Đang xử lý</a></li>
              <li><a class='dropdown-item' href='http://localhost/WEBQUANLYKTX/qlyreport/fixed/" . $id . "'>Đã xử lý</a></li>
            </ul>
          </div>
          </td>";
            echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyreport/deletereport/" . $id . "'>Xóa</a></td>";
            echo "</tr>";
        }
        echo '</ul>';
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/staff/js/alert_delete.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>