<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/admin/css/listnv.css">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<table>";
        echo "<tr><th>ID</th><th>name</th><th>Nam sinh</th><th>Gioi tinh</th><th>SĐT</th><th>Địa chỉ</th><th>Lương</th><th>Tuổi</th><th>Chức vụ</th><th colspan='2'>Lua chon</th></tr>";
        foreach ($list as $list1) {
            $id      = $list1['id'] ?? '';
            $name    = $list1['name'] ?? '';
            $year = $list1['year'] ?? '';
            $gender    = $list1['gender'] ?? '';
            $phone    = $list1['phone'] ?? '';
            $address    = $list1['address'] ?? '';
            $salary    = $list1['salary'] ?? '';
            $old    = $list1['old'] ?? '';
            $position    = $list1['position'] ?? '';


            echo "<tr>";
            echo "<td>" . "<p>$id</p>" . "</td>";
            echo "<td>" . "<p>$name</p>" . "</td>";
            echo "<td>" . "<p>$year</p>" . "</td>";
            echo "<td>" . "<p>$gender</p>" . "</td>";
            echo "<td>" . "<p>$phone</p>" . "</td>";
            echo "<td>" . "<p>$address</p>" . "</td>";
            echo "<td>" . "<p>$salary</p>" . "</td>";
            echo "<td>" . "<p>$old </p>" . "</td>";
            echo "<td>" . "<p>$position r</p>" . "</td>";

            echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/showformsua/" . $id . "'>Sửa</a></td>";
            echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/deletenv/" . $id . "'>Xóa</a></td>";
            echo "</tr>";
        }
        echo '</ul>';
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/staff/js/alert_delete.js"></script>
</body>
</html>