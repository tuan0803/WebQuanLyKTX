<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/admin/css/listnv.css">
    <title>Document</title>
</head>
<body>
    <h2 align = "center" >Danh Sách Nhân Viên</h2>
    <?php
        echo "<table>";
        echo "<tr><th>ID</th><th>name</th><th>Chi tiết</th><th>Mã SV </th><th>Trạng thái</th></tr>";
        foreach ($list as $list1) {
            $id      = $list1['id'] ?? '';
            $name    = $list1['name'] ?? '';
            $fulldesc = $list1['fulldesc'] ?? '';
            $studentid    = $list1['studentid'] ?? '';
            


            echo "<tr>";
            echo "<td>" . "<p>$id</p>" . "</td>";
            echo "<td>" . "<p>$name</p>" . "</td>";
            echo "<td>" . "<p>$fulldesc</p>" . "</td>";
            echo "<td>" . "<p>$studentid</p>" . "</td>";
           

            
            echo "</tr>";
        }
        echo '</ul>';
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/staff/js/alert_delete.js"></script>
</body>
</html>