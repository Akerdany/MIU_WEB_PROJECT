<?php


session_start();
  require_once("Database_Connection.php");
$email= $_SESSION['TheEmail'];


$sql= "SELECT user.id
FROM user
WHERE user.email= '".$email."' ";

$resultForId= mysqli_query($conn,$sql);
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}

if (!mysqli_query($conn, $sql)) {
printf("Errormessage: %s\n", mysqli_error($conn));
}

$rowForId=mysqli_fetch_assoc($resultForId);

echo  '<div class="email-ok">'.$rowForId["id"].'</div>';
  $_SESSION['toUserId'] =$rowForId["id"];
mysqli_free_result($resultForId);
mysqli_close($conn);



 ?>
