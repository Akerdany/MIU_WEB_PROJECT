<?php 

 if(mysqli_num_rows($result) > 0){
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
                    <td>Disease</td>
                    <td>Medicine Type </td>
                    <td>Medical Card Number</td>
                    <td>Medicine Price</td>
					<td>Maximum Insurance Cost</td>
                    </tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
                    echo "<td>" .$row['hobbies']. "</td>";
                    echo "<td>".$row['medicalProblems']."</td>";
                    echo "<td>" .$row['disability']. "</td>";
                    echo "<td>".$row['parentId']."</td>";
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>