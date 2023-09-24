<?php
$con = mysqli_connect('localhost', 'root', '', 'qlkytuc')
  or die('Lỗi kết nối');
if (isset($_POST['buttonCapnhat'])) 
{
  $id = $_POST['txtid'];
  $roomid=$_POST['txtroomid'];
  $date=$_POST['date'];
  $electricnumold=$_POST['txtelectricnumold'];
  $electricnumnew=$_POST['txtelectricnumnew'];
  $waternumold=$_POST['txtwaternumold'];
  $waternumnew=$_POST['txtwaternumnew'];
  $totalelectric=$electricnumnew-$electricnumold;
  $totalwater=$waternumnew-$waternumold;
  $electriccost=$totalelectric*3500;
  $watercost=$totalwater*20000;
  $wificost=$_POST['txtwificost'];
  $wastcost=$_POST['txtwastcost'];
  $totalcost=$wificost+$wastcost+$watercost+$electriccost;
  $people=$totalcost/4;
  $sql = "INSERT INTO servicebill VALUES ('$id','$roomid','$date','$electricnumold','$electricnumnew','$waternumold','$waternumnew','$totalelectric','$totalwater','$electriccost','$watercost','$wificost','$wastcost','$totalcost','$people')";
  $kq = mysqli_query($con, $sql);
  if ($kq)
    echo "<script>alert('Cập nhật phí dịch vụ thành công')</script>";
  else
    echo "<script>alert('Cập nhật không thành công')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Cập nhật dịch vụ</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <?php
  include_once './dashboard_NV.php';
  ?>
  <form action="" method="post">
    <div class="container">
      <ul style="padding-left: 150px;">
        <br>
        <br>
        <br>
        <br>
        <br>
        <li>
          <h2>Cập nhật thông tin</h2>
        </li>
        <li>Mã hóa đơn dịch vụ :</li>
        <li><input name="txtid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã phòng :</li>
        <li><input name="txtroomid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li><input type="date" name="date"></li>
        <br>
        <li>Số điện cũ :</li>
        <li><input name="txtelectricnumold" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Số điện mới :</li>
        <li><input name="txtelectricnumnew" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Số nước cũ :</li>
        <li><input name="txtwaternumold" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Số nước mới :</li>
        <li><input name="txtwaternumnew" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Tiền mạng :</li>
        <li><input name="txtwificost" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Tiền vệ sinh :</li>
        <li><input name="txtwastcost" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>
          <button name="buttonCapnhat" style="margin-right: 20px; width:100px; background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./updateservice.php">Cập nhật</a></button>
          <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./servicecost.php">Quay lại</a></button>  
        </li> 
      </ul>
    </div>
  </form>
</body>
</html>