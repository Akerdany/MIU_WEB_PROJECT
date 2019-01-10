<?php 
session_start();
require_once("Database_Connection.php");
   $sqlInsurance="select m.*,u.firstName  from
   medicalinsurance m JOIN employee e ON e.medicalInsuranceId = m.id
   JOIN user u ON u.id=e.userId";
	//will be in a function, it is when the HR employee enters the table of the medical insurance
	
	$sqlInsuranceEmployee="select u.firstName  from
    employee e 
   JOIN user u ON u.id=e.userId
   AND e.departmentId !=2
   
   AND e.userId='".$_SESSION['userId']."'";
    $resultInsuranceEmployee = mysqli_query($conn,$sqlInsuranceEmployee);
    if(mysqli_num_rows($resultInsuranceEmployee) > 0)
	{	

		$sqlInsurance=$sqlInsurance."  AND e.userId='".$_SESSION['userId']."'";
	}
	
	//ends here
   $resultInsurance = mysqli_query($conn,$sqlInsurance);
 if(mysqli_num_rows($resultInsurance) > 0){
	 
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
					<td>First Name</td>
                    <td>Disease</td>
                    <td>Medicine Type </td>
                    <td>medicineType</td>
                    <td>medicalCardNumber</td>
					<td>maximumInsuranceCost</td>
					
                    </tr>";
                while($row = mysqli_fetch_array($resultInsurance)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
					echo "<td>".$row['firstName']."</td>";
                    echo "<td>" .$row['disease']. "</td>";
                    echo "<td>".$row['medicineType']."</td>";
                    echo "<td>" .$row['medicalCardNumber']. "</td>";
                    echo "<td>".$row['medicinePrice']."</td>";
					echo "<td>".$row['maximumInsuranceCost']."</td>";
					

					
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>