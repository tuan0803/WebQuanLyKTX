<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Thêm hợp đồng</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT ?>/student/suasv" method="post">
        <section class="main-course">
            <?php
            
            
                $id         = $list1['id'] ?? '';
                $name       = $list1['name'] ?? '';
                $gender     = $list1['gender'] ?? '';
                $phone      = $list1['phone'] ?? '';
                $address    = $list1['address'] ?? '';
                $cccd       = $list1['cccd'] ?? '';
                $class      = $list1['class'] ?? '';
                $roomid     = $list1['roomid'] ?? '';
                $bedid      = $list1['bedid'] ?? '';
                $contractid = $list1['contractid'] ?? '';

                ?>
                <div class="course-box">
                    <ul class="contract">
                        <li>
                            <table class="contract-option">
                                <tr align="center">
                                    <td colspan="2">
                                        <h1>Thông tin sinh viên</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Mã sinh viên:</label>
                                    </td>
                                    <td>
                                        <label for="">Họ và tên:</label>
                                    </td>
                                    <td>
                                        <label for="">Giới tính:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for=""><?php echo $id ?></label>
                                        <input type="hidden" name="id" value="<?php echo $id ?>">

                                    </td>
                                    <td>

                                        <input type="text" name="name" value="<?php echo $name ?>">

                                    </td>
                                    <td>

                                        <input type="text" name="gender" value="<?php echo $gender ?>">

                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">SĐT:</label></td>
                                    <td><label for="">Quê quán:</label></td>
                                </tr>
                                <tr>
                                    <td>

                                        <input type="text" name="phone" value="<?php echo $phone ?>">

                                    </td>
                                    <td>

                                        <input type="text" name="address" value="<?php echo $address ?>">

                                    </td>

                                </tr>
                                <tr>
                                    <td><label for="">Căn cước công dân:</label></td>
                                    <td><label for="">Lớp:</label></td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for=""><?php echo $cccd ?></label>
                                        <input type="hidden" name="cccd" value="<?php echo $cccd ?>">

                                    </td>
                                    <td>

                                        <input type="text" name="class" value="<?php echo $class ?>">

                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Phòng:</label></td>
                                    <td><label for="">Giường:</label></td>
                                </tr>
                                <tr>
                                    <td class="phong-option">
                                    <label for=""><?php echo $roomid ?></label>
                                        <input type="hidden" name="roomid" value="<?php echo $roomid ?>">

                                    </td>
                                    <td class="giuong-option">
                                    <label for=""><?php echo $bedid ?></label>
                                        <input type="hidden" name="bedid" value="<?php echo $bedid ?>">

                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Mã hợp đồng:</label></td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for=""><?php echo $contractid ?></label>
                                        <input type="hidden" name="contractid" value="<?php echo $contractid ?>">

                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <button type="submit" class="save">Lưu</button>
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
    $(document).ready(function () {
        $('.search').keypress(function (event) {
            if (event.which === 13) {
                performSearch();
            }
        });
    });

    function performSearch() {
        var searchText = $('.search').val();
        $.post()
    }
    $(document).ready(function () {
        $(".room").change(function () {
            var id = $(".room").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/showBed",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $("#bed").html(data);
                }
            })
            console.log(id);
        })
    })
</script>

</html>