<?php
//session_start();
function setComments($conn)
{

  if (isset($_POST['commentSubmit'])) {

     $id=$_SESSION['id'];
      $date=$_POST['date'];
      $message=$_POST['message'];

      $sql = "INSERT INTO `comments` ( `userId`, `date`, `message`) VALUES( '".$id."'
        ,'".$date."', '".$message."')";
       $result= mysqli_query($conn,$sql);

  }
}


 function getComments($conn)
{
  $sql= 'SELECT * FROM comments';
  $result= mysqli_query($conn,$sql);
//  $email=$_SESSION['email'];
  while ($row=mysqli_fetch_assoc($result)) {
  echo "<div class='comment-box'><p>";
  $sqlFinder= "SELECT user.email,user.id
  FROM user
  INNER JOIN comments ON user.id=comments.userId";

  $resultFinder= mysqli_query($conn,$sqlFinder);
$email='';
 while($rowFinder =mysqli_fetch_array($resultFinder)){












   if ($row['userId']==$rowFinder['id']) {



echo   $rowFinder['email']."<br>";
break;

}
  }
//echo $row['userId']."<br>";
echo $row['date']."<br>";


echo nl2br($row['message']); // nl2br is a new line 2 breaks <br>
echo "</p></div>";


  }


}
