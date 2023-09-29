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
            <h1>Danh sách phòng</h1>
            <div class="box-right" style="right: 0;">
                <div class="box-search">
                    <i class='bx bx-search'></i>
                    <input type="text" id="search">
                </div>
                <!-- <button><i class='bx bx-plus-circle'></i></button> -->
            </div>
        </div>
        <div class="course-box">
            <ul class="room-lists">
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên Phòng</th>
                        <th>Số người hiện tại/tối đa</th>
                        <th colspan="3">Trạng thái</th>
                    </tr>
                   
                    <?php
                    $i=1;
                    foreach ($list as $list1) {
                        $id = $list1['id'] ?? '';
                        $name = $list1['name'] ?? '';
                        $currentquantity = $list1['currentquantity'] ?? '';
                        $status = $list1['status'] ?? '';
                        $maxquantity = $list1['maxquantity'] ?? '';
                    ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $currentquantity."/".$maxquantity ?></td>
                            <td><?php if($currentquantity==$maxquantity){echo "<i class='bx bxs-circle' style='color: red;'></i>";}else{echo " <i class='bx bxs-circle' style='color: green;'></i>";} ?></td>
                            <td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/showformsua/" . $id . "'><i class='bx bx-edit'></i></a></td></td>
                            <td><a id='deleteLink' href='http://localhost/WEBQUANLYKTX/qlynhanvien/showformsua/" . $id . "'><i class='bx bx-trash' style="color: red;"></i></a></td></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </ul>
        </div>
    </section>
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/main.js"></script>

</html>
</body>
</html>