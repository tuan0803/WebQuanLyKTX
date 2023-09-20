// Đoạn mã JavaScript để xử lý hiển thị và ẩn dropdown
const utilityItems = document.querySelectorAll('.utility-item');

utilityItems.forEach((item) => {
    item.addEventListener('click', () => {
        
        const dropdown = item.querySelector('.utility-dropdown');
        
        const openDropdowns = document.querySelectorAll('.utility-dropdown.show');

        // Ẩn tất cả các dropdown khác trước khi hiển thị dropdown của tiện ích hiện tại
        openDropdowns.forEach((openDropdown) => {
            if (openDropdown !== dropdown) {
                openDropdown.classList.remove('show');
            }
        });

        dropdown.classList.toggle('show');
        
    });
});

// Đóng dropdown khi người dùng nhấn bất kỳ nơi nào trên trang
document.addEventListener('click', (event) => {
    const dropdowns = document.querySelectorAll('.utility-dropdown');
    dropdowns.forEach((dropdown) => {
        if (!event.target.closest('.utility-item') && dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        }
    });
});

// Ngăn sự kiện click trên dropdown lan ra ngoài và đóng dropdown
utilityItems.forEach((item) => {
    const dropdown = item.querySelector('.utility-dropdown');
    dropdown.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});
