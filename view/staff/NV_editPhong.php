<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['studentId'];
    $newBed = $_POST['newBed'];
    $sql = "UPDATE student SET `bed-id`='$newBed' WHERE id='$studentId'";
    $stmt = $connection->query($sql);
    if ($stmt->execute()) {
        echo "Cập nhật thành công! ";
        echo "<script>window.location.href='NV_svInphong.php'</script>";  
    } else {
        echo "Lỗi không thể cập nhật";
    }   
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>
