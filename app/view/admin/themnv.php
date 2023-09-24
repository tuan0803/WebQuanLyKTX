<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?php echo _WEB_ROOT?>/qlynhanvien/themnv">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID</label>
    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Họ tên</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Năm sinh</label>
    <input type="text" name="year" class="form-control" id="exampleInputPassword1">
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
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">SĐT</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Lương</label>
    <input type="text" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tuổi</label>
    <input type="text" name="old" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="position" id="flexRadioDefault1" value="staff">
  <label class="form-check-label" for="flexRadioDefault1">
    staff
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="position" id="flexRadioDefault2" value="admin" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    admin
  </label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>