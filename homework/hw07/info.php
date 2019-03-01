<?php
/////////////////////
// This file will get info about a specific book
//////////////////// 
include("db.php");
$dbh = new PDO("mysql:host$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);
$bookTitle = ($_GET['Search']);

    echo "<h1 style=\"text-align: center;\">Info</h1>";

    $SQL = "SELECT bookTitle, seriesName, authorFirst, authorLast, bookISBN, bookPages, bookPublishedDate, bookPublisher ";
    $SQL .= "FROM book NATURAL JOIN book_author NATURAL JOIN author NATURAL JOIN book_series NATURAL JOIN series ";
    $SQL .= "WHERE bookTitle =\"$bookTitle\";"; 

    //$SQL = "SELECT bookID FROM book WHERE bookTitle = \"$bookTitle\";";

    $sth = $dbh->prepare($SQL);
    $sth->execute(); 
    //var_dump($sth->fetchALL(PDO::FETCH_ASSOC));
    //die;

    echo "<table style=\"margin-left:22%; width: 60%;\">
    <th>Name</th>
    <th>Book Series</th>
    <th>AuthorFirst</th>
    <th>AuthorLast</th>
    <th>ISBN #</th>
    <th>Number of Pages</th>
    <th>Publishing Date</th>
    <th>Book Publisher</th>";

    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
            <td>$row[bookTitle]</td>
            <td> $row[seriesName] </td>  
            <td> $row[authorFirst] </td> 
            <td> $row[authorLast] </td> 
            <td> $row[bookISBN] </td> 
            <td> $row[bookPages] </td> 
            <td> $row[bookPublishedDate] </td> 
            <td> $row[bookPublisher] </td> 
        </tr>";
    }

    echo "</table>";
   
    


?>