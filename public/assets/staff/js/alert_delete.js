// Lấy thẻ <a> bằng ID
var deleteLink = document.getElementById("deleteLink");

// Thêm sự kiện click vào thẻ <a>
deleteLink.addEventListener("click", function(event) {
  // Ngăn chặn hành vi mặc định của liên kết
  event.preventDefault();

  // Lấy văn bản trong thẻ <a>
  var linkText = deleteLink.textContent || deleteLink.innerText;

  // Kiểm tra xem văn bản có chứa từ "xóa" không
  if (linkText.includes("Xóa")) {
    // Hiển thị hộp thoại cảnh báo
    var confirmation = confirm("Bạn có chắc muốn xóa?");
    
    // Nếu người dùng chọn OK trong hộp thoại cảnh báo
    if (confirmation) {
      // Chuyển hướng đến trang được gắn link trong thẻ <a>
      window.location.href = deleteLink.getAttribute("href");
    }
  }
});