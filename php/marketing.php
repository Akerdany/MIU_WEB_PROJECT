<?php 
session_start();
require_once("Database_Connection.php");

   $sqlInsurance="select m.*  from
   Marketing m ";
	//will be in a function, it is when any employee except HR and Manager and Head of doctors enters the table of the medical insurance
	
	
		
		
	
	
	
	//ends here
   $resultInsurance = mysqli_query($conn,$sqlInsurance);
 if(mysqli_num_rows($resultInsurance) > 0){
	 
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
					<td>advertisementType</td>
                    <td>region</td>
                    <td>contact</td>
                    <td>advertisementCost</td>
                    
					
                    </tr>";
                while($row = mysqli_fetch_array($resultInsurance)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
					echo "<td>".$row['advertisementType']."</td>";
                    echo "<td>" .$row['region']. "</td>";
                    echo "<td>".$row['contact']."</td>";
                    echo "<td>" .$row['advertisementCost']. "</td>";
                 
					

					
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>