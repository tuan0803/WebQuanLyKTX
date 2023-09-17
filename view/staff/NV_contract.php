<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$sql = "SELECT * FROM contract";
$data = $connection->query($sql);
$data->execute();

include_once './dashboard_NV.html'
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.search').keypress(function(event) {
            if (event.which === 13) {
                performSearch();
            }
        });
    });

    function performSearch() {
        var searchText = $('.search').val();
        $.post()
    }
</script>

</script>

<body>
    <form action="" method="post">
        <section class="main-course">
            <div class="header-container">
                <h1>Hợp đồng</h1>
                <div class="box-right">
                    <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text" class="search">
                    </div>
                    <a href="./NV_addcontract.php"><i class='bx bx-plus-circle'></i></a>
                </div>
            </div>
            <div class="course-box">
                <ul class="contract">
                    <table class="contract-list table">
                        <tr>
                            <th>STT</th>
                            <th>Số hợp đồng</th>
                            <th>Mã Sinh Viên</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Phòng</th>
                            <th>Giường</th>
                            <th>Giá</th>
                            <th colspan="2"></th>
                        </tr>
                        <?php
                        if (isset($data) && $data != null) {
                            $i = 1;
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['student-id'] ?></td>
                                    <td><?php echo $row['start-date'] ?></td>
                                    <td><?php echo $row['finish-date'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['room-id'] ?></td>
                                    <td><?php echo $row['bed-id'] ?></td>
                                    <td><?php echo $row['cost'] ?></td>
                                    <td><a href="./NV_Contract_edit.php?id=<?php echo $row['id'] ?>"><i class='bx bx-edit'></i></a></td>
                                    <td><a href="./NV_removeContract.php?id=<?php echo $row['id'] ?>"><i class='bx bx-trash'></i></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </ul>
            </div>
        </section>
    </form>
</body>



</html>