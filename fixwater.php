<?php 
        $con=mysqli_connect('localhost', 'root','','qlkytuc')
        or die('Loi ket noi');
        $id=$_GET['id'];
        $sqlfind="SELECT * FROM servicebill WHERE id like '%$id%'";
        $data=mysqli_query($con,$sqlfind);
        if(isset($_POST['buttonSua'])){
            $id=$_POST['txtid'];
            $roomid=$_POST['txtroomid'];
            $date=$_POST['date'];
            $waternumold=$_POST['txtwaternumold'];
            $waternumnew=$_POST['txtwaternumnew'];
            $sql="UPDATE servicebill SET room-id='$roomid', date='$date', water-num-old='$waternumold', water-num-new='$waternumnew' WHERE id='$id'";
            $kq=mysqli_query($con,$sql);
            if($kq){echo "<script>alert('Sửa thông tin thành công')</script>";}
            else
            echo "<script>alert('Sửa không thành công')</script>";
            echo"<Script>Window.location.href='./water.php'</Script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin tiền nước</title>
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
                    <h2>Sửa thông tin tiền nước</h2>
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
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="txtroomid" value="<?php echo $row['room-id'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="1">Thời hạn :</td>
                <td colspan="1">
                    <input type="date" name="date" value="<?php echo $row['date'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="1">Số nước cũ :</td>
                <td colspan="1">
                    <input type="text" name="txtwaternumold" value="<?php echo $row['water-num-old'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="1">Số nước mới :</td>
                <td colspan="1">
                    <input type="text" name="txtwaternumnew" value="<?php echo $row['water-num-new'] ?>" disabled>
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
                        <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./water.php">Quay lại</a></button>
                    </td>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>
