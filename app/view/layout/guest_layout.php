<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/headerx.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/news-home.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/utility-home.css">

    <title>Ký Túc Xá UTT</title>
</head>

<body>
    <header id="siteHeader">
        <div class="logo">
            <img src="/WEBQUANLYKTX/public/assets/home/images/logo-utt-border.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li><a href="#">THÔNG BÁO</a></li>
                <li><a href="<?php echo _WEB_ROOT?>/login/index">ĐĂNG NHẬP</a></li>
            </ul>
        </nav>
    </header>
    <?php
    $this->render($content);
    ?>
    <!-- <script src="<?php echo _WEB_ROOT?>/public/assets/home/js/utility-home.js"></script> -->
    <script src="<?php echo _WEB_ROOT?>/public/assets/home/js/banner-home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>