<?php
  date_default_timezone_set('Africa/Cairo');
  include 'Database_Connection.php';
  include 'includes/comment.inc.php';
 ?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>

<head>
  <meta charset='utf-8'>
  <title>Commenting</title>
  <!--<link rel='stylesheet' href='../css/style1.css'>-->
</head>

<body>

  <?php
    echo "<br>";
    echo "<form method='post' action='".setComments($conn)."'>
    <input type='hidden' name='userId'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea id='Comment_Textfield' name='message'></textarea><br>
    <button  type='submit' name='commentSubmit'>Comment</button>
    

    </form>";
    getComments($conn);
    $_SESSION['page'] ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    mysqli_close($conn);

  ?>

</body>
<style>
  #Comment_Textfield
  {
    margin-left:10px;
    position:static;
    border-radius:15px;
    resize: inherit;/*bt5aly eltextfeild mttkabrchh */
     
    width:500px;
    height:
    
  
  }
  </style>
</html>

