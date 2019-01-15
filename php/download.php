<?php
    require_once("Database_Connection.php");
    mysqli_set_charset($conn,'utf-8');

    $query = "SELECT * FROM uploads WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$query) 
        or die('Error, query failed');
    list($id, $file, $size, $type,$extension,$content) = mysqli_fetch_array($result);
    header("Content-length: $size");
    if($type == 1){
        header("Content-type: image/$extension");
    }
    else if($type == 2){
        header("Content-Type: application/force-download");
    }
    header("Content-Disposition: attachment; filename=$file");
    ob_clean();
    flush();
    echo base64_decode($content);
    mysqli_close($conn);
    exit();

?>