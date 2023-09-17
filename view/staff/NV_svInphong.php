<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$roomid = $_GET['id'];
$sql = "SELECT * FROM student WHERE `room-id` like '%$roomid%'";
$data = $connection->query($sql);
$data->execute();




include_once './dashboard_NV.html'
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function showChangeBedForm(studentId) {
        // Ẩn tất cả các biểu mẫu khác
        $("[id^=change-bed-form-]").hide();

        // Hiển thị biểu mẫu của sinh viên được chọn
        $("#change-bed-form-" + studentId).show();
        console.log(studentId);
    }

    function changeBed(studentId) {
        var newBed = $("#new-bed-" + studentId).val();

        // Gửi dữ liệu lên máy chủ bằng AJAX và cập nhật giường của sinh viên
        $.ajax({
            type: "POST",
            url: "NV_editPhong.php",
            data: {
                studentId: studentId,
                newBed: newBed
            },
            success: function(response) {
                // Xử lý kết quả từ máy chủ, ví dụ: hiển thị thông báo
                alert(response);

                // Ẩn biểu mẫu sau khi thay đổi
                $("#change-bed-form-" + studentId).hide();
            }
        });
    }
</script>

<body>
    <form action="" method="post">
        <section class="main-course">
            <div class="header-container">
                <h1>Danh sách sinh viên <?php echo $roomid ?></h1>
                <div class="box-right">
                    <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text">
                    </div>
                    <!-- <a href="./NV_addcontract.php"><button><i class='bx bx-plus-circle'></i></button></a> -->
                </div>
            </div>

            <div class="course-box">
                <ul class="serviceBill">
                    <table class="contract-list table">
                        <tr>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Tên Sinh viên</th>
                            <th>Lớp</th>
                            <th>Số điện thoại</th>
                            <th>Mã giường</th>
                            <th colspan="2"></th>

                        </tr>
                    </table>
                    <?php
                    if (isset($data) && $data != null) {
                        $i = 1;
                        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <table class="contract-list table">
                                <tr>
                                    <td>
                                        <p><?php echo $i++ ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['id'] ?>
                                    </td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['class'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['bed-id'] ?></td>
                                    <td><a href="javascript:void(0);" onclick="showChangeBedForm(<?php echo $row['id'] ?>)"><i class='bx bx-bed '></i></a></td>
                                    <td><a href="./NV_removeContract.php?id=<?php echo $row['id'] ?>"><i class='bx bx-trash'></i></a></td>
                                </tr>
                            </table>
                            <div class="change-bed" id="change-bed-form-<?php echo $row['id'] ?>">
                                <div class="change">
                                    <td>
                                        <h2>Chuyển giường cho Sinh viên</h2>
                                    </td>
                                    <td>
                                        <a href="./NV_svInphong.php?id=<?php echo $roomid?>" class="icon-back">
                                            <h2><i class='bx bx-x'></i></h2>
                                        </a>
                                    </td>
                                </div>
                                <table class="table-change table table-borderless">
                                    <tr>
                                        <td>
                                            <label><?php echo $row['bed-id'] ?></label>
                                        </td>
                                        <td><i class='bx bx-chevrons-right'></i><i class='bx bx-chevrons-right'></i></td>
                                        <td><i class='bx bx-chevrons-right'></i><i class='bx bx-chevrons-right'></i></td>
                                        <td>
                                            <select id="new-bed-<?php echo $row['id'] ?>">
                                                <option value="Giường 1">Giường 1</option>
                                                <option value="Giường 2">Giường 2</option>
                                                <option value="Giường 3">Giường 3</option>
                                                <option value="Giường 4">Giường 4</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <button onclick="changeBed(<?php echo $row['id'] ?>)">Lưu</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>


        </section>

    </form>
</body>
<script src="../../js/Box_Search.js"></script>

</html>