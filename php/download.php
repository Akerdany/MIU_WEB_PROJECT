<?php
    require_once("Database_Connection.php");
    mysqli_set_charset($conn,'utf-8');

    $id = 27;

    $query = "SELECT * FROM uploads WHERE userId = '$id'";
    $result = mysqli_query($conn,$query) 
        or die('Error, query failed');
    list($id, $file, $type, $size,$extension,$content) = mysqli_fetch_array($result);
    header("Content-length: $size");
    header("Content-type: image/PNG");
    header("Content-Disposition: attachment; filename=$file");
    ob_clean();
    flush();
    echo base64_decode($content);
    mysqli_close($conn);
    exit;

?>