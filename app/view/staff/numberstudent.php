
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Danh sách sinh viên</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
     <form style="padding-top: 150px; padding-left:200px;" method="post" action="">
     <table style="padding-left: 400px">
     <h2 style="padding-left: 350px;">Danh sách sinh viên</h2>
     <tr>
            <td><button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim">Tìm kiếm</button></td>
            <td><input style="border-radius: 5px;" type="text" name="txtid" placeholder="Hãy nhập thông tin"></td>
     </tr>
     </table>
        <table border=1 width=80% style="border: 1px solid #000;padding-left: 320px;">
        <tr style="background:  rgb(65,74,76); color:aliceblue;">
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Căn cước công dân</th>
                <th>Lớp</th>
                <th>Mã phòng</th>
                <th>Mã giường</th>
                <th>Mã hợp đồng</th>
            </tr>
            <?php
            foreach ($list as $list1) {
                $id       = $list1['id'] ?? '';
                $name     = $list1['name'] ?? '';
                
                $gender   = $list1['gender'] ?? '';
                $phone    = $list1['phone'] ?? '';
                $address  = $list1['address'] ?? '';
                $cccd   = $list1['cccd'] ?? '';
                $class    = $list1['class'] ?? '';
                $roomid = $list1['roomid'] ?? '';
                $bedid = $list1['bedid'] ?? '';
                $contractid = $list1['contractid'] ?? '';
                


                echo "<tr>";
                echo "<td>" . "<p>$id</p>" . "</td>";
                echo "<td>" . "<p>$name</p>" . "</td>";
                
                echo "<td>" . "<p>$gender</p>" . "</td>";
                echo "<td>" . "<p>$phone</p>" . "</td>";
                echo "<td>" . "<p>$address</p>" . "</td>";
                echo "<td>" . "<p>$cccd</p>" . "</td>";
                echo "<td>" . "<p>$class </p>" . "</td>";
                echo "<td>" . "<p>$roomid </p>" . "</td>";
                echo "<td>" . "<p>$bedid </p>" . "</td>";
                echo "<td>" . "<p>$contractid </p>" . "</td>";
                echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlysinhvien/showformsua/" . $id . "'>Sửa</a></td>";
                echo "<td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlysinhvien/deletesv/" . $id . "'>Xóa</a></td>";
            }
            ?>
        </table>
    </form>
</body>
</html>
