<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/WEBQUANLYKTX/public/assets/staff/css/index.css">
    <title>Hợp đồng</title>
</head>

<body>
    <form action="" method="post">
        <section class="main-course" id="content">
            <div class="header-container">
                <h3>Danh sách hợp đồng</h3>
                <div class="box-right">
                    <div class="box-search">
                        <i class='bx bx-search' id="search-icon"></i>
                        <input type="text" class="slide-in form-control" id="search-input" style="display: none;">
                    </div>
                    <a href="<?php echo _WEB_ROOT ?>/qlyhopdong/showformthem"><i class='bx bx-plus-circle'></i></a>
                </div>
            </div>
            <div class="course-box">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Số hợp đồng</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th style="width: 80px;">Ghi chú</th>
                            <th>Phòng</th>
                            <th>Giường</th>
                            <th>Giá</th>
                            <th>Tiền đặt cọc</th>
                            <th colspan="2"></th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody id="show">
                        <?php
                        $i = 1;
                        foreach ($list as $list1) {
                            $id = $list1['id'] ?? '';
                            $studentid = $list1['studentid'] ?? '';
                            $studentname = $list1['student_name'] ?? '';
                            $startdate = $list1['startdate'] ?? '';
                            $finishdate = $list1['finishdate'] ?? '';
                            $status = "";
                            $description = $list1['description'] ?? '';
                            $roomid = $list1['roomid'] ?? '';
                            $bedid = $list1['bedid'] ?? '';
                            $cost = $list1['cost'] ?? '';
                            $codcost = $list1['codcost'] ?? '';

                            if ($list1['status']==0) {
                                $status = "Hết hạn";
                            } else {
                                $status = "Còn hạn";
                            }
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $id ?></td>
                                <td><?php echo $studentid ?></td>
                                <td><?php echo $studentname ?></td>
                                <td><?php echo $startdate ?></td>
                                <td><?php echo $finishdate ?></td>
                                <td><?php echo $status ?></td>
                                <td style="width: 80px;"><?php echo $description ?></td>
                                <td><?php echo $roomid ?></td>
                                <td><?php echo $bedid ?></td>
                                <td><?php echo $cost ?></td>
                                <td><?php echo $codcost ?></td>
                                <td><a id='edit_link' href="http://localhost/WEBQUANLYKTX/qlyhopdong/showformsua/<?php echo $id ?>" onclick="showEditContract('<?php echo $id ?>')"><i class='bx bx-edit'></i></a></td>
                                </td>
                                <td> <a id='deleteLink' href="http://localhost/WEBQUANLYKTX/qlyhopdong/delete/?contractId=<?php echo $id ?>" onclick="deleteRoom('<?php echo $id ?>')">
                                        <i class='bx bx-trash' style="color: red;"></i>
                                    </a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </form>
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/Box_Search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#search-input").keyup(function() {
            var id = $("#search-input").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/searchcontract",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#show").html(data);
                    console.log(data);
                }
            })
            console.log(id);
        });
        $(".room").change(function() {
            var id = $(".room").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/showBed",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#bed").html(data);
                }
            })
            console.log(id);
        })
    })
</script>

</html>