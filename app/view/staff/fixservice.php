
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin dịch vụ</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
    <form style="padding-top: 150px; padding-left:450px;" method="post" action="">
        <table border=1 width=80% style="padding-left: 320px;">
        <tr>
                <td colspan="2">
                    <h2>Sửa thông tin dịch vụ</h2>
                </td>
        </tr>
        
        
            <tr>
                <td colspan="1">Mã hóa đơn dịch vụ :</td>
                <td colspan="1">
                    <span><?php echo $info['id']?></span>
                    <input type="hidden" name="id" value="<?php echo $info['id'] ?>" >
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="roomid" value="<?php echo $info['roomid'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện cũ  :</td>
                <td colspan="1">
                    <input type="text" name="electricnumold" value="<?php echo $info['electricnumold'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện mới :</td>
                <td colspan="1">
                    <input type="text" name="electricnumnew" value="<?php echo $info['electricnumnew'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số nước cũ :</td>
                <td colspan="1">
                    <input type="text" name="waternumold"value="<?php echo $info['waternumold'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số nước mới :</td>
                <td colspan="1">
                    <input type="text" name="waternumnew" value="<?php echo $info['waternumnew'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Tiền mạng :</td>
                <td colspan="1">
                    <input type="text" name="wificost" value="<?php echo $info['wificost'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Tiền vệ sinh :</td>
                <td colspan="1">
                    <input type="text" name="wastcost" value="<?php echo $info['wastcost'] ?>">
                </td>
            </tr>
            
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
