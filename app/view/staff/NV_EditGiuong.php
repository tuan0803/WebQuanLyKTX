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
    <form action="<?php echo _WEB_ROOT ?>/qlygiuong/suagiuong" method="post">
        <section class="main-course" id="content">
            <div class="course-box">
                <ul class="contract">
                    <!-- MAIN -->
                    <main>

                        <div role="dialog" style="display: block; position: none; margin-top: 5%; font-size: 20px;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight: 500; ">Sửa thông tin giường <?php echo $info['bedid'] ?></h5>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="roomid" value="<?php echo $info['roomid'] ?>" name="roomid">
                                        <div class="mb-3">
                                            <label for="nameBed" class="form-label">Mã giường</label>
                                            <input type="text" name="bedid" class="idBed form-control" value="<?php echo $info['bedid'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <select name="status" class="status form-control">
                                                <option selected disabled><?php if( $info['status']==0){ echo "Trống" ;}else{ echo "Có người";} ?></option>
                                                <option value="1">Có người</option>
                                                <option value="0 ">Trống</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btnUpdate">Lưu</button>
                                    </div>
                                </div>
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
            success: function(response) {}
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