<?php
    echo '<form method="post" action="addChild.php" enctype="multipart/form-data">';
    echo "<img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
    echo '<input type="text" id="name" name="name" value='.$row["name"].'><br>';
    echo '<input type="text" id="gender" name="gender" value='.$row["gender"].'><br>';
    echo '<input type="date" id="dateOfBirth" name="dateOfBirth" value='.$row["dateOfBirth"].'><br>';
    echo '<input type="text" id="hobbies" name="habbies" value='.$row["hobbies"].'><br>';
    echo '<input type="text" id="medicalProblems" name="medicalProblems" value='.$row["medicalProblems"].'><br>';
    echo '<input type="text" id="disability" name="disability" value='.$row["disability"].'><br>';
    echo '<input type="submit" id="submit" value="Add Another Child" name="Add Another Child"/><br>';
    echo '</form><br>';                         

?>