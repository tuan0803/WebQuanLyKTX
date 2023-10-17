<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Sửa hợp đồng</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/suacontract" method="post">
        <section class="main-course">
            <div class="course-box">
                <ul class="contract">
                    <li>
                        <table class="contract-option">
                            <tr align="center">
                                <td colspan="2">
                                    <h1>Sửa thông tin hợp đồng <?php echo $info['id'] ?></h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Mã hợp đồng:</label>
                                </td>
                                <td>
                                    <label for="">Mã sinh viên:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id" value="<?php echo  $info['id']  ?>">
                                </td>
                                <td>
                                    <select class="form-select" name="studentid" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled value="<?php echo  $info['studentid']  ?>"><?php foreach ($list_student1 as $list_student1) { echo $list_student1['name']; } ?></option>
                                        <optgroup>
                                            <?php
                                            foreach ($list_student as $list_student) {
                                                $id = $list_student['id'] ?? '';
                                                $name = $list_student['name'] ?? '';
                                            ?>
                                                <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                            <?php
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Ngày bắt đầu:</label></td>
                                <td><label for="">Ngày kết thúc:</label></td>
                            </tr>
                            <tr>
                                <td><input type="date" name="startdate" value="<?php echo  $info['startdate'] ?>"></td>
                                <td><input type="date" name="finishdate" value="<?php echo  $info['finishdate'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="">Chọn Phòng:</label></td>
                                <td><label for="">Chọn giường:</label></td>
                            </tr>
                            <tr>
                                <td class="phong-option">
                                    <select class="form-select room" name="roomid" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled><?php echo $info['roomid'] ?></option>
                                        <?php
                                        foreach ($list_room as $list1) {
                                            $roomid = $list1['roomid'] ?? '';
                                            $roomname = $list1['roomname'] ?? '';
                                        ?>
                                            <option value="<?php echo $roomid ?>"><?php echo $roomname ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="giuong-option">
                                    <select class="form-select" id="bed" name="bedid" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled><?php echo $info['bedid'] ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Giá (Đồng):</label></td>
                                <td><label for="">Tiền đặt cọc:</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="cost" value="<?php echo $info['cost'] ?>"></td>
                                <td><input type="text" name="codcost" value="<?php echo $info['codcost'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="">Trạng thái:</label></td>

                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select" name="status" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled><?php if ($info['status'] == 1) {
                                                                        echo "Còn hạn";
                                                                    } else {
                                                                        echo "Hết hạn";
                                                                    } ?></option>
                                        <optgroup>
                                            <option value="1">Còn hạn</option>
                                            <option value="0">Hết hạn</option>
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="">Ghi chú:</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea name="description" id="" cols="40" rows="10"><?php echo $info['description'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <button class="save">Lưu</button>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
        </section>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".room").change(function() {
            var id = $(".room").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/showBed",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#bed").html(data);
                }
            })
            console.log(id);
        })
    })
</script>

</html>