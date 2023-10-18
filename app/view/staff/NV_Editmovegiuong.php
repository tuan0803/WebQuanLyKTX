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
            <h1>Chuyển Giường</h1>
            <div class="box-right" style="right: 0;">
                <!-- <div class="box-search">
                        <i class='bx bx-search'></i>
                        <input type="text" id="search" placeholder="Nhập...">
                    </div> -->
                <!-- <button><i class='bx bx-plus-circle'></i></button> -->
            </div>
        </div>
        <div class="course-box">
            <?php
            $i = 1;
            foreach ($list as $list1) {
                $contractid = $list1['contractid'] ?? '';
                $studentid = $list1['studentid'] ?? '';
                $student_name = $list1['student_name'] ?? '';
                $roomname = $list1['roomname'] ?? '';
                $bedid = $list1['bedid'] ?? '';
                $startdate = $list1['studentid'] ?? '';
                $finishdate = $list1['finishdate'] ?? '';
                $status = $list1['status'] ?? '';
                $description = $list1['description'] ?? '';
                $cost = $list1['cost'] ?? '';
            }
            ?>
            <div style="display: flex; justify-content: center; gap: 1rem;">
                <label for="nameRoom" class="form-label">Tên sinh viên</label>
                <input type="text" value="<?php echo  $student_name ?>" class="form-control" style="width: 200px;" disabled readonly>
            </div>
            <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/editmovegiuong" method="post">
                <div>
                    <div style="display: flex; justify-content: center; margin-top: 10px; gap: 1rem;">
                        <div>
                            <label for="nameRoom" class="form-label">Phòng hiện tại</label>
                            <input type="text" id="idRoom" value="<?php echo  $roomname ?>" class="form-control" style="width: 200px;" disabled readonly>
                        </div>
                        <div>
                            <label for="nameRoom" class="form-label">Giường hiện tại</label>
                            <input type="text" id="bedid" value="<?php echo  $bedid ?>" class="form-control" style="width: 200px;" disabled readonly>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo  $contractid ?>">
                    <span style="display: flex; justify-content: center; font-size: 24px; gap: 3rem;"><i class='bx bx-chevrons-down'></i><i class='bx bx-chevrons-down'></i></span>
                    <div style="display: flex; justify-content: center; margin-top: 10px; gap: 1rem;">
                        <label for="nameRoom" class="form-label">Chọn giường mới</label>
                        <select class="form-control" id="bed" name="bedid" aria-label="Default select example" style="width: 200px;">
                            <option selected disabled>Chọn giường</option>
                            <?php
                            foreach ($list_bed as $list1) {
                                $id = $list1['bedid'] ?? '';
                            ?>
                                <option value="<?php echo $id ?>"><?php echo $id ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" value="1" name="status">
                    </div>
                </div>
                <div style="display: flex; justify-content: center; padding: 20px;">
                    <button type="submit" class="btn btn-primary btnsave">Lưu</button>
                </div>
            </form>

    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btnsave').click(function() {
            var bedid = $("#bedid").val();
            var idRoom = $("#idRoom").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/updatebed",
                method: "POST",
                data: {
                    bedid: bedid,
                    idRoom: idRoom,

                },
                success: function(data) {

                }
            })
            console.log(bedid);
            console.log(idRoom);
        })
    })
</script>

</html>