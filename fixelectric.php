<?php 
        $con=mysqli_connect('localhost', 'root','','qlkytuc')
        or die('Loi ket noi');
        $id=$_GET['id'];
        $sqlfind="SELECT * FROM servicebill WHERE id like '%$id%'";
        $data=mysqli_query($con,$sqlfind);
        if(isset($_POST['buttonSua'])){
            $id=$_POST['txtid'];
            $roomid=$_POST['txtroomid'];
            $electricnumold=$_POST['txtelectricnumold'];
            $electricnumnew=$_POST['txtelectricnumnew'];
            $sql="UPDATE servicebill SET room-id='$roomid', electric-num-old='$electricnumold', electric-num-new='$electricnumnew' WHERE id='$id'";
            $kq=mysqli_query($con,$sql);
            if($kq){echo "<script>alert('Sửa thông tin thành công')</script>";}
            else
            echo "<script>alert('Sửa không thành công')</script>";
            echo"<Script>Window.location.href='./electric.php'</Script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin tiền điện</title>
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
                    <h2>Sửa thông tin tiền điện</h2>
                </td>
        </tr>
        <?php 
            if(isset($data)&&$data!=null){
                while($row=mysqli_fetch_array($data)){
        ?>
            <tr>
                <td colspan="1">Mã sinh viên :</td>
                <td colspan="1">
                    <input type="text" name="txtid" value="<?php echo $row['id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="txtroomid" value="<?php echo $row['room-id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện cũ :</td>
                <td colspan="1">
                    <input type="text" name="txtelectricnumold" value="<?php echo $row['electric-num-old'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện mới :</td>
                <td colspan="1">
                    <input type="text" name="txtelectricnumnew" value="<?php echo $row['electric-num-new'] ?>">
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
                        <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./electric.php">Quay lại</a></button>
                    </td>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>
