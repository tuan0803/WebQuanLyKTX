
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Cập nhật sinh viên</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  
  <form action="themsv" method="post">
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
        <li><input name="id" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Họ tên :</li>
        <li><input name="name" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li><label for="">Giới tính :</label></li>
        <li><input type="radio" name="gender" value="Nam">Nam<input style="margin-left: 20px;" type="radio" name="gender" value="Nữ">Nữ</li>
        <br>
        <li>Số diện thoại :</li>
        <li><input name="phone" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Địa chỉ :</li>
        <li><input name="address" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Căn cước công dân :</li>
        <li><input name="cccd" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Lớp :</li>
        <li><input name="class" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã phòng :</li>
        <li><input name="roomid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã giường :</li>
        <li><input name="bedid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã hợp đồng :</li>
        <li><input name="contractid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>
          <button type="submit" style="margin-right: 20px; width:100px; background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" >Cập nhật</a></button>
           
        </li> 
      </ul>
    </div>
  </form>
</body>

</html>