<?php 
        $con=mysqli_connect('localhost', 'root','','qlkytuc')
        or die('Lỗi kết nối');
        $id=$_GET['id'];
        $sqlfind="SELECT * FROM servicebill WHERE id like '%$id%'";
        $data=mysqli_query($con,$sqlfind);
        if(isset($_POST['buttonSua']))
        {
            $roomid=$_POST['txtroomid'];
            $date=$_POST['date'];
            $electricnumold=$_POST['txtelectricnumold'];
            $electricnumnew=$_POST['txtelectricnumnew'];
            $waternumold=$_POST['txtwaternumold'];
            $waternumnew=$_POST['txtwaternumnew'];
            $totalelectric=$electricnumnew-$electricnumold;
            $totalwater=$waternumnew-$waternumold;
            $electriccost=$totalelectric*3500;
            $watercost=$totalwater*20000;
            $wificost=$_POST['txtwificost'];
            $wastcost=$_POST['txtwastcost'];
            $totalcost=$wificost+$wastcost+$watercost+$electriccost;
            $people=$totalcost/4;
            $sql="UPDATE servicebill SET `room-id`='$roomid', date='$date',`electric-num-old`='$electricnumold',`electric-num-new`='$electricnumnew', water-num-old`='$waternumold',`water-num-new`='$waternumnew', `total-electric`='$totalelectric', `total-water`='$totalwater', `electric-cost`='$electriccost', `water-cost`='$watercost', `wifi-cost`='$wificost', `wast-cost`='$wastcost',`total-cost`='$totalcost', `indivisual-cost`='$people' WHERE id = '$id'";
            $kq=mysqli_query($con,$sql);
            if($kq){echo "<script>alert('Sửa thông tin thành công')</script>";}
            else
            echo "<script>alert('Sửa không thành công')</script>";
            $sqlfind="SELECT * FROM servicebill WHERE id like '%$id%'";
            $data=mysqli_query($con,$sqlfind);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin dịch vụ</title>
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
                    <h2>Sửa thông tin dịch vụ</h2>
                </td>
        </tr>
        <?php 
            if(isset($data)&&$data!=null){
                while($row=mysqli_fetch_array($data)){
        ?>
            <tr>
                <td colspan="1">Mã hóa đơn dịch vụ :</td>
                <td colspan="1">
                    <input type="text" name="txtid" value="<?php echo $row['id'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="txtroomid" value="<?php echo $row['room-id'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện cũ  :</td>
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
            <tr>
                <td colspan="1">Số nước cũ :</td>
                <td colspan="1">
                    <input type="text" name="txtwaternumold"value="<?php echo $row['water-num-old'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số nước mới :</td>
                <td colspan="1">
                    <input type="text" name="txtwaternumnew" value="<?php echo $row['water-num-new'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Tiền mạng :</td>
                <td colspan="1">
                    <input type="text" name="txtwificost" value="<?php echo $row['wifi-cost'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Tiền vệ sinh :</td>
                <td colspan="1">
                    <input type="text" name="txtwastcost" value="<?php echo $row['wast-cost'] ?>">
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
                        <button style="background-color:   rgb(128,218,235);"><a style="background-color:   rgb(128,218,235); color:white;" href="./servicecost.php">Quay lại</a></button>
                    </td>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>
