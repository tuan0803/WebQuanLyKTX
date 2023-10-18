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
                    <li>
                        <!-- MAIN -->
                        <table class="contract-option">
                            <tr>
                                <td>
                                    <label for="">Nhập hóa đơn</label>
                                </td>
                                <td>
                                    <label for="">Họ và tên:</label>
                                </td>
                                <td>
                                    <label for="">Chọn ngày:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="id" name="id" placeholder="Nhập mã hóa đơn">
                                </td>
                                <td>
                                    <select id="studentid" class="form-control" style="font-size: 20px; margin-top: -10px; padding: 5px; background: #F5F5F5;">
                                        <option disabled selected>Chọn sinh viên</option>
                                        <?php
                                        foreach ($list_student as $list_student) {
                                            $id = $list_student['id'];
                                            $name = $list_student['name'];
                                        ?>

                                            <option value="<?php echo $id ?>"><?php echo $name ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </td>
                                <td>
                                    <select name="date" id="dateservice" class="form-control" style="width: 200px; background: #F5F5F5; margin-top: -10px;">
                                        <option selected disabled>Chọn tháng</option>
                                        <optgroup id="showdate">

                                        </optgroup>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </li>
                    <li class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hợp đồng</th>
                                    <th>Tên phòng</th>
                                    <th>Tiền phòng</th>
                                </tr>
                            </thead>
                            <tbody id="showContract">
                                <?php
                                $i = 1;
                                foreach ($list_contract as $list1) {
                                    $id = $list1['id'] ?? '';
                                    $contractid = $list1['contractid'] ?? '';
                                    $roomid = $list1['roomid'] ?? '';
                                    $roomname = $list1['roomname'] ?? '';
                                    $cost_room = $list1['cost_room'] ?? '';
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><input type="text" id="contract" name="contractid" value="<?php echo $contractid ?>" style=" width: 70px;" disabled readonly></td>
                                        <td><?php echo $roomname ?></td>
                                        <td><?php echo number_format($cost_room, 0) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </li>
                    <li class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã dịch vụ</th>
                                    <th>Ngày tháng năm</th>
                                    <th>Tiền điện</th>
                                    <th>Tiền nước</th>
                                    <th>Tiền mạng</th>
                                    <th>Tiền rác</th>
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
                                    $totalcost = $list2['indivisualcost'] ?? '';
                                    $cost = $list2['cost'] ?? '';
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td> <input type="text" name="serviceid" value="<?php echo $id ?>" style=" width: auto; width: 70px;" disabled></td>
                                        <td> <?php echo $date ?></td>
                                        <td><?php echo number_format($electric_cost, 0) ?></td>
                                        <td><?php echo number_format($water_cost, 0) ?></td>
                                        <td><?php echo number_format($wifi_cost, 0) ?></td>
                                        <td> <?php echo number_format($wast_cost, 0) ?></td>
                                        <td> <?php echo number_format($totalcost, 0) ?></td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <input type="hidden" name="description" value=" ">
                        <input type="hidden" name="status" value="">
                    </li>
                    <li>
                        <div style="align-items: center; display: flex; justify-content: center; margin: 20px;">
                            <button id="save" class="btn btn-primary" id="submit">Thêm</button>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#studentid").change(function() {
            var id = $("#studentid").val();
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
            console.log(id);
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
        $("#dateservice").change(function() {
            var date = $("#dateservice").val();
            var studentid = $("#studentid").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhoadon/searchbill",
                method: "POST",
                data: {
                    studentid: studentid,
                    date: date
                },
                success: function(data) {
                    $("#showbill").html(data);
                }
            })
            console.log(studentid);
        })



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
    $("#save").on("click", function() {
        var id = $("#id").val();
        var studentid = $("input[name='studentid']").val();
        var serviceid = $("input[name='serviceid']").val();
        var contractid = $("input[name='contractid']").val();
        var date = $("#dateservice").val();
        var cost = $("input[name='cost']").val();
        var status = "0";
        var description = $("#description").val();
        $.ajax({
            url: "<?php echo _WEB_ROOT ?>/qlyhoadon/themhoadon",
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