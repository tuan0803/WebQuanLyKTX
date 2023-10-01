<?php
$con=mysqli_connect('localhost', 'root','','qlkytuc')
or die('Lỗi kết nối');  
$sql="SELECT * FROM student";
$data=mysqli_query($con,$sql);
if(isset($_POST['buttonTim'])){
    $id=$_POST['txtid'];
    $name=$_POST['txtname'];
    $sqltk="SELECT * FROM student WHERE id like '%$id%'";
    $data=mysqli_query($con,$sqltk);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Tra cứu</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
     <form style="padding-top: 150px; padding-left:200px;" method="post" action="">
     <table style="padding-left: 400px">
            <tr>
                <td colspan="2" style="padding-left: 350px;"><h2>Tra cứu thông tin</h2></td>
            </tr>
            <tr>
            <td><button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim">Tìm kiếm</button></td>
            <td><input style="border-radius: 5px;" type="text" name="txtid" placeholder="Hãy nhập thông tin"></td>
            <td><button style="background-color:   rgb(128,218,235); color:white;" name="buttonTim"><a style="background-color:   rgb(128,218,235); color:white;" href="./searchstudent.php">Quay lại</a></button></td>
            </tr>
      </table>
        <table  border=1 width=80% style="border: 1px solid #000; padding-left: 320px; padding-top:300px;">
        <tr style="background: rgb(65,74,76); color:aliceblue;">
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
                <th>Thao tác</th>
            </tr>
            <?php
                if(isset($data)&& $data!=null)
                {
                    $i=1;
                    while($row=mysqli_fetch_array($data)){
                
            ?>
            <tr>
            + ?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['cccd'] ?></td>
                <td><?php echo $row['class'] ?></td>
                <td><?php echo $row['room-id'] ?></td>
                <td><?php echo $row['bed-id'] ?></td>
                <td><?php echo $row['contract-id'] ?></td>
                <td>
                    <a href="./fixstudent.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(252,194,0); color:white;">Sửa</span></a>
                    <a href="./deletestudent.php?id=<?php echo $row['id']?>"><span style="background-color: rgb(165,42,42); color:white;">Xóa</span></a>
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
