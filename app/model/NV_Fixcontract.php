<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/suacontract" method="post">
        <div   style="display: block; margin-top: 5%; overflow: auto;">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thông tin hợp đồng</h5>
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                    </div>
                    <div class="modal-body">
                        <div class="mb-5 table" style="display: flex; gap: 1rem;">
                            <div>       
                                <label for="studenid">Mã sinh viên:</label>
                                <input class="form-control" type="text" name="studentid" value="<?php echo $studentid ?>">
                            </div>
                            <div>
                                <label for="name">Họ và tên:</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $studentname ?>">
                            </div>
                        </div>
                        <div class="mb-5 table" style="display: flex; gap: 1rem;">
                            <div>
                                <label for="startdate">Ngày bắt đầu:</label>
                                <input class="form-control" type="date" name="startdate" value="<?php echo $startdate ?>">
                            </div>
                            <div>
                                <label for="finishdate">Ngày kết thúc:</label>
                                <input class="form-control" type="date" name="finishdate" value="<?php echo $finishdate ?>">
                            </div>
                        </div>
                        <div class="mb-5 table" style="display: flex; gap: 1rem;">
                            <div>
                                <label for="status">Trạng thái</label>
                                <input class="form-control" type="text" name="status" value="<?php echo $status ?>">
                            </div>
                            <div>
                                <label for="description">Ghi chú:</label>
                                <textarea class="form-control" name="description" cols="40" rows="10"><?php echo $description ?></textarea>
                            </div>
                        </div>
                        <div class="mb-5 table" style="display: flex; gap: 1rem;">
                            <div>
                                <label for="">Chọn Phòng:</label>
                                <select class="form-select room form-control" name="roomid" aria-label="Default select example" style="background: #F5F5F5;">
                                    <option selected disabled><?php echo $roomid ?></option>
                                    <?php
                                    foreach ($list_room as $list1) {
                                        $id = $list1['id'] ?? '';
                                        $name = $list1['name'] ?? '';
                                    ?>
                                        <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="">Chọn giường:</label>
                                <select class="form-select form-control" id="bed" name="bedid" aria-label="Default select example" style="background: #F5F5F5;">
                                    <option selected disabled><?php echo $bedid ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="">Giá (Đồng):</label>
                            <input class="form-control" type="number" name="cost" value="<?php echo $cost ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>