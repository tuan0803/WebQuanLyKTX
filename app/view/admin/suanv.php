<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    
    <form action="<?php echo _WEB_ROOT?>/qlynhanvien/suanv" method="post">
        <div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"  >
                   ID: <?php echo $info['id'] ; ?>
                </span>
                <input type="hidden" name="id" class="form-control"  aria-label="Username"
                    aria-describedby="basic-addon1" value="<?php echo $info['id'] ; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Họ tên</span>
                <input type="text" name="name" class="form-control" placeholder="<?php echo $info['name'] ; ?>" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="nam">
                <label class="form-check-label" for="flexRadioDefault1">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="nu" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Nữ
                </label>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Địa chỉ</span>
                <input type="text" name="address" class="form-control" placeholder="<?php echo $info['address'] ; ?>" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>

            <div class="mb-3">
                <label for="basic-url" class="form-label">Thông tin chi tiết</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">SĐT</span>
                    <input type="text" name="phone" class="form-control" id="basic-url" placeholder="<?php echo $info['phone'] ; ?>"
                        aria-describedby="basic-addon3 basic-addon4">
                </div>
                <!-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> -->
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Lương</span>
                <input type="text" name="salary" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="<?php echo $info['salary'] ; ?>">
                <span class="input-group-text">vnđ</span>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Năm sinh</span>
                <input type="text" name="year" class="form-control" placeholder="<?php echo $info['year'] ; ?>" aria-label="Username">
                <span class="input-group-text">Tuổi</span>
                <input type="text" name="old" class="form-control" placeholder="<?php echo $info['phone'] ; ?>" aria-label="Server">
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="position" id="flexRadioDefault1" value="staff">
                <label class="form-check-label" for="flexRadioDefault1">
                    staff
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="position" id="flexRadioDefault2" value="admin"
                    checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    admin
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>