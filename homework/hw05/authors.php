<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Authors</title>
    <link href="style.css" rel="stylesheet"/>
</head> 
<body>

<h1 style="text-align: center">Authors</h1>

<!-- Table that will display Authors and data from library_authors.csv -->
<?php
    echo "<table>";
    echo "<th>Author</th>";
    echo "<th>Number of Books Written</th>";
    echo "<th>Book Preview  </th>";
    get_author_list();
    echo "</table>"
?>
</html> 