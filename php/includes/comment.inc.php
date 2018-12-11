<?php
session_start();
function setComments($conn)
{

  if (isset($_POST['commentSubmit'])) {

     $email=$_SESSION['email'];
      $date=$_POST['date'];
      $message=$_POST['message'];

      $sql = "INSERT INTO `comments` ( `userId`, `date`, `message`) VALUES( '".$email."'
        ,'".$date."', '".$message."')";
       $result= mysqli_query($conn,$sql);

  }
}


function getComments($conn)
{
  $sql= 'SELECT * FROM comments';
  $result= mysqli_query($conn,$sql);
  $email=$_SESSION['email'];
  while ($row=mysqli_fetch_assoc($result)) {
  echo "<div class='comment-box'><p>";



echo $email."<br>";
echo $row['date']."<br>";


echo nl2br($row['message']); // nl2br is a new line 2 breaks <br>
echo "</p></div>";


  }


}
