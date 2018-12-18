<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel='stylesheet' href='../css/style1.css'>
<style media="screen"  >
  *{margin: 0px; padding:0px;}
  #main{ width: 100%; height: 570px; margin: 40px auto}
    #result-message-area{width: 100%; padding: 0% 1%; height: 90%;}
  #message_area{width:98%;  height:10%; }
  .email-ok{color:#2FC332;}
  .email-taken{color:#D60202;}


</style>
  <body>


<?php

  session_start();
    include("Database_Connection.php");


if (isset($_SESSION['username']))
{
  $toUserId= $_SESSION['toUserId'] ;
  echo "<div class='comment-box'><p>";
  echo $_SESSION['username'].'  <span  style="color: green; background-color:yellow; padding-top:10px;">Messages</span> <br>';
  echo'
  <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkFounded()"/><br>

  <div id="msg"></div><br>


     <button onclick="ReloadingPage()">Reload page</button>';
     echo"
     <a href='logOut.php' style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='logOut'>Logout</button></a>
     <a href='../html/Nursery Website.php'  style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='Home'>Home</button></a>

     ";
     echo "</p></div>";
  echo '<div id="main">
  <div id="result-message-area">
  ';
  //SELECT user.email,user.id,messagetest.message FROM user INNER JOIN messagetest ON user.id=message.userId// messagetest.toUserId='".$_SESSION["toUserId"]."'
      $sql1="  SELECT user.email,user.id,messagetest.message FROM user INNER JOIN messagetest ON user.id='".$_SESSION["id"]."'";
      $result1= mysqli_query($conn,$sql1);
      while ($row= mysqli_fetch_assoc($result1)) {
          $message=$row['message'];
          $email= $row['email'];
          echo "<div class='comment-box'><p>";

          echo '<h4 style="color:blue">'.$email.' to '.$_SESSION['TheEmail'].'</h4>';
          echo '<p>'.$message.'</p>';
echo "</p></div>";

      }
      if (Isset($_POST['submit']))
       {

        $message=$_POST['message'];
        $id = $_SESSION['id'];
        $sql='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`seen`)
        VALUES ("","'.$message.'","'.$id.'","'.$toUserId. '",0)
        ';
        if(mysqli_query($conn,$sql))
        {
          echo "<div class='comment-box'><p>";
          echo '<h4 style="color:blue">'.$_SESSION['username'].' to '.$_SESSION['TheEmail'].' </h4>';

          echo '<p>'.$message.'</p></div>';
          echo "</p></div>";
        }
  }
  echo '
  <div id="message_area">
  <form  method="post">
  </div>
    <br>


  <input type="text" name="message" style="width:80%; height:10%;" placeholder="Type your message" required/>
  <button type="submit" name="submit" onclick="ReloadingPage()"  style="width:10%; height:10%;" >Send</button>

  </form>
</div>
  </div>';

 $_SESSION['page'] ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/*if( $_SESSION['page'] =="http://127.0.0.1:8080/MIU_Web_Project/php/DisplayingMessageToManager.php"){
  $sql300 = "UPDATE `message` SET `seen` = '1'";
   $result300= mysqli_query($conn,$sql300);

}*/

}



else
{
  header("location:logOut.php");
}

?>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/Reload.js"></script>
<script src="../js/ajax.js"></script>

</html>
<?php
mysqli_close($conn);

 ?>
