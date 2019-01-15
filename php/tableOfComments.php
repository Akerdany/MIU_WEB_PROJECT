<?php

echo "<br>";
echo "<form method='post' action='".setCommenting($conn)."'>
<input type='hidden' name='userId'>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
<textarea id='Comment_Textfield' name='message'></textarea><br>
<button  type='submit' name='commentSubmit'>Comment</button>
</form>";
getCommenting($conn);
function setCommenting($conn)
{


mysqli_close($conn);
$id=$_SESSION['userId'];
$date=$_POST['date'];
$message=$_POST['message'];

$sql = "INSERT INTO `comments` ( `userId`, `date`, `message`,`toChildId`) VALUES( '".$id."'
  ,'".$date."', '".$message."',0)";
 $result= mysqli_query($conn,$sql);
}
function getCommenting($conn)
{
$sql= "SELECT user.email,user.id,comments.*
  FROM user
  INNER JOIN comments ON user.id=comments.userId    
  Where comments.toChildId=0";
  $result= mysqli_query($conn,$sql);
  echo"<table border='1'>
  <tr>
 
  <th>email</th>
  <th>date</th>
  
  
  
  <th>Comment</th>
  </tr>";
  

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" $row['email']. "</td>";
    echo "<td>" .$row['date']. "</td>";
   
 
    echo "</tr>";
    echo "</table>";
}
}
?> 


    //to comment on one child

    
    
