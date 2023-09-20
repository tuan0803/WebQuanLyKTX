<?php
$con=mysqli_connect('localhost', 'root','','qlkytuc')
or die('Lỗi kết nối');  
$sql="SELECT * FROM  servicebill";
$data=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Tiền nước</title>
  <link rel="stylesheet" href="../../css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
<?php
        include_once './dashboard_NV.php';
    ?>
    <form style="padding-top: 150px; padding-left:200px;" method="post" action="">
      <table style="padding-left: 400px">
            <tr>
                <td colspan="2" style="padding-left: 350px;"><h2>Thông tin tiền nước</h2></td>
            </tr>
            <tr>
            <td><button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim">Tìm kiếm</button></td>
            <td><input style="border-radius: 5px;" type="text" name="txtid" placeholder="Hãy nhập thông tin"></td>
            <td>
                <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./updatewater.php">Cập nhật</a></button>
                <button style="background-color:   rgb(128,218,235); color:white;"><a style="background-color:   rgb(128,218,235); color:white;" href="./water.php">Quay lại</a></button>
            </td>
            </tr>
      </table>
      <table border=1 width=80% style="padding-left: 320px;">
        <tr style="background: rgb(65,74,76); color:aliceblue;">
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Mã phòng</th>
                <th>Thời hạn</th>
                <th>Số nước cũ</th>
                <th>Số nước mới</th>
                <th>Số nước đã dùng</th>
                <th>Tiền nước</th>
                <th>Thao tác</th>
            </tr>
            <?php
                if(isset($data)&& $data!=null)
                {
                    $i=1;
                    while($row=mysqli_fetch_array($data)){
                
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['room-id'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['water-num-old'] ?></td>
                <td><?php echo $row['water-num-new'] ?></td>
                <td><?php echo $row['total-water'] ?></td>
                <td><?php echo $row['water-cost'] ?></td>
                <td>
                    <a href="./fixwater.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(252,194,0); color:white;">Sửa</span></a>
                    <a href="./deletewater.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(165,42,42); color:white;">Xóa</span></a>
                </td>
            </tr>
            <?php
            }
        }
            ?>
        </table>
    </form>
</body>
</html>
