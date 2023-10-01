
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Cập nhật dịch vụ</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  
  <form action="themsb" method="post">
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
        <li><input name="id" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Mã phòng :</li>
        <li><input name="roomid" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li><input type="date" name="date"></li>
        <br>
        <li>Số điện cũ :</li>
        <li><input name="electricnumold" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Số điện mới :</li>
        <li><input name="electricnumnew" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        
        <li>Số nước cũ :</li>
        <li><input name="waternumold" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Số nước mới :</li>
        <li><input name="waternumnew" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Tiền mạng :</li>
        <li><input name="wificost" value="150000" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>Tiền vệ sinh :</li>
        <li><input name="wastcost" value="200000" style="background-color: rgb(248, 246, 243); width:400px;" type="text"></li>
        <br>
        <li>
          <button type="submit" style="margin-right: 20px; width:100px; background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" >Cập nhật</a></button>
          <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./servicecost.php">Quay lại</a></button>  
        </li> 
      </ul>
    </div>
  </form>
</body>
</html>