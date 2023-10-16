<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/WEBQUANLYKTX/public/assets/staff/css/index.css">
    <title>Hợp đồng</title>
</head>

<body>
    <form action="timkiem" method="post">
        <section class="main-course" id="content">
            <div class="header-container">
                <h3>Danh sách hợp đồng</h3>
                <div class="box-right">
                    <div class="box-search">
                        
                            <input type="text" name="id" class="slide-in form-control" id="search-input" >
                            <i><button type="submit" class='bx bx-search' id="search-icon"></button></i>
                        

                    </div>
                    <a href="<?php echo _WEB_ROOT ?>/qlyhopdong/showformthem"><i class='bx bx-plus-circle'></i></a>
                </div>
                
            </div>
            <div class="course-box">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Số hợp đồng</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Phòng</th>
                            <th>Giường</th>
                            <th>Giá</th>
                            <th colspan="2"></th>
                        </tr>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($list as $list1) {
                        $id          = $list1['id'] ?? '';
                        $studentid   = $list1['studentid'] ?? '';
                        $studentname = $list1['student_name'] ?? '';
                        $startdate   = $list1['startdate'] ?? '';
                        $finishdate  = $list1['finishdate'] ?? '';
                        $status      = $list1['status'] ?? '';
                        $description = $list1['description'] ?? '';
                        $roomid      = $list1['roomid'] ?? '';
                        $bedid       = $list1['bedid'] ?? '';
                        $cost        = $list1['cost'] ?? '';
                        ?>
                        <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $id ?>
                            </td>
                            <td>
                                <?php echo $studentid ?>
                            </td>
                            <td>
                                <?php echo $studentname ?>
                            </td>
                            <td>
                                <?php echo $startdate ?>
                            </td>
                            <td>
                                <?php echo $finishdate ?>
                            </td>
                            <td>
                                <?php echo $status ?>
                            </td>
                            <td>
                                <?php echo $description ?>
                            </td>
                            <td>
                                <?php echo $roomid ?>
                            </td>
                            <td>
                                <?php echo $bedid ?>
                            </td>
                            <td>
                                <?php echo $cost ?>
                            </td>
                            <td><a id='edit_link' href="javascript:void(0);"
                                    onclick="showEditContract('<?php echo $id ?>')"><i class='bx bx-edit'></i></a></td>
                            </td>
                            <td> <a id='deleteLink'
                                    href="http://localhost/WEBQUANLYKTX/qlyhopdong/delete/?contractId=<?php echo $id ?>"
                                    onclick="deleteRoom('<?php echo $id ?>')">
                                    <i class='bx bx-trash' style="color: red;"></i>
                                </a></td>
                        </tr>
                        <form action="<?php echo _WEB_ROOT ?>/qlyhopdong/suacontract" method="post">
                            <div id="Edit-contract-<?php echo $id ?>" class="modal" tabindex="-1" role="dialog"
                                style="display: none; margin-top: 5%; overflow: auto;">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Sửa thông tin hợp đồng
                                                <?php echo $id ?>
                                            </h5>
                                            <input type="hidden" value="<?php echo $id ?>" name="id">
                                            <button type="button" onclick="hidenEditContract('<?php echo $id ?>')"
                                                class="close" data-dismiss="modal" aria-label="Close"
                                                style="outline: none; background: red; border-bottom-left-radius: 5px;">
                                                <i class='bx bx-x' style="font-size: 2rem; font-weight: bold;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-5 table" style="display: flex; gap: 1rem;">
                                                <div>
                                                    <label for="studenid">Mã sinh viên:</label>
                                                    <input class="form-control" type="text" name="studentid"
                                                        value="<?php echo $studentid ?>">
                                                </div>
                                                <div>
                                                    <label for="name">Họ và tên:</label>
                                                    <label for="name">
                                                        <?php echo $studentname ?>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="mb-5 table" style="display: flex; gap: 1rem;">
                                                <div>
                                                    <label for="startdate">Ngày bắt đầu:</label>
                                                    <input class="form-control" type="date" name="startdate"
                                                        value="<?php echo $startdate ?>">
                                                </div>
                                                <div>
                                                    <label for="finishdate">Ngày kết thúc:</label>
                                                    <input class="form-control" type="date" name="finishdate"
                                                        value="<?php echo $finishdate ?>">
                                                </div>
                                            </div>
                                            <div class="mb-5 table" style="display: flex; gap: 1rem;">
                                                <div>
                                                    <label for="status">Trạng thái</label>
                                                    <input class="form-control" type="text" name="status"
                                                        value="<?php echo $status ?>">
                                                </div>
                                                <div>
                                                    <label for="description">Ghi chú:</label>
                                                    <textarea class="form-control" name="description" cols="40"
                                                        rows="10"><?php echo $description ?></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-5 table" style="display: flex; gap: 1rem;">
                                                <div>
                                                    <label for="">Chọn Phòng:</label>
                                                    <select class="form-select room form-control" name="roomid"
                                                        aria-label="Default select example" style="background: #F5F5F5;">
                                                        <option selected disabled>
                                                            <?php echo $roomid ?>
                                                        </option>
                                                        <?php
                                                        foreach ($list_room as $list1) {
                                                            $id   = $list1['id'] ?? '';
                                                            $name = $list1['name'] ?? '';
                                                            ?>
                                                            <option value="<?php echo $id ?>">
                                                                <?php echo $name ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="">Chọn giường:</label>
                                                    <select class="form-select form-control" id="bed" name="bedid"
                                                        aria-label="Default select example" style="background: #F5F5F5;">
                                                        <option selected disabled>
                                                            <?php echo $bedid ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="">Giá (Đồng):</label>
                                                <input class="form-control" type="number" name="cost"
                                                    value="<?php echo $cost ?>">
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
            </div>
        </section>
    </form>
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/Box_Search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.search').keypress(function (event) {
            if (event.which === 13) {
                performSearch();
            }
        });
    });

    function performSearch() {
        var searchText = $('.search').val();
        $.post()
    }

    function hidenEditContract(contractId) {
        $("[id^=Edit-contract-]").hide();
        $("#Edit-contract-" + contractId).hide();
        $("#overlay").hide();
    };

    function showEditContract(contractId) {
        $("[id^=Edit-contract-]").hide();
        $("#Edit-contract-" + contractId).show();
        console.log(contractId);
    };
    $(document).ready(function () {
        $(".room").change(function () {
            var id = $(".room").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT ?>/qlyhopdong/showBed",
                method: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    $("#bed").html(data);
                }
            })
            console.log(id);
        })
    })
</script>

</html>