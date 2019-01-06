<?php 
require_once("Database_Connection.php");
   $sqlInsurance="select m.* ,u.email from
   medicalinsurance m JOIN employee e ON e.medicalInsuranceId = m.id
   JOIN user u ON u.id=e.userId   ";

   $resultInsurance = mysqli_query($conn,$sqlInsurance);
 if(mysqli_num_rows($resultInsurance) > 0){
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
                    <td>Disease</td>
                    <td>Medicine Type </td>
                    <td>medicineType</td>
                    <td>medicalCardNumber</td>
					<td>maximumInsuranceCost</td>
					<td>email</td>
                    </tr>";
                while($row = mysqli_fetch_array($resultInsurance)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
                    echo "<td>" .$row['disease']. "</td>";
                    echo "<td>".$row['medicineType']."</td>";
                    echo "<td>" .$row['medicalCardNumber']. "</td>";
                    echo "<td>".$row['medicinePrice']."</td>";
					echo "<td>".$row['maximumInsuranceCost']."</td>";
					echo "<td>".$row['email']."</td>";

					
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>