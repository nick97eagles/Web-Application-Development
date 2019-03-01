<?php

echo "<h1 style=\"text-align: center;\">Collection</h1>";

echo "<form id=\"collection\">
            <input type='radio' name='collection' value='1'>My Library<br>
            <input type='radio' name='collection' value='2'>Wishlist<br>
            <input type='radio' name='collection' value='3'>Unread<br>
            <input type='radio' name='collection' value='4'>Read<br>
            <input type='submit' value='Submit'>
        </form>";
books('bookTitle', $_GET['collection']);

function books($b, $number){
    global $dbh;

    if ($number == 1){
        $SQL = "SELECT bookTitle, seriesName, authorFirst, authorLast, bookISBN, bookPages, bookPublishedDate, bookPublisher ";
        $SQL .= "FROM book b ";
        $SQL .= "JOIN book_series s ON b.bookID=s.bookID ";
        $SQL .= "JOIN series d on s.seriesID=d.seriesID ";
        $SQL .= "JOIN book_author a ON b.bookID=a.bookID ";
        $SQL .= "JOIN author u ON a.authorID=u.authorID ";
        $SQL .= "ORDER BY $b ";
    } else {
        $SQL = "SELECT bookTitle, seriesName, authorFirst, authorLast, bookISBN, bookPages, bookPublishedDate, bookPublisher ";
        $SQL .= "FROM book b ";
        $SQL .= "JOIN book_series s ON b.bookID=s.bookID ";
        $SQL .= "JOIN series d on s.seriesID=d.seriesID ";
        $SQL .= "JOIN book_author a ON b.bookID=a.bookID ";
        $SQL .= "JOIN author u ON a.authorID=u.authorID ";
        $SQL .= "JOIN book_collection c ON b.bookID=c.collectionID ";
        $SQL .= "WHERE c.bookID = $number ";
        $SQL .= "ORDER BY $b ";
    }
    
    $sth = $dbh->prepare($SQL);
    $sth->execute();
    
    echo "<table style=\"margin-left: 25%;\">
        <th>Book Name</a></th>
        <th>Series Name</a></th>
        <th>Book Author</th>
        <th>Book Publisher</th>
        <th>Published Date</th>
        <th>Number of Pages</th>
        <th>Book ISBN</th>";
    
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
                <td>{$row['bookTitle']}</td>
                <td>{$row['seriesName']}</td>
                <td>{$row['authorFirst']} {$row['authorLast']}</td>
                <td>{$row['bookPublisher']}</td>
                <td>{$row['bookPublishedDate']}</td>
                <td>{$row['bookPages']}</td>
                <td>{$row['bookISBN']}</td>
            </tr>";
    }
    
    echo "</table>";
}





?>