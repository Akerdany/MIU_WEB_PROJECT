<?php 
require_once("Database_Connection.php");
   $sqlInsurance="select a.*  from
   accounting a ";

   $resultInsurance = mysqli_query($conn,$sqlInsurance);
 if(mysqli_num_rows($resultInsurance) > 0){
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
                    <td>taxes/year</td>
                    <td>expenses/year</td>
                    <td>fees/child</td>
                    <td>paymentMethod</td>
					<td>profit/year</td>
					<td>expenseDate/year</td>
					<td>paymentDescription</td>
					<td>total</td>
					<td>year</td>
                    </tr>";
                while($row = mysqli_fetch_array($resultInsurance)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
                    echo "<td>" .$row['taxes/year']. "</td>";
                    echo "<td>".$row['expenses/year']."</td>";
                    echo "<td>" .$row['fees/child']. "</td>";
                    echo "<td>".$row['paymentMethod']."</td>";
					echo "<td>".$row['profit/year']."</td>";
					echo "<td>".$row['expenseDate/year']."</td>";
					echo "<td>".$row['paymentMethod']."</td>";
					echo "<td>".$row['profit/year']."</td>";
					echo "<td>".$row['expenseDate/year']."</td>";
					
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>