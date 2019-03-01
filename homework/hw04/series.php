<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Series</title>
    <link href="series.css" rel="stylesheet"/>
</head>

<body>
    <!-- Navagation Bar -->
    <header>
    <a id="home" href="index.php">Home</a>
    <a id="authors" href="authors.php">Authors</a>
    <a id="books" href="books.php">Books</a>
    </header>

<h1 style="text-align: center;">Series</h1> 

<div>
<!-- Creates table that will show data -->
<?php
 require("functions.php");
 $data=import_csv("library_series.csv");
 echo "<table>";

 error_reporting(0); // to clear the error notice from displaying
 
 for ($i=0; $i<count($data); $i++){
    if($data[$i][1] == $data[$i+1][1]){ //if statement will check to see if 
        continue;                       // there are duplicating book names 
    } else{                             // and skip them if there is 
      echo "<tr><td>".$data[$i][0]. "</td> ";
      echo "<td>".$data[$i][1] ."</td> "; 
      echo "<td>".$data[$i][2]."</td> </tr>";}
 }
  echo "</table>";
?>
</div>


</body>
</html> 