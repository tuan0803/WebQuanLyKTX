<?php
$con = mysqli_connect('localhost', 'root', '', 'qlkytuc')
  or die('Lỗi kết nối');
if (isset($_POST['buttonCapnhat'])) 
{
  $id = $_POST['txtid'];
  $name = $_POST['txtname'];
  $gender = $_POST['gender'];
  $phone = $_POST['txtphone'];
  $address = $_POST['txtaddress'];
  $cccd = $_POST['txtcccd'];
  $class = $_POST['txtclass'];
  $roomid = $_POST['txtroomid'];
  $bedid = $_POST['txtbedid'];
  $contractid = $_POST['txtcontractid'];
  $trung="SELECT * FROM student WHERE id ='$id'";
  $dt=mysqli_query($con,$trung);
  if(mysqli_num_rows($dt)>0)
  {
       echo"<script>alert('Trùng mã sinh viên')</script>";
  }
  else
  {
  $sql = "INSERT INTO student VALUES ('$id','$name','$gender','$phone','$address','$cccd','$class','$roomid','$bedid','$contractid')";
  $kq = mysqli_query($con, $sql);
  if ($kq)
    echo "<script>alert('Cập nhật sinh viên thành công')</script>";
  else
    echo "<script>alert('Cập nhật không thành công')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Cập nhật sinh viên</title>
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
        <li>Mã sinh viên :</li>
        <li><input name="txtid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Họ tên :</li>
        <li><input name="txtname" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li><label for="">Giới tính :</label></li>
        <li><input type="radio" name="gender" value="Nam">Nam<input style="margin-left: 20px;" type="radio" name="gender" value="Nữ">Nữ</li>
        <br>
        <li>Số diện thoại :</li>
        <li><input name="txtphone" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Địa chỉ :</li>
        <li><input name="txtaddress" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Căn cước công dân :</li>
        <li><input name="txtcccd" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Lớp :</li>
        <li><input name="txtclass" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã phòng :</li>
        <li><input name="txtroomid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã giường :</li>
        <li><input name="txtbedid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã hợp đồng :</li>
        <li><input name="txtcontractid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>
          <button name="buttonCapnhat" style="margin-right: 20px; width:100px; background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./addstudent.php">Cập nhật</a></button>
          <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./numberstudent.php">Quay lại</a></button>  
        </li> 
      </ul>
    </div>
  </form>
</body>

</html>