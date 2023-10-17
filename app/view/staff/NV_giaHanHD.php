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
                        <input type="text" class="slide-in form-control" id="search" placeholder="Nhập...">
                    </div>
                    <!-- <a href="<?php echo _WEB_ROOT ?>/qlyhoadon/showformthem"><i class='bx bx-plus-circle'></i></a> -->
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
                            if (!empty($finishdate)) {
                                $currentDate = date('Y-m-d'); 
                                if ($finishdate < $currentDate) {
                                    $status="Hết hạn";
                                } else {
                                    $status="Còn hạn";
                                }
                            } else {
                                $status="Không có ngày kết thúc được đặt.";
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
                                

                                <td><a id='edit_link' href="javascript:void(0);" onclick="showEditcontractGH('<?php echo $id ?>')"><i class='bx bx-edit'></i></a></td>
                                </td>
                            </tr>
                            <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/EditcontractGH" method="post">
                                <div id="Edit-contractGH-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog" style="display: none; margin-top: 10%;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Gia hạn hợp đồng <?php echo $id  ?></h5>
                                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                                <button type="button" onclick="hidenEditcontractGH('<?php echo $id ?>')" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="finishdate" class="form-label">Chọn ngày mới</label>
                                                    <input type="date" id="finishdate" name="finishdate" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="hidden" id="studentid" name="studentid" value="<?php echo $studentid ?>" class="form-control">
                                                    <input type="hidden" id="startdate" name="startdate" value="<?php echo $startdate ?>" class="form-control">
                                                    <input type="hidden" id="description" name="description" value="<?php echo $description ?>" class="form-control">
                                                    <input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid ?>" class="form-control">
                                                    <input type="hidden" id="bedid" name="bedid" value="<?php echo $bedid ?>" class="form-control">
                                                    <input type="hidden" id="cost" name="cost" value="<?php echo $cost ?>" class="form-control">
                                                    <input type="hidden" id="status" name="status" value="1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        $("#search").keyup(function() {
            var id = $("#search").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/searchcontractGH",
                data: {
                    id: id
                },
                method: "POST",
                success: function(data) {
                    $("#show").html(data);
                }
            })
        })
    })

    function hidenEditcontractGH(id) {
        $("[id^=Edit-contractGH-]").hide();
        $("#Edit-contractGH-" + id).hide();
        $("#overlay").hide();
    };

    function showEditcontractGH(id) {
        $("[id^=Edit-contractGH-]").hide();
        $("#Edit-contractGH-" + id).show();
        $("#overlay").show();
        console.log(id);
    };
</script>

</html>