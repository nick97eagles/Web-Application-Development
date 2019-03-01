<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Books</title>
    <link href="style.css" rel="stylesheet"/>
</head> 
<body>

<h1 style='text-align: center'>Books</h1>

<!-- Table for displaying the data from the csv file --> 
<?php
  echo "<table>
    <th>Name</th>
    <th>Book Series</th>
    <th>Author</th>
    <th># of Pages</th>
    <th>ISBN #</th>
    <th>Number of Pages</th>
    <th>Book Publisher</th>";
    get_book_list();
echo "</table>";

 
?>
</html> 
