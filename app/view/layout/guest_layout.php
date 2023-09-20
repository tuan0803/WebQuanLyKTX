<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/headerx.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/news-home.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/home/css/utility-home.css">

    <title>Ký Túc Xá UTT</title>
</head>

<body>
    <header id="siteHeader">
        <div class="logo">
            <img src="/WEBQUANLYKTX/public/assets/home/images/logo-utt-border.jpg" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li><a href="#">THÔNG BÁO</a></li>
                <li><a href="login.html">ĐĂNG NHẬP</a></li>
            </ul>
        </nav>
    </header>
    <?php
    $this->render($content);
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/home/js/utility-home.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/assets/home/js/banner-home.js"></script>

</body>
</html>