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
    <section class="main-course" id="content">
        <div class="header-container">
            <h3>Danh sách hóa đơn</h3>

            <div class="box-right">
                <div class="box-search">
                    <i class='bx bx-search' id="search-icon"></i>
                    <input type="text" class="slide-in form-control" id="search-input" style="display: none;">
                </div>
                <a href="<?php echo _WEB_ROOT ?>/qlyhoadon/showformthem"><i class='bx bx-plus-circle'></i></a>
                <form method="Post" action="<?php echo _WEB_ROOT ?>/qlyhoadon/export" style="margin-left: 10px;">
                    <button type="submit" class="btn btn-outline-success" id="exportButton">Xuất excel</button>
                </form>
            </div>
        </div>
        <div class="course-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số hóa đơn</th>
                        <th>Mã hợp đồng</th>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Phòng</th>
                        <th>Mã dịch vụ </th>
                        <th>Hạn thanh toán</th>
                        <th>Tiền thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th colspan="2"></th>
                    </tr>
                    </tr>
                </thead>
                <tbody id="showlastbill">
                    <?php
                    $i = 1;
                    foreach ($list as $list1) {
                        $id = $list1['id'] ?? '';
                        $contractid = $list1['contractid'] ?? '';
                        $student_id = $list1['student_id'] ?? '';
                        $student_name = $list1['student_name'] ?? '';
                        $room_name = $list1['room_name'] ?? '';
                        $servicebill_id = $list1['servicebill_id'] ?? '';
                        $date = $list1['date'] ?? '';
                        $cost = $list1['cost'] ?? '';
                        $description = $list1['description'] ?? '';
                        $status = "";
                        if ($list1['status'] == "thu du") {
                            $status = "Thanh toán đủ";
                        } elseif($list1['status']=="no"){
                            $status = "Nợ";
                        }
                        else {
                            $status = "Chưa thanh toán";
                        }
                    ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $id ?></td>
                            <td><?php echo $contractid ?></td>
                            <td><?php echo $student_id ?></td>
                            <td><?php echo $student_name ?></td>
                            <td><?php echo $room_name ?></td>
                            <td><?php echo $servicebill_id ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo number_format($cost, 0) ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $status ?></td>
                            <td><a id='edit_link' href="javascript:void(0);" onclick="showEditBill('<?php echo $id ?>')"><i class='bx bx-edit'></i></a></td>
                            </td>
                            <td> <a id='deleteLink' href="http://localhost/WEBQUANLYKTX/qlyhoadon/delete/?id=<?php echo $id ?>" onclick="deleteRoom('<?php echo $id ?>')">
                                    <i class='bx bx-trash' style="color: red;"></i>
                                </a></td>
                        </tr>
                        <form action="<?php echo _WEB_ROOT ?>/qlyhoadon/suabill" method="post">
                            <div id="Edit-Bill-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog" style="display: none; margin-top: %;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hóa đơn <?php echo $id ?></h5>
                                            <button type="button" onclick="hidenEditBill('<?php echo $id ?>')" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" value="<?php echo $id ?>" id="id" name="id">
                                            <input type="hidden" value="<?php echo $contractid ?>" id="contractid" name="contractid">
                                            <input type="hidden" value="<?php echo $servicebill_id ?>" id="serviceid" name="serviceid">
                                            <input type="hidden" value="<?php echo $date ?>" id="date" name="date">
                                            <div class="mb-3">
                                                <label for="cost" class="form-label">Tổng tiền thanh toán</label>
                                                <input type="number" id="cost" name="cost" value="<?php echo $cost ?>" class="form-control">
                                            </div>
                                            <div class="form-check mb-3" style="gap: 1rem;">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Thu đủ
                                                </label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="no">Nợ</option>
                                                    <option value="thu du">Thanh toán đủ</option>
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Ghi chú</label>
                                                <textarea name="description" id="description" cols="10" rows="10" class="form-control"><?php echo $description ?></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btnSave">Lưu</button>
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
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/Box_Search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#search-input").keyup(function() {
            var id = $("#search-input").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhoadon/searchlastbill",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#showlastbill").html(data);
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
    });

    function performSearch() {
        var id = $("#search-input").val();

    }

    function hidenEditBill(id) {
        $("[id^=Edit-Bill-]").hide();
        $("#Edit-Bill-" + id).hide();
        $("#overlay").hide();
    };

    function showEditBill(id) {
        $("[id^=Edit-Bill-]").hide();
        $("#Edit-Bill-" + id).show();
        console.log(id);
    };
    $(".btnSave").on("click", function() {
        var id = $("#id").val();
        var serviceid = $("input[name='serviceid']").val();
        var contractid = $("input[name='contractid']").val();
        var date = $("#dateservice").val();
        var cost = $("input[name='cost']").val();
        var status = $("#status").val();
        var description = $("#description").val();
        $.ajax({
            url: "<?php echo _WEB_ROOT ?>/qlyhoadon/suabill",
            method: "POST",
            data: {
                id: id,
                contractid: contractid,
                serviceid: serviceid,
                date: date,
                cost: cost,
                status: status,
                description: description
            },
            success: function(response) {
                $("#them").modal("hide");
            }
        });
        console.log(contractid);
    });
</script>

</html>