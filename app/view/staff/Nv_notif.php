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
            <h1>Danh sách tin</h1>
            <div class="box-right" style="right: 0; gap: 1rem;">
                <div class="box-search ">
                    <i class='bx bx-search'></i>
                    <input type="text" id="search" class="form-control" placeholder="Nhập...">
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
                        <th>Tiêu đề</th>

                        <th>Nội dung ngắn</th>
                        <th colspan="3">Trạng thái</th>

                    </tr>
                    <tbody id="showroom">
                        <?php
                        $i = 1;
                        foreach ($list as $list1) {
                            $id        = $list1['id'] ?? '';
                            $name      = $list1['name'] ?? '';
                            $shortdesc = $list1['shortdesc'] ?? '';
                            $fulldesc  = $list1['fulldesc'] ?? '';
                            $idstaff   = $list1['idstaff'] ?? '';
                            $date      = $list1['date'] ?? '';


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
                                    <?php echo $shortdesc ?>
                                </td>

                                <td><a id='edit_link' href="javascript:void(0);"
                                        onclick="showEditRoom('<?php echo $id ?>')"><i class='bx bx-edit'></i></a></td>
                                </td>
                                <!-- <td><a id="bed_link" href="javascript:void(0);" onclick="showEditBed('<?php echo $id ?>')"><i class='bx bxs-bed'></i></a></td> -->
                                <td> <a id='deleteLink'
                                        href="http://localhost/WEBQUANLYKTX/qlynotif/delete/<?php echo $id ?>">
                                        <i class='bx bx-trash' style="color: red;"></i>
                                    </a></td>
                                </td>
                            </tr>
                            <form action="<?php echo _WEB_ROOT ?>/qlynotif/updateNotif" method="post">
                                <div id="Edit-room-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog"
                                    style="display: none; margin-top: 10%;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Sửa thông tin phòng
                                                    <?php echo $name ?>
                                                </h5>
                                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                                <button type="button" onclick="hidenEditRoom('<?php echo $id ?>')"
                                                    class="close" data-dismiss="modal" aria-label="Close"
                                                    style="outline: none; background: red;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Tiêu
                                                        đề</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                                        name="name" placeholder="Tiêu đề" value="<?php echo $name; ?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Tiêu đề ngắn"
                                                        name="shortdesc" aria-label="Username"
                                                        value="<?php echo $shortdesc; ?>">
                                                </div>
                                                <div>
                                                    <input type="date" name="date" value="<?php echo $date; ?>" />
                                                </div>
                                                <div class="form-floating">
                                                    <input class="form-control" placeholder="Leave a comment here"
                                                        name="fulldesc" id="floatingTextarea2" style="height: 100px"
                                                        value="<?php echo $fulldesc; ?>"></input>
                                                    <label for="floatingTextarea2">Thông tin chi tiết</label>
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
            </ul>
            <form action="<?php echo _WEB_ROOT ?>/qlynotif/insertNotif" method="post">
                <div id="AddRoom" class="modal" tabindex="-1" role="dialog" style="display:none; margin-top: 10%;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm tin</h5>
                                <button type="button" onclick="hidenAddRoom()" class="close" data-dismiss="modal"
                                    aria-label="Close" style="outline: none; background: red;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                        placeholder="Tiêu đề">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Tiêu đề ngắn"
                                        name="shortdesc" aria-label="Username">
                                </div>
                                <div>
                                    <input type="date" name="date" value="<?php echo $date; ?>" />
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="fulldesc"
                                        id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Thông tin chi tiết</label>
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

    function hidenAddRoom() {
        $("#AddRoom").hide();
        $("#overlay").hide();
    }

    function showAddRoom() {
        $("#AddRoom").show();
        $("#overlay").show();
    }
    $(document).ready(function () {
        $("#search").keyup(function () {
            var id = $("#search").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyphong/searchroom",
                data: {
                    id: id
                },
                method: "POST",
                success: function (data) {
                    $("#showroom").html(data);
                }
            })
        })
    })
</script>

</html>