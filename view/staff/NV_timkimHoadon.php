<?php
include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['roomId'];
    $sql = "SELECT * FROM servicebill WHERE `room-id`='$roomId'";

    $query = $connection->query($sql);
    if (isset($query) && $query != null) {
        $i = 1;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $i ?></td>
                <td>
                    <p><?php echo $row['id'] ?></p>
                </td>
                <td>
                    <a href="./NV_hoadon.php?id=<?php echo $row['id'] ?>"">
                    <i class='bx bx-dots-vertical-rounded'></i>
                </a>
            </td>
            </tr>
<?php
        }
    }
}
?>