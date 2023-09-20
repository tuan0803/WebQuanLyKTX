<?php 
        $con=mysqli_connect('localhost', 'root','','qlkytuc')
        or die('Loi ket noi');
        $id=$_GET['id'];
        $sqlfind="SELECT * FROM student WHERE id like '%$id%'";
        $data=mysqli_query($con,$sqlfind);
        if(isset($_POST['buttonSua'])){
            $name=$_POST['txtname'];
            $gender=$_POST['txtgender'];
            $phone=$_POST['txtphone'];
            $address=$_POST['txtaddress'];
            $cccd=$_POST['txtcccd'];
            $class=$_POST['txtclass'];  
            $roomid=$_POST['txtroomid'];
            $bedid=$_POST['txtbedid'];
            $contractid=$_POST['txtcontractid'];
            $sql="UPDATE student SET name='$name',gender='$gender',phone='$phone',address='$address', cccd='$cccd',class='$class',`room-id`='$roomid',`bed-id`='$bedid', `contract-id`='$contractid' WHERE id='$id'";
            $kq=mysqli_query($con,$sql);
            if($kq){echo "<script>alert('Sửa thông tin thành công')</script>";}
            else
            echo "<script>alert('Sửa không thành công')</script>";
            $sqlfind="SELECT * FROM student WHERE id like '%$id%'";
            $data=mysqli_query($con,$sqlfind);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin sinh viên</title>
  <link rel="stylesheet" href="../../css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <?php
        include_once './dashboard_NV.php';
    ?>
    <form style="padding-top: 150px; padding-left:450px;" method="post" action="">
        <table border=1 width=80% style="padding-left: 320px;">
        <tr>
                <td colspan="2">
                    <h2>Sửa thông tin sinh viên</h2>
                </td>
        </tr>
        <?php 
            if(isset($data)&&$data!=null){
                while($row=mysqli_fetch_array($data)){
        ?>
            <tr>
                <td colspan="1">Mã sinh viên :</td>
                <td colspan="1">
                    <input type="text" name="txtid" value="<?php echo $row['id'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="1">Họ và tên :</td>
                <td colspan="1">
                    <input type="text" name="txtname" value="<?php echo $row['name'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Giới tính :</td>
                <td colspan="1">
                    <input type="text" name="txtgender" value="<?php echo $row['gender'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện thoại :</td>
                <td colspan="1">
                    <input type="text" name="txtphone" value="<?php echo $row['phone'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Địa chỉ :</td>
                <td colspan="1">
                    <input type="text" name="txtaddress" value="<?php echo $row['address'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Căn cước công dân :</td>
                <td colspan="1">
                    <input type="text" name="txtcccd"value="<?php echo $row['cccd'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Lớp :</td>
                <td colspan="1">
                    <input type="text" name="txtclass" value="<?php echo $row['class'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="txtroomid" value="<?php echo $row['room-id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã giường :</td>
                <td colspan="1">
                    <input type="text" name="txtbedid" value="<?php echo $row['bed-id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã hợp đồng :</td>
                <td colspan="1">
                    <input type="text" name="txtcontractid" value="<?php echo $row['contract-id'] ?>">
                </td>
            </tr>
            <?php 
        }
            };
            ?>
            <tr>
                <td>
                    <td>
                        <button name="buttonSua" style="margin-right: 20px; width:120px; background-color:   rgb(128,218,235); color:white;">Xác nhận sửa</button>
                        <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./searchstudent.php">Quay lại</a></button>
                    </td>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>
