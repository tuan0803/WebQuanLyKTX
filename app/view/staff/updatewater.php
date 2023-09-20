
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Cập nhật tiền nước</title>
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
              <li style="padding-left: 250px;"><h2>Cập nhật tiền nước</h2></li>
              <li>Mã sinh viên :</li>
              <li><input name="txtid" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Mã phòng :</li>
              <li><input name="txtroomid" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Thời hạn :</li>
              <li><input tyle="background-color: rgb(248, 246, 243); width:400px;" type="date" name="date" ></li>
              <br>
              <li>Số nước cũ :</li>
              <li><input name="txtwaternumold" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>Số nước mới :</li>
              <li><input name="txtwaternumnew" style="background-color: rgb(248, 246, 243); width:400px;" type ="text"></li>
              <br>
              <li>
                <button name="buttonCapnhat" style="background-color:   rgb(128,218,235); color:white;"><a style="background-color:   rgb(128,218,235); color:white;" href="./updatewater.php">Cập nhật số nước</a></button>
                <button style="background-color:   rgb(128,218,235); color:white;"><a style="background-color:   rgb(128,218,235); color:white;" href="./water.php">Quay lại</a></button>
              </li>
              </ul>
          </div>
</body>
</html>