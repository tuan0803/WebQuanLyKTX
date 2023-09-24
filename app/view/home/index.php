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
    <div class="banner">
        <button id="prevButton" class="banner-button prev-button">Trước</button>
        <div class="banner-content">
            <img id="bannerImage" src="" alt="Banner Image">


            <h2 id="bannerTitle">Tiêu đề banner</h2>
        </div>
        <button id="nextButton" class="banner-button next-button">Sau</button>
    </div>


    <div class="wp-news">
        <h2>THÔNG BÁO</h2>
        <ul class="list-news">
            <div class="news">
                <img class="image-news" width="420px" height="280px"
                    src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
            <div class="news">
                <img width="420px" height="280px" src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
            <div class="news">
                <img width="420px" height="280px" src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
        </ul>
        <!-- <div class="list-page">
            <div class="news">
                <a href="">1</a>
            </div>
            <div class="news">
                <a href="">2</a>
            </div>
            <div class="news">
                <a href="">3</a>
            </div>
        </div> -->
    </div>


    <div class="utilities">
        <h2>THÔNG TIN TIỆN ÍCH</h2>

    </div class="tienich">
    <div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Đăng ký ở KTX
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Liên hệ văn phòng khoa, tòa nhà H1 - Giờ mở cửa 09:00 - 13:00, 14:00 - 21:00
                            T2-T7</strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Nhà để xe
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Cổng sau, cạnh nhà C2</strong> .
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Không gian học tập chung
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Thư viện, đối diện hội trường lớn. Giờ mở cửa 09:00 - 13:00, 14:00 - 21:00
                            T2-T7</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="footer">
        <div class="box">
            <div class="logo">
                <img src="<?php echo _WEB_ROOT ?>/public/assets/home/images/logo-utt-border.png" alt="">
            </div>
</br>
            <h3>KÝ TÚC XÁ UTT</h3>
            
        </div>
        <div class="box">
            
            <h3>VP TRUNG TÂM</h3>
            <p>
                Văn phòng: H1 – 101, 102
                Điện thoại: 024 11111111
                Email: ktx@utt.edu.vn</p>
        </div>
        <div class="box">
            <h3>NỘI DUNG</h3>
            <ul class="quick-menu">
                <div class="news">
                    <a href="">Trang chu</a>
                </div>
                <div class="news">
                    <a href="">Gioi thieu</a>
                </div>
                <div class="news">
                    <a href="">Thong bao</a>
                </div>
                <div class="news">
                    <a href="">Lien he</a>
                </div>
            </ul>
        </div>
        
    </div>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/home/js/banner-home.js"></script>
    <!-- <script src="<?php echo _WEB_ROOT ?>/public/assets/home/js/utility-home.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>