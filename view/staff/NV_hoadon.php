<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$id = $_GET['id'];
$sql = "SELECT servicebill.*, contract.id AS contract_id, contract.cost as contract_cost,   room.name as room_name, student.name as student_name, student.id as student_id
        FROM servicebill
        INNER JOIN room ON servicebill.`room-id` = room.id
        INNER JOIN contract ON servicebill.`room-id` = contract.`room-id`
        INNER JOIN student ON contract.`student-id` = student.id
        WHERE servicebill.id = '$id'";

$query = $connection->query($sql);
if (isset($_POST['btnSave'])) {
    $contract=$_POST['txtContract'];
    $Date='';
    $status = '1';
    $description ='';
    $cost = $_POST['txtCost'];
    $sql_bill = "INSERT INTO lastbill VALUES('$id', '$id', '$contract', '$Date', '$cost', ' $description','$status')";
    $kq = $connection->query($sql_bill);;
    if ($kq) {
        echo "<script>alert('Thêm mới thành công')</script>";
        echo "<script>window.location.href='NV_DShoadon.php'</script>"; 
    } else
        echo "<script>alert('Thêm mới không thành công')</script>";
}



include_once './dashboard_NV.html'
?>

<body>
    <form action="" method="post">
        <section class="main-course">
            <div class="header-container">
                <h1>Hóa đơn</h1>
            </div>
            <div class="course-box">
                <ul class="contract">

                    <?php
                    if (isset($query) && $query != null) {
                        $i = 1;
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <li>
                                <table class="contract-option table-borderless">
                                    <tr align="center">
                                        <td colspan="4">
                                            <h1>Hóa đơn tiền phòng</h1>
                                        </td>
                                        <td>
                                            Mã hợp đồng: <input disabled name="txtContract" value="<?php echo $row['contract_id'] ?>" style="max-width: 170px; border: none; background-color: white; outline: none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="" value="<?php echo $row['room-id'];?>"><?php echo $row['room_name']; ?></label></td>
                                        <td style="padding-left: 20px;">
                                            <label for="">Mã sinh viên: <?php echo $row['student_id']; ?></label>
                                        </td>
                                        <td style="padding-left: 20px;">
                                            <label for="">Họ và tên: <?php echo $row['student_name']; ?></label>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            <table class="table">
                                <tr>
                                    <th>STT</th>
                                    <th></th>
                                    <th>Chỉ số mới</th>
                                    <th>Chỉ số cũ</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Tiền phòng</td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"><?php echo $row['contract_cost']; ?> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Tiền điện</td>
                                    <td><?php echo $row['electric-num-old']; ?></td>
                                    <td><?php echo $row['electric-num-new']; ?></td>
                                    <td colspan="2"><?php echo $row['electric-cost']; ?></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tiền nước</td>
                                    <td><?php echo $row['water-num-old']; ?></td>
                                    <td><?php echo $row['water-num-new']; ?></td>
                                    <td colspan="2"><?php echo $row['water-cost']; ?></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td colspan="4">Tổng tiền</td>
                                    <td><input name="txtCost" value="12091" disabled></td>
                                </tr>
                        <?php
                        }
                    }
                        ?>
                        <tr>
                            <td colspan="5" style="text-align: end; text-decoration: none;">
                                <button name="btnSave" style="padding: 10px; background: deepskyblue; border-radius: 20px;">Lưu hóa đơn</button>
                            </td>
                        </tr>
                            </table>
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