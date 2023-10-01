<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/student/css/report.css">
    <title>Document</title>
</head>
<body>
   
<div class="error-form">
        <h2>Form Phản Ánh Lỗi Hệ Thống</h2>
        <form action="saverp" method="POST">
            <label for="error_type">Loại lỗi:</label>
            <input type="text" id="error_type" name="name" required>

            <label for="error_description">Mô tả lỗi:</label>
            <textarea id="error_description" name="fulldesc" rows="4" required></textarea>

            <button type="submit">Gửi Phản Ánh</button>
        </form>
    </div>
</body>
</html>