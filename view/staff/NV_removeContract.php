<?php
    $id=$_GET['id'];
    //B1: Kết nối DB
    include_once 'C:/xampp/htdocs/72DCTM22/WebKTX/WebQuanLyKTX/database/connectdatabase.php';
    //b2: thực hiện xóa
    $sql= "DELETE FROM contract WHERE id='$id'";
    $data = $connection->query($sql);
    $data->execute();
    if($data){echo "<script>alert('Xóa thành công')</script>";}
    else
        echo "<script>alert('Xóa không thành công')</script>" ;     
    echo "<script>window.location.href='NV_contract.php'</script>";        
?>