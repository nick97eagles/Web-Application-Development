<?php
include("db.php");
$dbh = new PDO("mysql:host$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);

  
//function for displaying home screen information
function home(){
   global $dbh; 
   $count_books = $dbh->query($SQL = 'SELECT COUNT(bookid) FROM book');
   $count_authors = $dbh->query($SQL = 'SELECT COUNT(authorid) FROM author');
   $count_series = $dbh->query($SQL = 'SELECT COUNT(seriesid) FROM series');
    echo "<div>";
    echo "<h2 style = \"text-align: center;\">Welcome</h2>";
    echo "<p style = \" text-align: center; font-size: 30px;\">
            On this site there are {$count_books->fetchColumn()} books written by
            {$count_authors->fetchColumn()} authors, for a total of {$count_series->fetchColumn()} series.<br> 
            Feel free to browse around and explore!</p>";
    echo "</div>";
    }   

    // AUTHOR FUNCTIONS ////////////////

//Function that prints out authors, the number of books that they wrote, and a title of a book they wrote.
    function get_author_list($v){
      global $dbh; 

      echo "<h2 style=\"text-align: center;\">Authors</h2>";
      
      $SQL = "SELECT author.authorFirst, author.authorLast, COUNT(book_author.authorID) as number_of_books, author.authorID ";
      $SQL .= "FROM author, book_author ";
      $SQL .= "WHERE author.authorID = book_author.authorID ";
      $SQL .= "GROUP BY author.authorID ";
      $SQL .= "ORDER BY $v ";
      $sth = $dbh->prepare($SQL);
      $sth->execute();

      echo "<table>";
      echo "<th><a href='?authorID=authorID'>Author</th>";
      echo "<th>Number of Books Written</th>";
      echo "<th>Book Preview  </th>";
      
      

      while ($row = $sth->fetch(PDO::FETCH_ASSOC)){   
        echo "<tr>
        <td>{$row['authorFirst']} {$row['authorLast']}</td>
        <td>{$row['number_of_books']}</td>";
        book_preview($row['authorID']);
        echo "</tr>";
      }
      echo "</table>";
    }

//Gets a book example written by an author 
    function book_preview($author_id){
        global $dbh;

        $SQL = "SELECT bookTitle ";
        $SQL .= "FROM author a ";
        $SQL .= "JOIN book_author b ON a.authorID=b.authorID ";
        $SQL .= "JOIN book c ON b.bookID=c.bookID ";
        $SQL .= "WHERE a.authorID = $author_id ";
        $SQL .= "LIMIT 1";
        $sth = $dbh->prepare($SQL);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
            echo "<td>{$row['bookTitle']}</td>";
        }
    }

    // SERIES FUNCTIONS ////////////

//will show series information 
    function series_info($i){
        global $dbh;

        echo "<h2 style=\"text-align: center;\">Series</h2>";

        $SQL = "SELECT seriesName, COUNT(bookID) as number_of_books, series.seriesID ";
        $SQL .= "FROM series, book_series ";
        $SQL .= "WHERE series.seriesID = book_series.seriesID ";
        $SQL .= "GROUP BY series.seriesID ";
        $SQL .= "ORDER BY $i ";
        
        echo "<table>";
        echo "<th><a href='?seriesID=seriesID'>Series Name</a></th>";
        echo "<th>Number of Books</a></th>";
        echo "<th>Example Book</th>";
        
        $sth = $dbh->prepare($SQL);
        $sth->execute();
        
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
                <td>{$row['seriesName']}</td>
                <td>{$row['number_of_books']}</td>";
                exampleBook($row['seriesID']);
            echo "</tr>";
        }
        
        echo "</table>";
    }

//gives a book that is in the given series 
    function exampleBook($a){
        global $dbh;
        
        $SQL = "SELECT bookTitle ";
        $SQL .= "FROM series a ";
        $SQL .= "JOIN book_series b ON a.seriesID=b.seriesID ";
        $SQL .= "JOIN book c ON b.bookID=c.bookID ";
        $SQL .= "WHERE a.seriesID = $a ";
        $SQL .= "LIMIT 1";
        
        $sth = $dbh->prepare($SQL);
        $sth->execute();
        
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
            echo "<td>{$row['bookTitle']}</td>";
        }
    }


    // BOOK FUNCTIONS ///////////////////

//displays book info
function book_info($v){
    echo "<h2 style=\"text-align: center;\">Books</h2>";
    global $dbh;
    $SQL = "SELECT bookTitle, seriesName, authorFirst, authorLast, bookISBN, bookPages, bookPublishedDate, bookPublisher "; 
    $SQL .= "FROM book b JOIN book_series s ON b.bookID = s.bookID "; 
    $SQL .= "JOIN series d ON s.seriesID = d.seriesID "; 
    $SQL .= "JOIN book_author a On b.bookID = a.bookID "; 
    $SQL .= "JOIN author u ON a.authorID = u.authorID ";
    $SQL .= "ORDER BY $v ";
    $sth = $dbh->prepare($SQL);
    $sth->execute(); 

    echo "<table style=\"margin-left: 21%;\">
    <th><a href='?BookTitle=BookTitle'>Name</th>
    <th><a href='?seriesName=seriesName'>Book Series</th>
    <th><a href='?authorFirst=authorFirst'>AuthorFirst</th>
    <th><a href='?authorLast=authorLast'>AuthorLast</th>
    <th><a href='?bookISBN=bookISBN'>ISBN #</th>
    <th><a href='?bookPages=bookPages'>Number of Pages</th>
    <th><a href='?bookPublishedDate=bookPublishedDate'>Publishing Date</th>
    <th><a href='?bookPublisher=bookPublisher'>Book Publisher</th>";

    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
            <td><a href='?Search=$row[bookTitle]'>$row[bookTitle]</a></td>
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
   
    }
?>