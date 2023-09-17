<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
$sql_room = "SELECT * FROM room";
$data_room = $connection->query($sql_room);
$data_room->execute();

include_once './dashboard_NV.html'
?>
<link rel="stylesheet" href="../../css/index.css">





<body>
    <form action="" method="post">
        <section class="main-course" id="content">
            <div class="header-container">
                <h1>Hóa đơn</h1>
            </div>
            <main>
                <ul class="box-info">
                    <li>
                        <table>
                            <tr>
                                <th>STT</th>
                                <th>Sô hợp đồng</th>
                                <th>Thời hạn</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>21</td>
                                <td></td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Phòng</h3>
                            <i class='bx bx-search' id="search-icon"></i>
                            <input type="text" class="slide-in" id="search-input" style="display: none;">
                        </div>
                        <table class="table">
                            <?php
                            if (isset($data_room) && $data_room != null) {
                                $i = 1;
                                while ($row_room = $data_room->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" data-room-id="<?php echo $row_room['id']; ?>"><?php echo $row_room['name']; ?></a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="todo">
                        <ul class="todo-list">
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th colspan="2">Số hóa đơn</th>
                                </tr>
                            </table>
                            <table class="hoadon2">
                               <tr >

                               </tr>
                            </table>
                        </ul>
                    </div>
                </div>
            </main>
        </section>

    </form>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        // Gắn sự kiện click vào thẻ <a> của phòng
        $("table.table a").click(function() {
            // Lấy ID của phòng từ thuộc tính data-room-id
            var roomId = $(this).data("room-id");
            // Hiển thị thông báo alert với ID phòng
            console.log(roomId);
            $.ajax({
                type: "POST",
                url: "NV_timkimHoadon.php",
                data: {
                    roomId: roomId
                },
                success: function(response) {
                    $(".hoadon2").html(response);
                }
            });
        });
    });
</script>
<script src="../../js/Box_Search.js"></script>