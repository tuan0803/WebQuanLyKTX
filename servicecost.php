<?php
$con=mysqli_connect('localhost', 'root','','qlkytuc')
or die('Lỗi kết nối');  
$sql="SELECT * FROM servicebill";
$data=mysqli_query($con,$sql);
if(isset($_POST['buttonTim'])){
    $id=$_POST['txtid'];
    $sqltk="SELECT * FROM servicebill WHERE id like '%$id%'";
    $data=mysqli_query($con,$sqltk);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Phí dịch vụ</title>
  <link rel="stylesheet" href="../../css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <?php
        include_once './dashboard_NV.php';
    ?>
     <form style="padding-top: 150px; padding-left:50px;" method="post" action="">
     <table style="padding-left: 400px">
            <tr>
                <td colspan="2" style="padding-left: 370px;"><h2>Phí dịch vụ</h2></td>
            </tr>
            <tr>
            <td>
            <button style="background-color:   rgb(128,218,235); color:white;"><a style="background-color:   rgb(128,218,235); color:white;" href="./updateservice.php">Cập nhật</a></button>
            <button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim">Tìm kiếm</button></td>
            <td><input style="border-radius: 10px;" type="text" name="txtid" placeholder="Hãy nhập mã hóa đơn"></td>
            <td><button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim"><a style="background-color:   rgb(128,218,235); color:white;" href="./servicecost.php">Quay lại</a></button></td>
            </tr>
      </table>
        <table  border=1 width=150% style="border: 1px solid #000; padding-left: 320px; padding-top:300px;">
        <tr style="background: rgb(65,74,76); color:aliceblue;">
                <th>STT</th>
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
                <td><?php echo $row['electric-num-old']?></td>
                <td><?php echo $row['electric-num-new'] ?></td>
                <td><?php echo $row['water-num-old'] ?></td>
                <td><?php echo $row['water-num-new'] ?></td>
                <td><?php echo $row['total-electric'] ?></td>
                <td><?php echo $row['total-water'] ?></td>
                <td><?php echo $row['electric-cost'] ?></td>
                <td><?php echo $row['water-cost'] ?></td>
                <td><?php echo $row['wifi-cost'] ?></td>
                <td><?php echo $row['wast-cost'] ?></td>
                <td><?php echo $row['total-cost'] ?></td>
                <td><?php echo $row['indivisual-cost'] ?></td>
                <td>
                    <a href="./fixservice.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(252,194,0); color:white;">Sửa</span></a>
                    <a href="./deleteservice.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(165,42,42); color:white;">Xóa</span></a>
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
