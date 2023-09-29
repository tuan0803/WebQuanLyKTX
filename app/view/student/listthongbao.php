<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/home/css/news-home.css">
    <title>Document</title>
</head>

<body>
    <div class="wp-news">
        <h2>THÔNG BÁO</h2>
        <ul class="list-news">
            <?php
            foreach ($list as $list1) {
                $id        = $list1['id'];
                $name      = $list1['name'];
                $shortdesc = $list1['shortdesc'];
                $date      = $list1['date'];
                $fulldesc  = $list1['fulldesc'];
                ?>
                <div class="news">
                    <img class="image-news" width="420px" height="280px"
                        src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                    <div class="title-news">
                        <?php echo $name; ?>
                    </div>
                    <div class="desc-news">
                        <?php echo $shortdesc ?>
                    </div>
                    <div class="date-news">
                        <?php echo $date; ?>
                    </div>

                    <div class="modal fade" id="exampleModalToggle<?php echo $id; ?>" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel<?php echo $id; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel<?php echo $id; ?>"
                                        style="color: black;"><?php echo $name; ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="color: black;">
                                <?php echo $fulldesc; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle<?php echo $id; ?>"
                        data-bs-toggle="modal">Read more</button>



                    
                </div>
                <?php
            }
            ?>
        </ul>
    </div>

    
    
    <!-- <div class="wp-news">
        <h2>THÔNG BÁO</h2>
        <ul class="list-news">
            <div class="news">
                <img class="image-news" width="420px" height="280px"
                    src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh
                    viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
            <div class="news">
                <img width="420px" height="280px" src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh
                    viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
            <div class="news">
                <img width="420px" height="280px" src="<?php echo _WEB_ROOT ?>/public/assets/home/images/a1.jpg" alt="">
                <div class="title-news">Hướng dẫn xếp ở KTX cho sinh viên K68</div>
                <div class="desc-news">
                    Căn cứ vào kế hoạch số 1802/KH-ĐHBK-CTSV ngày 26/07/2023 về tổ chức nhập học đối với sinh
                    viên trúng
                    tuyển ĐH chính quy năm 2023, Trung tâm QL KTX xin trân trọng thông báo thông tin xếp ở kỳ...
                </div>
                <div class="date-news">26/07/2023</div>
                <a href="#" class="btn btn-primary">Read more</a>
            </div> -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
</body>

</html>