<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$sql = "SELECT * FROM room";
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
    <section class="main-course">
        <div class="header-container">
            <h1>Danh sách phòng</h1>
            <div class="box-right" style="right: 0;">
                <div class="box-search">
                    <i class='bx bx-search'></i>
                    <input type="text">
                </div>
                <!-- <button><i class='bx bx-plus-circle'></i></button> -->
            </div>
        </div>
        <div class="course-box">
            <ul class="room-lists">
                <?php
                if (isset($data) && $data != null) {
                    $i = 1;
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <li class="room">
                            <span class="header-room">
                                <p><?php echo $row['name'] ?></p>
                                <a href="javascript:void(0);" onclick="showEditForm(<?php echo $row['id'] ?>)">
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </a>
                            </span>
                            <a href="./NV_svInphong.php?id=<?php echo $row['id'] ?>" id="icon-room-<?php echo $i; ?>" class="icon-room">
                                <span class="details">
                                    <span>
                                        <p>Trạng thái:</p>
                                        <p>
                                            <?php if ($row['current-quantity'] > 0) {
                                                echo "Đã có người";
                                            } else if ($row['current-quantity']  == 0) {
                                                echo "Chưa có ai";
                                            } else if ($row['current-quantity'] == $row['max-quantity']) {
                                                echo "Đã đủ";
                                            }
                                            ?>
                                        </p>
                                    </span>
                                    <span>
                                        <p>Số người hiện tại:</p>
                                        <p><?php echo $row['current-quantity'] ?>/<?php echo $row['max-quantity'] ?></p>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <div  class="UpRoom" id="UpRoom_<?php echo $row['id'] ?>">
                            <div class="Details">
                                <div class="top">
                                    <h1><span>Sửa thông tin </span><span><?php echo $row['name'] ?></span></h1>
                                    <a href="#" class="icon-back">
                                        <i class='bx bx-x'></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <select name="Status" id="Status_<?php echo $row['id'] ?>">
                                        <option value="Đầy">Đầy</option>
                                        <option value="Trống">Trống</option>
                                    </select>
                                    <table>
                                        <tr>
                                            <td>Số người hiện tại</td>
                                            <td>Số người tối đa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="CurrentQuantity_<?php echo $row['id'] ?>" placeholder="Nhập số"></td>
                                            <td><input type="text" id="MaxQuantity_<?php echo $row['id'] ?>" placeholder="Nhập số"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="bottom">
                                    <input type="submit" value="Lưu" onclick="saveRoom(<?php echo $row['id'] ?>)">
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </section>
</body>
<script src="../../js/Box_Search.js"></script>

<script>
    function saveRoom(roomId) {
        var status = $("#Status_" + roomId).val();
        var currentQuantity = $("#CurrentQuantity_" + roomId).val();
        var maxQuantity = $("#MaxQuantity_" + roomId).val();
        
        // Thực hiện lưu thông tin phòng
        // Sử dụng các giá trị status, currentQuantity, maxQuantity
        // gửi đi qua Ajax hoặc chuyển đến trang xử lý tương ứng.
        
        console.log("Room ID: " + roomId);
        console.log("Status: " + status);
        console.log("Current Quantity: " + currentQuantity);
        console.log("Max Quantity: " + maxQuantity);
        
        // Ẩn biểu mẫu sau khi lưu
        $("#UpRoom_" + roomId).hide();
    }
</script>
</html>
