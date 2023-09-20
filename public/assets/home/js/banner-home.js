const banners = [
    {
        imageSrc: '<?php echo _WEB_ROOT?>/public/assets/home/images/football.jpg',
        title: "KÝ TÚC XÁ UTT \n Nơi tình yêu bắt đầu"
    },
    {
        imageSrc: '<?php echo _WEB_ROOT?>/public/assets/home/images/a1.jpg',
        title: "KÝ TÚC XÁ UTT \n An ninh - vệ sinh tốt"
    },
    {
        imageSrc: '<?php echo _WEB_ROOT?>/public/assets/home/images/a3.jpg',
        title: "KÝ TÚC XÁ UTT \n Chắp cánh ước mơ"
    }
];

const bannerImage = document.getElementById('bannerImage');
const bannerTitle = document.getElementById('bannerTitle');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

let currentBannerIndex = 0;

// Hiển thị banner hiện tại
function displayBanner() {
    const currentBanner = banners[currentBannerIndex];
    bannerImage.src = currentBanner.imageSrc;
    bannerTitle.textContent = currentBanner.title;
}

// Chuyển đến banner tiếp theo
function nextBanner() {
    currentBannerIndex = (currentBannerIndex + 1) % banners.length;
    displayBanner();
}

// Chuyển đến banner trước đó
function prevBanner() {
    currentBannerIndex = (currentBannerIndex - 1 + banners.length) % banners.length;
    displayBanner();
}

// Sự kiện click nút "Trước" và "Sau"
prevButton.addEventListener('click', prevBanner);
nextButton.addEventListener('click', nextBanner);

// Tự động chuyển banner sau mỗi 5 giây
setInterval(nextBanner, 5000);

// Hiển thị banner đầu tiên khi trang web được tải
displayBanner();
