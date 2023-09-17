<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$sql = "SELECT id, name FROM room";
$result = $connection->query($sql);
$result->execute();
$sql_bed = "SELECT * FROM bed";
$result_bed = $connection->query($sql_bed);
$result_bed->execute();
if (isset($_POST['btnSave'])) {
    $id = $id_sv = $_POST['txtid'];
    $startDate = $_POST['start-date'];
    $finishDate = $_POST['finish-date'];
    $status = '1';
    $description = $_POST['txt-description'];
    $roomId = $_POST['cb-room'];
    $bedId = $_POST['cb-bed'];
    $cost = $_POST['txt-cost'];
    $sql = "INSERT INTO contract VALUES('$id', '$id_sv', '$startDate','$finishDate ','$status', ' $description','$roomId','$bedId','$cost')";
    $kq = $connection->query($sql);;
    if ($kq) {
        echo "<script>alert('Thêm mới thành công')</script>";
    } else
        echo "<script>alert('Thêm mới không thành công')</script>";
}
include_once './dashboard_NV.html'
?>

<body>
    <form action="" method="post">
        <section class="main-course">
            <div class="header-container">
                <h1>Hợp đồng</h1>
                <div class="box-right">
                    <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text" placeholder="Search">
                    </div>
                    <!-- <button><i class='bx bx-plus-circle'></i></button> -->
                </div>
            </div>
            <div class="course-box">
                <ul class="contract">
                    <li>
                        <table class="contract-option">
                            <tr align="center">
                                <td colspan="2">
                                    <h1>Hợp đồng thuê nhà</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Nhập mã sinh viên:</label>
                                </td>
                                <td>
                                    <label for="">Họ và tên:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="txtid">
                                </td>
                                <td>
                                    <input type="text" name="txtname">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Ngày bắt đầu:</label></td>
                                <td><label for="">Ngày kết thúc:</label></td>
                            </tr>
                            <tr>
                                <td><input type="date" name="start-date"></td>
                                <td><input type="date" name="finish-date"></td>
                            </tr>
                            <tr>
                                <td class="phong-option">
                                    <select name="cb-room">
                                        <option selected disabled>Chọn phòng:</option>
                                        <?php
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            $roomId = $row['id'];
                                            $roomName = $row['name'];

                                            // Bước 3: Thêm tùy chọn vào combobox
                                            echo "<option value='$roomId'>$roomName</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="giuong-option">
                                    <select name="cb-bed">
                                        <option value="" selected disabled>Chọn giường:</option>
                                        <?php
                                            while ($row_bed = $result_bed->fetch(PDO::FETCH_ASSOC)) {
                                                $roomid = $row_bed['id'];
                                             // Bước 3: Thêm tùy chọn vào combobox
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
                                <td><input type="number" name="txt-cost"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="">Điều khoản thêm (Nếu có)</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea name="txt-description" id="" cols="40" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <button name="btnSave" class="save">Lưu</button>
                                    <button name="btnClear" class="clear">Làm mới</button>
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
<script src="../../js/Box_Search.js"></script>

</html>