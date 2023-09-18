<?php
$con = mysqli_connect('localhost', 'root', '', 'qlkytuc')
  or die('Lỗi kết nối');
if (isset($_POST['buttonCapnhat'])) 
{
  $id = $_POST['txtid'];
  $roomid = $_POST['txtroomid'];
  $bedid = $_POST['txtbedid'];
  $electricnumold=$_POST['txtelectricnumold'];
  $electricnumnew=$_POST['txtelectricnumnew'];
  $electricused=$electricnumnew-$electricnumold;
  $electrictotal=$electricused*3500;
  $sql = "INSERT INTO servicebill VALUES ('$id','$roomid','$bedid','$electricnumold','$electricnumnew','$electricused','$electrictotal')";
  $kq = mysqli_query($con, $sql);
  if ($kq)
    echo "<script>alert('Cập nhật tiền điện thành công')</script>";
  else
    echo "<script>alert('Cập nhật không thành công')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Cập nhật tiền điện</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php
        include_once './dashboard_NV.php';
    ?>
          <div class="container">
          <ul style="padding-left: 150px;">
            <br>
            <br>
            <br>
            <br>
            <br>
              <li style="padding-left: 250px;"><h2>Cập nhật tiền điện</h2></li>
              <li>Mã sinh viên :</li>
              <li><input name="txtid" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Mã phòng :</li>
              <li><input name="txtroomid" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Số điện cũ :</li>
              <li><input name="txtelectricnumold" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Số điện mới :</li>
              <li><input name="txtelectricnumnew" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>
                <button name="buttonCapnhat" style="background-color:   rgb(128,218,235); color:white;"><a style="background-color:   rgb(128,218,235); color:white;" href="./electric.php">Cập nhật số điện</a></button>
                <button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim"><a style="background-color:   rgb(128,218,235); color:white;" href="./electric.php">Quay lại</a></button>
              </li>
              </ul>
          </div>
</body>
</html>