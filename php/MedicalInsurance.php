<?php 

 if(mysqli_num_rows($result) > 0){
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
                    <td>Hobbies</td>
                    <td>Medical Problems</td>
                    <td>Disability</td>
                    <td>ParentId</td>
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