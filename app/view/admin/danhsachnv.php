<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/listnv.css">
    <title>Document</title>
</head>

<body>
    <h2 align="center">Danh Sách Nhân Viên</h2>
    <h2 align="center">Danh Sách Nhân Viên</h2>
    <h2 align="center">Danh Sách Nhân Viên</h2>
    <form method="Post" action="<?php echo _WEB_ROOT?>/qlynhanvien/export"> 
    <button type="button" class="btn btn-outline-success" id="exportButton">Xuất excel</button>
</form>
    <?php
    echo "<table>";
    echo "<tr><th>ID</th><th>name</th><th>Nam sinh</th><th>Gioi tinh</th><th>SĐT</th><th>Địa chỉ</th><th>Lương</th><th>Tuổi</th><th>Chức vụ</th><th colspan='2'>Lua chon</th></tr>";
    foreach ($list as $list1) {
        $id       = $list1['id'] ?? '';
        $name     = $list1['name'] ?? '';
        $year     = $list1['year'] ?? '';
        $gender   = $list1['gender'] ?? '';
        $phone    = $list1['phone'] ?? '';
        $address  = $list1['address'] ?? '';
        $salary   = $list1['salary'] ?? '';
        $old      = $list1['old'] ?? '';
        $position = $list1['position'] ?? '';


        echo "<tr>";
        echo "<td>" . "<p>$id</p>" . "</td>";
        echo "<td>" . "<p>$name</p>" . "</td>";
        echo "<td>" . "<p>$year</p>" . "</td>";
        echo "<td>" . "<p>$gender</p>" . "</td>";
        echo "<td>" . "<p>$phone</p>" . "</td>";
        echo "<td>" . "<p>$address</p>" . "</td>";
        echo "<td>" . "<p>$salary</p>" . "</td>";
        echo "<td>" . "<p>$old </p>" . "</td>";
        echo "<td>" . "<p>$position </p>" . "</td>";

        echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/showformsua/" . $id . "'>Sửa</a></td>";
        echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/deletenv/" . $id . "'>Xóa</a></td>";
        echo "</tr>";
    }
    echo '</ul>';
    
    ?>
    <style>
        #exportButton {
            position: absolute;
            top: 150px;
            left: 1300px;
            
        }
    </style>

    <script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/alert_delete.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>