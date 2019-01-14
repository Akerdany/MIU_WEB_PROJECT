<?php
//session_start();
function setComments($conn)
{

  if (isset($_POST['commentSubmit'])) {

      $id=$_SESSION['userId'];
      $date=$_POST['date'];
      $message=$_POST['message'];
      
      $sql = "INSERT INTO `comments` ( `userId`, `date`, `message`,`childId`) VALUES( '".$id."'
        ,'".$date."', '".$message."','".$_SESSION["toChildId"]."')";
       $result= mysqli_query($conn,$sql);

  }
}


 function getComments($conn)
{
  $sql= "SELECT user.email,user.id,comments.*
  FROM user
  INNER JOIN comments ON user.id=comments.userId";
  $result= mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_assoc($result)) {
  echo "<div class='comment-box'><p>";


echo $row['email']."<br>";
echo $row['date']."<br>";
echo nl2br($row['message']); // nl2br is a new line 2 breaks <br>
echo "</p></div>";


  }


}
