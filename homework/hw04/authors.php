<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Authors</title>
    <link href="authors.css" rel="stylesheet"/>
</head> 
<body>
<header>
    <a id="home" href="index.php">Home</a>
    <a id="series" href="series.php">Series</a>
    <a id="books" href="books.php">Books</a>
</header> 

<h1 style="text-align: center">Authors</h1>

<!-- Table that will display Authors and data from library_authors.csv -->
<?php
 include("functions.php");
 $data=import_csv("library_authors.csv");
   echo "<table>";

   error_reporting(0); //clears the error notice from appearing on page 
    
   for ($i=0; $i<count($data); $i++){
       //will check to see if author's name displays more than once, 
    //if so then it will cut the duplications
    if($data[$i][1] == $data[$i+1][1]){
       continue;
    }else{
        echo "<tr><td>".$data[$i][0]. "</td> ";
        echo "<td>".$data[$i][1] ."</td> ";
        echo "<td>".$data[$i][2]."</td> </tr>";}
   }
    echo "</table>";
?>
</html> 