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
        echo "<tr><th></th><th colspan='10'>Hóa đơn dịch vụ</th><th colspan='7'>Hóa đơn tổng</th></tr>";
        echo "<tr><th>Tên</th><th>Mã phòng</th><th>Tháng</th><th>Số điện</th><th>Số nước</th><th>Điện/số</th><th>Nước/số</th><th>Wifi</th><th>Rác</th><th>Cả phòng</th><th>Mỗi người</th><th></th><th>id</th><th>Mã hợp đồng</th><th>Mã servicebill</th><th>Tổng </th><th>Ghi chú</th><th>Trạng thái</th></tr>";
        foreach ($bill as $bill1) {
            $name      = $bill1['name'] ?? '';
            $roomid    = $bill1['roomid'] ?? '';
            $totalelectric = $bill1['totalelectric'] ?? '';
            $totalwater    = $bill1['totalwater'] ?? '';
            $electriccost   = $bill1['electriccost'] ?? '';
            $watercost   = $bill1['watercost'] ?? '';
            $wastcost= $bill1['wastcost'] ?? '';
            $wificost= $bill1['wificost'] ?? '';
            $totalcost= $bill1['totalcost'] ?? '';
            $individualcost= $bill1['indivisualcost'] ?? '';
            $id= $bill1['id'] ?? '';
            $contractid= $bill1['contractid'] ?? '';
            $serviceid= $bill1['serviceid'] ?? '';
            $date= $bill1['date'] ?? '';
            $cost= $bill1['cost'] ?? '';
            $description= $bill1['description'] ?? '';
            $status= $bill1['status'] ?? '';


            // echo "<tr>";
            echo "<td>" . "<p>$name</p>" . "</td>";
            echo "<td>" . "<p>$roomid</p>" . "</td>";
            echo "<td>" . "<p>$date</p>" . "</td>";
            echo "<td>" . "<p>$totalelectric</p>" . "</td>";
            echo "<td>" . "<p>$totalwater </p>" . "</td>";
            echo "<td>" . "<p>$electriccost </p>" . "</td>";
            echo "<td>" . "<p>$watercost </p>" . "</td>";
            echo "<td>" . "<p>$wificost</p>" . "</td>";
            echo "<td>" . "<p>$wastcost</p>" . "</td>";
            echo "<td>" . "<p>$totalcost</p>" . "</td>";
            echo "<td>" . "<p>$individualcost</p>" . "</td>";
            echo "<td>" . "<p></p>" . "</td>";
            echo "<td>" . "<p>$id</p>" . "</td>";
            echo "<td>" . "<p>$contractid</p>" . "</td>";
            echo "<td>" . "<p>$serviceid</p>" . "</td>";
            
            echo "<td>" . "<p>$cost</p>" . "</td>";
            echo "<td>" . "<p> $description</p>" . "</td>";
            echo "<td>" . "<p>  $status</p>" . "</td>";


           

            
            echo "</tr>";
        }
        echo '</ul>';
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/staff/js/alert_delete.js"></script>
</body>
</html>