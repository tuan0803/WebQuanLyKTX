<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Hóa đơn</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form action="" method="post">
        <section class="main-course" id="content">
            <main>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Danh sách sinh viên</h3>
                            <i class='bx bx-search' id="search-icon"></i>
                            <input type="text" class="slide-in form-control" id="search-input" style="display: none;">
                        </div>
                        <table class="table">
                            <tr>
                                <th>STT</th>
                                <th>Tên sinh viên</th>
                                <th>Mã hợp đồng</th>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <a href="javascript:void(0);" student-id="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> -->
                                </td>
                            </tr>
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
                                <tr>

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
        $("table.table a").click(function() {
            var studentId = $(this).data("student-id");
            console.log(studentId);
            $.ajax({
                type: "POST",
                url: "<?php echo _WEB_ROOT ?>/qlycontract/",
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
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/Box_Search.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/main.js"></script>
</html>