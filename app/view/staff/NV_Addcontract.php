<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Thêm hợp đồng</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/themcontract" method="post">
        <section class="main-course">
            <div class="course-box">
                <ul class="contract">
                    <li>
                        <table class="contract-option">
                            <tr align="center">
                                <td colspan="2">
                                    <h1>Tạo hợp đồng mới</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Nhập mã hợp đồng</label>
                                </td>
                                <td>
                                    <label for="">Họ và tên:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id">
                                </td>
                                <td>
                                    <select name="studentid" id="" class="form-control" style="font-size: 20px; margin-top: -10px; padding: 5px; background: #F5F5F5;">
                                        <option disabled selected>Chọn sinh viên</option>
                                        <?php
                                        foreach ($list_student as $list_student) {
                                            $id = $list_student['id'];
                                            $name = $list_student['name'];
                                        ?>

                                            <option value="<?php echo $id ?>"><?php echo $name ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Ngày bắt đầu:</label></td>
                                <td><label for="">Ngày kết thúc:</label></td>
                            </tr>
                            <tr>
                                <td><input type="date" name="startdate"></td>
                                <td><input type="date" name="finishdate"></td>
                            </tr>
                            <tr>
                                <td><label for="">Chọn Phòng:</label></td>
                                <td><label for="">Chọn giường:</label></td>
                            </tr>
                            <tr>
                                <td class="phong-option">
                                    <select class="form-select room" name="roomid" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled>Phòng</option>
                                        <?php
                                        foreach ($list_room as $list1) {
                                            $id = $list1['id'] ?? '';
                                            $name = $list1['name'] ?? '';
                                        ?>
                                            <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="giuong-option">
                                    <select class="form-select" name="bedid" aria-label="Default select example" style="background: #F5F5F5;">
                                        <option selected disabled>Chọn giường</option>
                                        <optgroup id="bed">

                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Giá (Đồng):</label></td>
                                <td><label for="">Tiền cọc (Đồng):</label></td>
                            </tr>
                            <tr>
                                <td id="cost"><input type="number" name="codcost"></td>
                                <td><input type="hidden" name="status" value="1"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="">Ghi chú:</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea name="description" id="" cols="40" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <button class="save">Lưu</button>
                                    <button class="clear">Làm mới</button>
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
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/showCost",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#cost").html(data);
                }
            })
            console.log(id);
        })
    })
</script>

</html>