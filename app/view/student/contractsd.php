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
    <section class="main-course">
        <?php
        foreach ($contract as $contract1) {
            $id          = $contract1['id'] ?? '';
            $studentid   = $contract1['studentid'] ?? '';
            $startdate   = $contract1['startdate'] ?? '';
            $finishdate  = $contract1['finishdate'] ?? '';
            $status      = $contract1['status'] ?? '';
            $description = $contract1['description'] ?? '';
            $roomid      = $contract1['roomid'] ?? '';
            $bedid       = $contract1['bedid'] ?? '';
            $cost        = $contract1['cost'] ?? '';

            ?>
            <div class="course-box">
                <ul class="contract">
                    <li>
                        <table class="contract-option">
                            <tr align="center">
                                <td colspan="2">
                                    <h1>Thông tin hợp đồng</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Mã hợp đồng</label>
                                </td>
                                <td>
                                    <label for="">Mã sinh viên:</label>
                                </td>
                                <td>
                                    <label for="">Họ và tên:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <?php echo $id ?>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <?php echo $studentid ?>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <?php echo $studentid ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Ngày bắt đầu:</label></td>
                                <td><label for="">Ngày kết thúc:</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <?php echo $startdate ?>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <?php echo $finishdate ?>
                                    </label>
                                </td>

                            </tr>
                            <tr>
                                <td><label for="">Phòng:</label></td>
                                <td><label for="">Giường:</label></td>
                            </tr>
                            <tr>
                                <td class="phong-option">
                                    <label for="">
                                        <?php echo $roomid ?>
                                    </label>
                                </td>
                                <td class="giuong-option">
                                    <label for="">
                                        <?php echo $bedid ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Giá (Đồng):</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <?php echo $cost ?>
                                    </label>
                                </td>
                                <td><label for="">
                                        <?php echo $status ?>
                                    </label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="">Ghi chú:</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="">
                                        <?php echo $description ?>
                                    </label></td>
                            </tr>

                        </table>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </section>

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