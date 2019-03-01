<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pink Pirates Roster</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Pink Pirates Roster</h1>
<?php
 include("functions.php");
 $data=import_csv("roster.csv");
   echo "<table>";
   for ($i=0; $i<count($data); $i++){
        echo "<tr><td>".$data[$i][0]. "</td> ";
        echo "<td>".$data[$i][1] ."</td> ";
        echo "<td>".$data[$i][2]."</td> </tr>";
   }
    echo "</table>";
?>
    <hr>
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a> | 
        <a href="http://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>    

</body>

</html>