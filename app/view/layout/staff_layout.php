<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,400&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/fa18a5fe5d.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/staff/css/index.css">
    <title>Nhân Viên</title>
</head>

<body>
    <header>
        <!-- overlay -->
        <section id="overlay">
        </section>
        <div class="wrapper">
            <div class="content">
                <img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-utt-border.png" alt="Logo trường">
            </div>
            <div class="sidebar">
                <ul class="navbar">
                    <li>
                        <div class="navbar-link">
                            <span>
                                <a href>
                                    <i class='bx bx-grid-alt'></i>
                                    <span>Trang chủ</span>
                                </a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                        <span class="btn-dropdown">
                                <i class='bx bx-list-ul'></i>
                                <span>Sinh Viên</span>
                                <i class='bx bx-chevron-down'></i>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <i class='fa fa-address-book'></i>
                                        <a style="color:black;" href="<?php echo _WEB_ROOT ?>/qlysinhvien/listsv"><span>Danh sách sinh viên</span></a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <i class='bx bx-user-plus'></i>
                                        <a style="color:black;" href="<?php echo _WEB_ROOT ?>/qlysinhvien/showformthem"><span>Them Sinh Vien</span></a>
                                    </span>
                                </li>
                                
                            </ul>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href>
                                            <i class='bx bx-file-find'></i>
                                            <span>Tra cứu</span>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <a href>
                                            <i class='bx bx-user-plus'></i>
                                            <span>Cập nhật</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                            <span class="btn-dropdown">
                                <a href="#">
                                    <i class='bx bxs-school'></i>
                                    <span>Phòng</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyphong/listphong">
                                            <i class='bx bx-search'></i>
                                            <span style="font-size: 15px; font-weight: 700;">Danh
                                                sách phòng</span>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <a href="./NV_serviceBill.php">
                                            <i class='bx bxs-bed'></i>
                                            <span>Chuyển giường</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                            <span class="btn-dropdown">
                                <i class='bx bx-file'></i>
                                <span>Hợp đồng</span>
                                <i class='bx bx-chevron-down'></i>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyhopdong/listcontract">
                                            <i class='bx bx-search'></i>
                                            <span style="font-size: 15px; font-weight: 700;">Danh
                                                sách hợp đồng</span>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <a href="#">
                                            <i class='bx bxs-bed'></i>
                                            <span>Gia hạn hợp đồng</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                            <span class="btn-dropdown">
                                
                                    <i class="fa-brands fa-servicestack"></i>
                                    <span>Dịch vụ</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyservicebill/listservicebill">
                                            <i class='bx bx-search'></i>
                                            <span>Danh sách hóa đơn</span>
                                        </a>
                                    </span>
                                </li>

                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyservicebill/showformthem">
                                            <i class="fa-brands fa-servicestack"></i>
                                            <span>Thêm hóa đơn </span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                            <span class="btn-dropdown">
                                
                                    <i class="fa-solid fa-sack-dollar"></i>
                                    <span>Hóa đơn</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyhoadon/listbill">
                                            <i class='bx bx-search'></i>
                                            <span>Danh sách hóa đơn</span>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlyhoadon/showformthem">
                                            <i class="fa-solid fa-file-invoice-dollar"></i>
                                            <span>Them hoa don</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="navbar-link">
                            <span class="btn-dropdown">
                                
                                    <i class="fa-solid fa-signal"></i>
                                    <span>Thống kê</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                            </span>
                            <ul>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlythongke/sinhvien">
                                            <i class='bx bx-search'></i>
                                            <span>Số lượng sinh viên</span>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="title">
                                        <a href="<?php echo _WEB_ROOT ?>/qlythongke/no">
                                            <i class="fa-solid fa-file-invoice-dollar"></i>
                                            <span>Doanh thu</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="topnav">
        <div class="logo-nav">
            <img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-utt-border.png" alt>
        </div>
        <div class="navbar__icons">
            <div class="navbar__icon"></div>
        </div>
        <!-- nav menu -->
        <div class="nav-right">
            <div class="nav-notifi">
                <i class='bx bxs-bell-ring'></i>
            </div>
            <div class="message-box">
                <i class='bx bxl-messenger'></i>
            </div>
            <div class="user-info">
                <img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/employee-icon-png.png" alt="Logo-icon">
            </div>
        </div>
        <!-- info-menu-user -->
        <div class="sub-info" id="submenu">
            <ul>
                <li>
                    <a href>
                        <i class='bx bx-cog'></i>
                        <span>Cài đặt</span>
                    </a>
                </li>
                <li>
                    <a href>
                        <i class="fa-regular fa-circle-question"></i>
                        <span>Trợ giúp</span>
                    </a>
                </li>
                <li>
                    <a href>
                        <i class='bx bxs-notifi-dots'></i>
                        <span>Đóng góp</span>
                    </a>
                </li>
                <li>
                    <a href>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- notifi-box- menu -->
        <div class="sub-notifis">
            <div class="top-notifi">
                <h3>Thông báo</h3>
                <span>
                    <a href="">
                        <button>Tất Cả</button>
                    </a>
                    <a href="">
                        <button>Chưa đọc</button>
                    </a>
                </span>
            </div>
            <div style="gap: 1.5rem; padding-left: 10px; font-weight: 600;">
                <span>Mới</span>
            </div>
            <div class="body-notifi">
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Chào mừng bạn đến với nhóm web</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Chào mừng bạn đến với nhóm web</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Chào mừng bạn đến với nhóm web</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Chào mừng bạn đến với nhóm web</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Chào mừng bạn đến với nhóm web</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- message-menu -->
        <div class="message-menus">
            <div class="top-message-menu">
                <h3>Chat</h3>
                <span>
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search">
                </span>
            </div>
            <div style="gap: 1.5rem; padding-left: 10px; font-weight: 600;">
                <span>Mới</span>
            </div>
            <div class="body-message-menu">
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Nguyễn Hoàng Việt</h5>
                        </span>
                        <span>
                            <h6>Chào bạn</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Đoàn Đức Tùng</h5>
                        </span>
                        <span>
                            <h6>Chào bạn</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Ngọc Trinh</h5>
                        </span>
                        <span>
                            <h6>làm quen</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Người lạ</h5>
                        </span>
                        <span>
                            <h6>Chào bạn</h6>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo _WEB_ROOT ?>/public/assets/staff/images/logo-user-sv.png" alt="ảnh sv">
                    </li>
                    <li>
                        <span>
                            <h5>Người lạ</h5>
                        </span>
                        <span>
                            <h6>Hãy trả lời thắc mắc</h6>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <?php
        if (!empty($content)) {
            $this->render($content, $this->data);
        }
        ?>
    </main>
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/staff/js/main.js"></script>

</html>