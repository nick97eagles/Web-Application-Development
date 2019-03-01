<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Series</title>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>
<h1 style="text-align: center;">Series</h1> 

<?php
    echo "<table style= \"margin-right: 31%; \" >";  
    echo "<th>Name</th>";
    echo "<th>Number of Books in Series</th>";
    echo "<th>Book Preview</th>";
    get_series_list();
    echo "</table>";
?>
</body>
</html> 