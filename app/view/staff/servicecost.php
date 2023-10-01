
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Phí dịch vụ</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
     <form style="padding-top: 150px; padding-left:50px;" method="post" action="">
     <table style="padding-left: 400px">
            <tr>
                <td colspan="2" style="padding-left: 370px;"><h2>Phí dịch vụ</h2></td>
            </tr>
            <tr>
            <td>
           
            <button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim">Tìm kiếm</button></td>
            <td><input style="border-radius: 10px;" type="text" name="txtid" placeholder="Hãy nhập mã hóa đơn"></td>
            
            </tr>
      </table>
        <table  border=1 width=150% style="border: 1px solid #000; padding-left: 320px; padding-top:300px;">
        <tr style="background: rgb(65,74,76); color:aliceblue;">
                
                <th>Mã hóa đơn</th>
                <th>Mã phòng</th>
                <th>Thời hạn</th>
                <th>Số điện cũ</th>
                <th>Số điện mới</th>
                <th>Số nước cũ</th>
                <th>Số nước mới</th>
                <th>Số điện đã dùng</th>
                <th>Số nước đã dùng</th>
                <th>Tiền điện</th>
                <th>Tiền nước</th>
                <th>Tiền mạng</th>
                <th>Tiền vệ sinh</th>
                <th>Tổng tiền</th>
                <th>Mỗi cá nhân</th>
                
            </tr>
            
            <?php
            foreach ($list as $list1) {
                $id       = $list1['id'] ?? '';
                $roomid    = $list1['roomid'] ?? '';
                $date     = $list1['date'] ?? '';
                $electricnumold  = $list1['electricnumold'] ?? '';
                $electricnumnew   = $list1['electricnumnew'] ?? '';
                $waternumold  = $list1['waternumold'] ?? '';
                $waternumnew   = $list1['waternumnew'] ?? '';
                $totalelectric    = $list1['totalelectric'] ?? '';
                $totalwater = $list1['totalwater'] ?? '';
                $electriccost      = $list1['electriccost'] ?? '';
                $watercost = $list1['watercost'] ?? '';
                $wificost      = $list1['wificost'] ?? '';
                $wastcost= $list1['wastcost'] ?? '';
                $totalcost = $list1['totalcost'] ?? '';
                $indivisualcost = $list1['indivisualcost'] ?? '';


                echo "<tr>";
                echo "<td>" . "<p>$id</p>" . "</td>";
                echo "<td>" . "<p>$roomid </p>" . "</td>";
                echo "<td>" . "<p>$date</p>" . "</td>";
                echo "<td>" . "<p>$electricnumold </p>" . "</td>";
                echo "<td>" . "<p>$electricnumnew</p>" . "</td>";
                echo "<td>" . "<p>$waternumold</p>" . "</td>";
                echo "<td>" . "<p>$waternumnew </p>" . "</td>";
                echo "<td>" . "<p>$totalelectric </p>" . "</td>";
                echo "<td>" . "<p>$totalwater</p>" . "</td>";
                echo "<td>" . "<p>$electriccost </p>" . "</td>";
                echo "<td>" . "<p>$watercost </p>" . "</td>";
                echo "<td>" . "<p>$wificost</p>" . "</td>";
                echo "<td>" . "<p>$wastcost</p>" . "</td>";
                echo "<td>" . "<p>$totalcost </p>" . "</td>";
                echo "<td>" . "<p>$indivisualcost</p>" . "</td>";
                

                echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyservicebill/showformsua/" . $id . "'>Sửa</a></td>";
                echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyservicebill/deleteservicebill/" . $id . "'>Xóa</a></td>";
            }
                    echo "</tr>";
            ?>
           
        </table>
    </form>
</body>
</html>
