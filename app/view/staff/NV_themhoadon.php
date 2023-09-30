<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
</head>

<body>
    <form action="" method="post">
        <section class="main-course" id="content">
            <div class="header-container">
                <h1>Thêm hóa đơn</h1>
            </div>
            <div class="course-box">
                <ul class="contract">
                    <!-- MAIN -->
                    <main>
                        <div class="table-data">
                            <div class="todo">
                                <div class="head">
                                    <h3>Danh sách sinh viên</h3>
                                    <i class='bx bx-search' id="search-icon" style="font-size: 1.4rem; "></i>
                                    <select name="" id="search-input" class="form-control" style=" width: 200px;">
                                        <option>Chọn sinh viên</option>
                                        <?php
                                        foreach ($list_student as $list4) {
                                            $id = $list4['id'];
                                            $name = $list4['name'] ?? '';
                                        ?>
                                            <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <ul class="todo-list">
                                    <table class="table">
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã sinh viên</th>
                                            <th>Tên sinh viên</th>
                                            <th>Mã hợp đồng</th>
                                            <th>Tiền phòng</th>
                                        </tr>
                                        <tbody id="showContract">
                                            <?php
                                            $i = 1;
                                            foreach ($list_contract as $list1) {
                                                $id = $list1['id'] ?? '';
                                                $contractid = $list1['contractid'] ?? '';
                                                $cost_room = $list1['cost_room'] ?? '';
                                                $name = $list1['name'] ?? '';
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $id ?></td>
                                                    <td> <?php echo $name ?></td>
                                                    <td><input type="text" id="contract" value="<?php echo $contractid ?>" style=" width: auto; width: 70px;" disabled readonly></td>
                                                    <td><input type="text" value="<?php echo number_format($cost_room, 0) ?>" style=" width: auto; width: 70px;" disabled readonly></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </ul>
                            </div>
                            <div class="order">
                                <div class="head">
                                    <h3>Danh sách hóa đơn dịch vụ</h3>
                                    <select name="" id="showdate" class="form-control" style="width: 200px; background: #F5F5F5;">
                                        <option selected disabled>Chọn tháng</option>

                                    </select>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã dịch vụ</th>
                                            <th>Ngày tháng năm</th>
                                            <th>Tiền điện</th>
                                            <th>Tiền nước</th>
                                            <th>Tiền mạng</th>
                                            <th>Tiền rác</th>
                                            <th>Tổng tiền</th>
                                            <th>Tiền đã chia</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showbill">
                                        <?php
                                        $i = 1;
                                        foreach ($list_service as $list2) {
                                            $id = $list2['id'] ?? '';
                                            $contractid = $list2['roomname'] ?? '';
                                            $date = $list2['date'] ?? '';
                                            $electric_cost = $list2['electric_cost'] ?? '';
                                            $water_cost = $list2['water_cost'] ?? '';
                                            $wifi_cost = $list2['wifi_cost'] ?? '';
                                            $wast_cost = $list2['wast_cost'] ?? '';
                                            $totalcost = $list2['totalcost'] ?? '';
                                            $cost = $list2['cost'] ?? '';
                                        ?>
                                            <tr>
                                                <td> <input type="text" value="<?php echo $id ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td> <?php echo $date ?></td>
                                                <td><input type="text" value="<?php echo number_format($electric_cost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td><input type="text" value="<?php echo number_format($water_cost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td><input type="text" value="<?php echo number_format($wifi_cost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td> <input type="text" value="<?php echo number_format($wast_cost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td> <input type="text" value="<?php echo number_format($totalcost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                                <td> <input type="text" value="<?php echo number_format($cost, 0) ?>" style=" width: auto; width: 70px;" disabled></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form action="" method="post">
                            <div id="them" class="modal modal-lg" style=" top: 40%; left: 50%; margin-top: 90px; padding: 10px;  height: 100vh; transform: translate(-50%, -50%); background: #fff;">
                                <div class="modal-header">
                                    <h5 class="modal-title">Thêm hóa đơn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="showDetail" style="  overflow: auto; max-height: 70vh;">

                                </div>
                                <div class="modal-footer">
                                    <button class="save">Lưu</button>
                                </div>
                            </div>
                        </form>
                            <div style="align-items: center; display: flex; justify-content: center; margin: 20px;">
                                <a class="btn btn-primary" href="javascript:void(0);" id="submit" onclick="showthem()" role="button" style=" pointer-events: none;">Thêm</a>
                            </div>
                    </main>
                </ul>
            </div>
        </section>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search-input").change(function() {
            var id = $("#search-input").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhoadon/searchContract",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#showContract").html(data);
                }
            })
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhoadon/searchDate",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#showdate").html(data);
                }
            })
        })
        $("#showdate").change(function() {
            var date = $("#showdate").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhoadon/searchbill",
                method: "POST",
                data: {
                    date: date
                },
                success: function(data) {
                    $("#showbill").html(data);
                }
            })

        })
        $("#search-input").on("input", function() {
            ButtonVisibility();
        });

        // Sự kiện "change" trên trường select
        $("#showdate").on("change", function() {
            ButtonVisibility();
        });

        // Hàm kiểm tra việc hiển thị nút
        function ButtonVisibility() {
            var id = $("#search-input").val();
            var date = $("#showdate").val();
            var submitButton = $("#submit");

            if (id.trim() !== "" && date !== "") {
                submitButton.css("pointer-events", "auto");
            } else {
                submitButton.css("pointer-events", "none");
            }
        };


        $("#overlay").click(function() {
            $("#overlay").hide();
            $("#them").hide();
        });
        $(".close").click(function() {
            $("#overlay").hide();
            $("#them").hide();
        });
    })

    function showthem() {
        var id = $("#search-input").val();
        var date = $("#showdate").val();
        console.log(id);
        console.log(date);
        $("#overlay").show();
        $("#them").show();
        $.ajax({
            url: "<?php echo _WEB_ROOT ?>/qlyhoadon/showDetail",
            method: "POST",
            data: {
                id: id,
                date: date
            },
            success: function(data) {
                $("#showDetail").html(data);
                console.log(data);
            }
        })

    }
$(".save").on("click", function() {
    var id = $("input[name='id']").val();
    var studentid = $("input[name='studentid']").val();
    var serviceid = $("input[name='serviceid']").val();
    var contractid = $("input[name='contractid']").val();
    var date = $("input[name='date']").val();
    var cost = $("input[name='cost']").val();
    var status = $("input[name='status']").prop("checked") ? 1 : 0;
    var description = $("textarea[name='description']").val();
    $.ajax({
        url: "<?php echo _WEB_ROOT ?>/qlyhoadon/themhoadon", 
        method: "POST",
        data: {
            id: id,
            studentid: studentid,
            serviceid: serviceid,
            contractid: contractid,
            date: date,
            cost: cost,
            status: status,
            description: description
        },
        success: function(response) {
            $("#them").modal("hide");
        }
    });
});

</script>

</html>