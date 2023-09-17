<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$id = $_GET['id'];
$sql_id = "SELECT * FROM contract WHERE id like '%$id%'";
$data_id = $connection->query($sql_id);
$data_id->execute();
$sql_name = "SELECT * FROM student where id like '%$id%'";
$data_name = $connection->query($sql_name);
$data_name->execute();
$sql_room = "SELECT id, name FROM room";
$result_room = $connection->query($sql_room);
$result_room->execute();
$sql_bed = "SELECT * FROM bed";
$result_bed = $connection->query($sql_bed);
$result_bed->execute();
if (isset($_POST['btnSave'])) {
    $startDate = $_POST['start-date'];
    $finishDate = $_POST['finish-date'];
    $status = $_POST['cb-trangthai'];
    $description = $_POST['txt-description'];
    $romId = $_POST['cb-room'];
    $bedId = $_POST['cb-bed'];
    $cost = $_POST['txt-cost'];
    $sql = "UPDATE contract SET `start-date`='$startDate', `finish-date`='$finishDate', `status`='$status', `description`='$description', `room-id`='$romId', `bed-id`='$bedId', `cost`='$cost' WHERE id='$id'";
    $kq = $connection->query($sql);
    if ($kq) {
        echo "<script>alert('Thêm mới thành công')</script>";
    } else
        echo "<script>alert('Thêm mới không thành công')</script>";
    $sql_id = "SELECT * FROM contract WHERE id like '%$id%'";
    $data_id = $connection->query($sql_id);
    $data_id->execute();
}
include_once './dashboard_NV.html'
?>

<body>
    <form action="" method="post">
        <section class="main-course">
            <div class="header-container">
                <h1>Sửa hợp đồng</h1>
                <!-- <div class="box-right">
                    <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text" placeholder="Search">
                    </div>
                    <button><i class='bx bx-plus-circle'></i></button>
                </div> -->
            </div>
            <div class="course-box">
                <ul class="contract">
                    <?php
                    if (isset($data_id) && $data_id != null) {
                        $i = 1;
                        while ($row_id = $data_id->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                            <li>
                                <table class="contract-option">
                                    <tr align="center">
                                        <td>
                                            <h1>Hợp đồng thuê nhà</h1>
                                        </td>
                                        <td>
                                            Mã hợp đồng <?php echo $id ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Mã sinh viên:</label>
                                        </td>
                                        <td>
                                            <label for="">Họ và tên:</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="txtid" value="<?php echo $row_id['student-id'] ?>" disabled>
                                        </td>
                                        <?php
                                        if (isset($data_name) && $data_name != null) {
                                            $i = 1;
                                            while ($row_name = $data_name->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                                <td>
                                                    <input type="text" name="txtname" value="<?php echo $row_name['name'] ?>" disabled>
                                                </td>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td><label for="">Ngày bắt đầu:</label></td>
                                        <td><label for="">Ngày kết thúc:</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="date" name="start-date" value="<?php echo $row_id['start-date'] ?>"></td>
                                        <td><input type="date" name="finish-date" value="<?php echo $row_id['finish-date'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="phong-option">
                                            <select name="cb-room">
                                                <option selected disabled>Chọn phòng:</option>
                                                <?php
                                                while ($row_room = $result_room->fetch(PDO::FETCH_ASSOC)) {
                                                    $roomId = $row_room['id'];
                                                    $roomName = $row_room['name'];
                                                    echo "<option value='$roomId'>$roomName</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="giuong-option">
                                            <select name="cb-bed" value="">
                                                <option value="" selected disabled>Chọn giường:</option>
                                                <?php
                                                while ($row_bed = $result_bed->fetch(PDO::FETCH_ASSOC)) {
                                                    $roomid = $row_bed['id'];
                                                    echo "<option value='$roomid'>$roomid</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Giá (Đồng):</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" name="txt-cost" value="<?php echo $row_id['cost'] ?>"></td>
                                        <td class="giuong-option">
                                            <select name="cb-trangthai" value="<?php echo $row_id['status'] ?>">
                                                <option selected disabled>Chọn trạng thái:</option>
                                                <option value="1">Còn hạn</option>
                                                <option value="0">Hết hạn</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="">Điều khoản thêm (Nếu có)</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><textarea name="txt-description" id="" cols="40" rows="10"><?php echo $row_id['description'] ?></textarea></td>
                                    </tr>
                            <?php
                        }
                    }
                            ?>
                            <tr>
                                <td colspan="2" align="center">
                                    <button name="btnSave" class="save">Lưu</button>
                                </td>
                            </tr>
                                </table>
                            </li>
                </ul>
            </div>
            <!-- <div id="toasts">
                <div class="toast success">
                    <i class="fa-regular fa-circle-check"></i>
                    <span class="massage">This is a Success message</span>
                    <span class="countdown"></span>
                </div>
                <div class="toast warning">
                    <i class="fa-regular fa-circle-check"></i>
                    <span class="massage">This is a Warning message</span>
                    <span class="countdown"></span>
                </div>
                <div class="toast error">
                    <i class="fa-regular fa-circle-check"></i>
                    <span class="massage">This is a Error message</span>
                    <span class="countdown"></span>
                </div>
            </div> -->
        </section>
    </form>
</body>