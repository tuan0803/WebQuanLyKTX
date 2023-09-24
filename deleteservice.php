<?php
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'qlkytuc')
    or die('Lỗi kết nối');
$sql = "DELETE FROM servicebill WHERE id='$id'";
$kq = mysqli_query($con, $sql);
mysqli_close($con);
if ($kq) {
    echo "<script>alert('Xóa thành công')</script>";

} else {
    echo "<script>alert('Xóa thất bại')</script>";
}
echo "<script>window.location.href='./servicecost.php'</script>";
?>