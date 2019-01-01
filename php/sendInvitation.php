<?php 

date_default_timezone_set('Africa/Cairo');
 

     
echo "<form method='post' action='sendInvitation.php'>";
 
	 
 echo '<input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">';
 echo "</form>";
 $date=$_POST['date'];
 $sqlInvitation='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`seen`)
  VALUES ("","Invitation","'.$_SESSION["id"].'","'.$_SESSION["toUserId"].'","'.$date.'",0)
  ';
 
		
	
	echo '<div class="send-invitation"><button type="button"  name="sendInvitation" 
			id="sendingInvitation"  onclick="sendInvite()">
			send Invitation</button></div>';
			

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>


  <script type="text/javascript">
    
  			  $(document).ready(function(){
          $("#sendingInvitation").click(function(){

              $.ajax({
                  type: 'POST',
                  url: 'sendInvitation.php',
                  success: function(data) {
					  
                      $("#msg").html(data);
		
				
                  }
              });
     });
  });



  </script>

	</html>		


