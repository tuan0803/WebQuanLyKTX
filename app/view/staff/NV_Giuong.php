<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .room:hover {
            background: rgba(168, 167, 167, 0.5);
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <section class="main-course" id="content">
            <div class="header-container">
                <h1>Giường</h1>
            </div>
            <div class="course-box">
                <ul class="contract">
                    <!-- MAIN -->
                    <main>
                        <div class="table-data" style="display: flex;">
                            <div class="todo">
                                <div class="head">
                                    <h3>Danh sách phòng</h3>
                                </div>
                                <div>
                                    <ul class="todo-list">
                                        <table class="table">
                                            <thead>
                                                <th>STT</th>
                                                <th>Mã phòng</th>
                                                <th colspan="2">Tên Phòng</th>
                                            </thead>
                                            <?php
                                            $i = 1;
                                            foreach ($list_room as $list1) {
                                                $id = $list1['id'];
                                                $name = $list1['name'];
                                            ?>
                                                <tr data-id="<?php echo $id ?>" class="room" style="cursor: pointer;">
                                                    <td>
                                                        <p><?php echo $i++ ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $id ?></p>
                                                    </td>
                                                    <td><?php echo $name ?></td>
                                                    <td><a id="bed_link" href="javascript:void(0);" onclick="showEditBed('<?php echo $id ?>')"><i class='bx bxs-bed'></i></a></td>
                                                </tr>
                                                <form  action="<?php echo _WEB_ROOT ?>/qlygiuong/themgiuong" method="post">
                                                    <div id="Edit-bed-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog" style="display: none; margin-top: 10%;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Thêm giường <?php echo $name ?></h5>
                                                                    <button type="button" onclick="hidenEditBed('<?php echo $id ?>')" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" value="<?php echo $id ?>" id="roomid" name="roomid">
                                                                    <div class="mb-3">
                                                                        <label for="nameBed" class="form-label">Mã giường
                                                                            <input type="text" id="idBed" name="bedid" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="hidden" id="status" name="status" value="0" class="form-control">
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
                                        </table>
                                    </ul>
                                </div>
                            </div>
                            <div class="order">
                                <div class="head">
                                    <h3>Danh sách giường</h3>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã giường</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showbed">
                                        <?php
                                        foreach ($list_bed as $list2) {
                                            $bedid = $list2['bedid'];
                                            $bedroom = $list2['bedroom'];
                                            $status = "";
                                            if ($list2['bedstatus'] == "1") {
                                                $status = "Có người";
                                            } else {
                                                $status = "Trống";
                                            }

                                        ?>
                                            <tr>
                                                <td>
                                                    <p><?php echo $bedid ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $status ?></p>
                                                </td>
                                                <td><a id='edit_link' href="javascript:void(0);" onclick="showFixbed('<?php echo  $bedid ?>')"><i class='bx bx-edit'></i></a></td>
                                                <td><a href="http://localhost/WEBQUANLYKTX/qlygiuong/delete/?id=<?php echo $bedid ?>"> <i class='bx bx-trash' style="color: red;"></i></a></td>
                                            </tr>

                                            <form action="<?php echo _WEB_ROOT ?>/qlygiuong/suagiuong" method="post">
                                                <div id="Fix-bed-<?php echo $bedid ?>" class="modal" tabindex="-1" role="dialog" style="display: none; margin-top: 10%;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Sửa thông tin giường <?php echo $bedid ?></h5>
                                                                <button type="button" onclick="hidenFixbed('<?php echo $bedid ?>')" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" class="roomid" value="<?php echo $bedroom ?>" name="roomid">
                                                                <div class="mb-3">
                                                                    <label for="nameBed" class="form-label">Mã giường</label>
                                                                        <input type="text" name="bedid" class="idBed form-control" value="<?php echo $bedid ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <select name="status" class="status form-control">
                                                                        <option selected disabled><?php echo $status ?></option>
                                                                        <option value="1">Có người</option>
                                                                        <option value="2">Trống</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary btnUpdate">Lưu</button>
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

                        </div>
                    </main>
                    <!-- MAIN -->
                </ul>
            </div>
        </section>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("tr[data-id]").click(function() {
            var roomId = $(this).data("id");
            console.log("Bạn đã chọn hàng có ID: " + roomId);
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlygiuong/showBed",
                method: "POST",
                data: {
                    roomId: roomId
                },
                success: function(data) {
                    $("#showbed").html(data);
                    console.log(data)
                }
            })
        });

    });
    $(".btnSave").on("click", function() {
        var bedid = $("#idBed").val();
        var roomid = $("#roomid").val();
        var status = $("#status").val();
        $.ajax({
            url: "<?php echo _WEB_ROOT ?>/qlygiuong/themgiuong",
            method: "POST",
            data: {
                bedid: bedid,
                roomid: roomid,
                status: status
            },
            success: function(response) {
            }
        });
        console.log(id);
        console.log(roomid);
        console.log(status);
    });
    

    function hidenEditBed(Id) {
        $("[id^=Edit-bed-]").hide();
        $("#Edit-bed-" + Id).hide();
    };

    function showEditBed(Id) {
        $("[id^=Edit-bed-]").hide();
        $("#Edit-bed-" + Id).show();
        console.log(Id);
    };
    function hidenFixbed(Id) {
        $("[id^=Fix-bed-]").hide();
        $("#Fix-bed-" + Id).hide();
    };

    function showFixbed(Id) {
        $("[id^=Fix-bed-]").hide();
        $("#Fix-bed-" + Id).show();
        console.log(Id);
    };
</script>

</html>
