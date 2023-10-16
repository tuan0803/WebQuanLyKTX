!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa phòng</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/index.css">
        <title>Phòng</title>
    </head>

    <body>
        <section class="main-course">
            <div class="header-container">
                <h1>Chuyển phòng</h1>
                <div class="box-right" style="right: 0;">
                    <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text" id="search" placeholder="Nhập...">
                    </div>
                    <!-- <button><i class='bx bx-plus-circle'></i></button> -->
                </div>
            </div>
            <div class="course-box">
                <ul class="room-lists">
                    <table class="table">
                        <tr>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Phòng</th>
                            <th colspan="3">Giường</th>
                        </tr>
                        <tbody id="show">
                            <?php
                            $i = 1;
                            foreach ($list as $list1) {
                                $studentid = $list1['studentid'] ?? '';
                                $student_name = $list1['student_name'] ?? '';
                                $roomname = $list1['roomname'] ?? '';
                                $bedid = $list1['bedid'] ?? '';
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $studentid ?></td>
                                    <td><?php echo $student_name ?></td>
                                    <td><?php echo $roomname ?></td>
                                    <td><?php echo $bedid  ?></td>
                                    <td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlyhopdong/showformmove/<?php echo  $list1['contractid'] ?>'><i class='bx bx-edit'></i></a></td>
                                    </td>

                                </tr>
                                <!-- <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/editmovephong" method="post">
                                <div id="Edit-room-<?php echo  $list1['contractid'] ?>?>" class="modal" tabindex="-1" role="dialog" style="display: block; margin-top: 15%;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chuyển phòng</h5>
                                                <input type="text" value="<?php echo $list1['contractid'] ?>" name="id">
                                                <button type="button" onclick="hidenEditRoom('<?php echo $list1['contractid'] ?> ?>')" class="close" data-dismiss="modal" aria-label="Close" style="outline: none; background: red;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="display: flex; margin-top: 10px; gap: 1rem;">
                                                    <div class="mb-3">
                                                        <label for="nameRoom" class="form-label">Phòng hiện tại</label>
                                                        <input type="text" id="nameRoom" value="<?php echo  $roomname ?>" class="form-control" disabled readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nameRoom" class="form-label">Giường hiện tại</label>
                                                        <input type="text" id="nameRoom" value="<?php echo  $bedid ?>" class="form-control" disabled readonly>
                                                    </div>
                                                </div>
                                                <span style="display: flex; justify-content: center; font-size: 24px; gap: 3rem;"><i class='bx bx-chevrons-down'></i><i class='bx bx-chevrons-down'></i></span>
                                                <div style="display: flex; margin-top: 10px; gap: 1rem;">
                                                    <div class="mb-3">
                                                        <label for="nameRoom" class="form-label">Chọn phòng mới</label>
                                                        <select class="form-select room" name="roomid" aria-label="Default select example" style="background: #F5F5F5;">
                                                            <option selected disabled>Phòng</option>
                                                            <?php
                                                            foreach ($list_room as $list2) {
                                                                $idroom = $list2['roomid'] ?? '';
                                                                $nameroom = $list2['roomname'] ?? '';
                                                            ?>
                                                                <option value="<?php echo $idroom  ?>"><?php echo $nameroom ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nameRoom" class="form-label">Chọn giường mới</label>
                                                        <input type="text" id="nameRoom" name="roomid" value="<?php echo $name ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </ul>
            </div>
        </section>
    </body>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search").keyup(function() {
            var id = $("#search").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/searchmove",
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
</script>

</html>