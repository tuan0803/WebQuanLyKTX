<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Phòng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="main-course">
        <div class="header-container">
            <h1>Danh sách phòng</h1>
            <div class="box-right" style="right: 0; gap: 1rem;">
                <div class="box-search">
                    <form action="timkiem" method="post">
                    <input type="text" name="roomid" id="search">
                    <i><button type="submit" class='bx bx-search'></button></i>
                    </form>
                    
                    
                </div>
                <button onclick="showAddRoom()"
                    style="padding: 10px; align-items: center; display: flex; background: blue; color: white; outline: none; border-radius: 50%; cursor: pointer; "><i
                        class='bx bx-plus-circle'></i></button>
            </div>
        </div>
        <div class="course-box">
            <ul class="room-lists">
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên Phòng</th>
                        <th>Số người hiện tại/còn trống</th>
                        <th colspan="4">Trạng thái</th>
                    </tr>

                    <?php
                    $i = 1;
                    foreach ($list as $list1) {
                        $id              = $list1['id'] ?? '';
                        $name            = $list1['name'] ?? '';
                        $currentquantity = $list1['SoLuongGiuongStatus1'] ?? '';
                        $status          = $list1['status'] ?? '';
                        $maxquantity     = $list1['SoLuongGiuongStatus0'] ?? '';


                        ?>
                        <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $id ?>
                            </td>
                            <td>
                                <?php echo $name ?>
                            </td>
                            <td>
                                <?php echo $currentquantity . "/" . $maxquantity ?>
                            </td>
                            <td>
                                <?php if ($currentquantity == $maxquantity) {
                                    echo "<i class='bx bxs-circle' style='color: red;'></i>";
                                } else {
                                    echo " <i class='bx bxs-circle' style='color: green;'></i>";
                                } ?>
                            </td>
                            <td><a id='edit_link' href="javascript:void(0);" onclick="showEditRoom('<?php echo $id ?>')"><i
                                        class='bx bx-edit'></i></a></td>
                            </td>
                            <td><a id="bed_link" href="javascript:void(0);" onclick="showEditBed('<?php echo $id ?>')"><i
                                        class='bx bxs-bed'></i></a></td>
                            <td> <a id='deleteLink'
                                    href="http://localhost/WEBQUANLYKTX/qlyphong/delete/?roomId=<?php echo $id ?>"
                                    onclick="deleteRoom('<?php echo $id ?>')">
                                    <i class='bx bx-trash' style="color: red;"></i>
                                </a></td>
                            </td>
                        </tr>
                        <form action="<?php echo _WEB_ROOT ?>/qlyphong/suaphong" method="post">
                            <div id="Edit-room-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog"
                                style="display: none; margin-top: 10%;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Sửa thông tin phòng
                                                <?php echo $name ?>
                                            </h5>
                                            <input type="hidden" value="<?php echo $id ?>" name="id">
                                            <button type="button" onclick="hidenEditRoom('<?php echo $id ?>')" class="close"
                                                data-dismiss="modal" aria-label="Close"
                                                style="outline: none; background: red;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nameRoom" class="form-label">Tên Phòng</label>
                                                <input type="text" id="nameRoom" name="name" value="<?php echo $name ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" id="maxquantity" name="maxquantity"
                                                    value="<?php echo $maxquantity ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="<?php echo _WEB_ROOT ?>/qlyphong/themgiuong" method="post">
                            <div id="Edit-bed-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog"
                                style="display: none; margin-top: 10%;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm giường
                                                <?php echo $name ?>
                                            </h5>
                                            <input type="hidden" value="<?php echo $id ?>" name="roomid">
                                            <button type="button" onclick="hidenEditBed('<?php echo $id ?>')" class="close"
                                                data-dismiss="modal" aria-label="Close"
                                                style="outline: none; background: red;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nameBed" class="form-label">Mã giường
                                                    <input type="text" id="idBed" name="id" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" id="status" name="status" class="form-control">
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
                </table>
            </ul>
            <form action="<?php echo _WEB_ROOT ?>/qlyphong/themphong" method="post">
                <div id="AddRoom" class="modal" tabindex="-1" role="dialog" style="display:none; margin-top: 10%;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm phòng</h5>
                                <button type="button" onclick="hidenAddRoom()" class="close" data-dismiss="modal"
                                    aria-label="Close" style="outline: none; background: red;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="idRoom" class="form-label">Mã Phòng</label>
                                    <input type="text" id="id" name="id" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nameRoom" class="form-label">Tên Phòng</label>
                                    <input type="text" id="nameRoom" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    
                                    <input type="hidden" id="nameRoom" name="currentquantity" value='0' class="form-control">
                                </div>
                                <div class="mb-3">
                                    
                                    <input type="hidden" id="nameRoom" name="maxquantity" value="8" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" id="maxquantity" name="maxquantity" value="0"
                                        class="form-control">
                                    <input type="hidden" id="currentquantity" name="currentquantity"
                                        class="form-control" value="0">
                                    <input type="hidden" id="status" name="status" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
</body>
<script type="text/javascript">
    function hidenEditRoom(roomId) {
        $("[id^=Edit-room-]").hide();
        $("#Edit-room-" + roomId).hide();
        $("#overlay").hide();
    };

    function showEditRoom(roomId) {
        $("[id^=Edit-room-]").hide();
        $("#Edit-room-" + roomId).show();
        $("#overlay").show();
        console.log(roomId);
    };

    function hidenEditBed(roomId) {
        $("[id^=Edit-bed-]").hide();
        $("#Edit-bed-" + roomId).hide();
        $("#overlay").hide();
    };

    function showEditBed(roomId) {
        $("[id^=Edit-bed-]").hide();
        $("#Edit-bed-" + roomId).show();
        $("#overlay").show();
        console.log(roomId);
    };

    function hidenAddRoom() {
        $("#AddRoom").hide();
        $("#overlay").hide();
    }

    function showAddRoom() {
        $("#AddRoom").show();
        $("#overlay").show();
    }
</script>

</html>