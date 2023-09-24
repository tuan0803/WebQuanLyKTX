
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sửa thông tin sinh viên</title>
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/staff/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
    <form style="padding-top: 150px; padding-left:450px;" method="post" action="<?php echo _WEB_ROOT?>/qlysinhvien/suasv">
        <table border=1 width=80% style="padding-left: 320px;">
        <tr>
                <td colspan="2">
                    <h2>Sửa thông tin sinh viên</h2>
                </td>
        </tr>
        
            <tr>
                <td colspan="1">Mã sinh viên :</td>
                <td colspan="1">
                    <span><?php echo $info['id'] ?></span>
                    <input type="hidden" name="id" value="<?php echo $info['id'] ?>" >
                </td>
            </tr>
            <tr>
                <td colspan="1">Họ và tên :</td>
                <td colspan="1">
                    <input type="text" name="name" value="<?php echo $info['name'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Giới tính :</td>
                <td colspan="1">
                    <input type="text" name="gender" value="<?php echo $info['gender'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Số điện thoại :</td>
                <td colspan="1">
                    <input type="text" name="phone" value="<?php echo $info['phone'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Địa chỉ :</td>
                <td colspan="1">
                    <input type="text" name="address" value="<?php echo $info['address'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Căn cước công dân :</td>
                <td colspan="1">
                    <input type="text" name="cccd"value="<?php echo $info['cccd'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Lớp :</td>
                <td colspan="1">
                    <input type="text" name="class" value="<?php echo $info['class'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã phòng :</td>
                <td colspan="1">
                    <input type="text" name="roomid" value="<?php echo $info['roomid'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã giường :</td>
                <td colspan="1">
                    <input type="text" name="bedid" value="<?php echo $info['bedid'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="1">Mã hợp đồng :</td>
                <td colspan="1">
                    <input type="text" name="contractid" value="<?php echo $info['contractid'] ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                    <td>
                        <button type="submit" style="margin-right: 20px; width:120px; background-color:   rgb(128,218,235); color:white;">Xác nhận sửa</button>
                        
                    </td>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>
