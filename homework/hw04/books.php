<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Books</title>
    <link href="book.css" rel="stylesheet"/>
</head> 
<body>
<!-- Nav bar --> 
<header>
    <a id="home" href="index.php">Home</a>
    <a id="authors" href="authors.php">Authors</a>
    <a id="series" href="series.php">Series</a>
</header> 

<h1 style='text-align: center'>Books</h1>

<!-- Table for displaying the data from the csv file --> 
<?php
 require("functions.php");
 authors(); 
 
?>
</html> 
