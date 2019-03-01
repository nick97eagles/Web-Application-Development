<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Library</title>
    <link href="style.css" rel="stylesheet"/>
</head> 
<body>
<header>
    <!-- Form goes here --> 
    <form method="get" action="index.php">
        <input type="submit" value="Home" name="home">
        <input type="submit" value="Authors" name="authors">
        <input type="submit" value="Books" name="bookTitle">
        <input type="submit" value="Series" name="series">
        <input type="submit" value="Collection" name="collection">
        <input type="submit" value="Search" name="search">
    </form> 
</header> 

   <!--These will show different screens based on the query string  -->
<?php
include("functions.php");
//shows homescreen
if(isset($_GET['home'])){
    home(); 
}
//when authors is first clicked it will be arranged by authorFirst
if(isset($_GET['authors'])){
    get_author_list('authorFirst');
}
if(isset($_GET['authorID'])){
    get_author_list('authorID');
}
//when you first visit this part of the page it will be sorted by authorLast 
if(isset($_GET['bookTitle'])){
    book_info('bookTitle'); 
}
//clicking on Name will result in sorting it by bookISBN
if(isset($_GET['BookTitle'])){
    book_info('bookTitle');
}
//clicking on Book Series will result in sorting it by seriesName
if(isset($_GET['seriesName'])){
    book_info('seriesName');
}
//clicking on Author First will result in sorting it by authorFirst
if(isset($_GET['authorFirst'])){
    book_info('authorFirst');
}
//clicking on Author Last will result in sorting it by authorLast
if(isset($_GET['authorLast'])){
    book_info('authorLast');
}
//clicking on ISBN# will result in sorting it by bookISBN
if(isset($_GET['bookISBN'])){
    book_info('bookISBN');
}
//clicking on Number of Pages will result in sorting by bookPages
if(isset($_GET['bookPages'])){
    book_info('bookPages');
}
//clicking on Publishing Date will result in sorting by bookPublishingDate
if(isset($_GET['bookPublishedDate'])){
    book_info('bookPublishedDate');
}
//clicking on Book Publisher will result in sorting by bookPublisher
if(isset($_GET['bookPublisher'])){
    book_info('bookPublisher');
}
//clicking on Series will display series info
if(isset($_GET['series'])){
    series_info('seriesName');
}
//clicking on Series Name will result in sorting by seriesID
if(isset($_GET['seriesID'])){
    series_info('seriesID');
}
//clicking on Collection will direct you to the collection page
if(isset($_GET['collection'])){
    $d = 1; 
     include("collection.php"); 
}
//clicking on a bookTitle will bring up the information about that book 
if(isset($_GET['Search'])){
     include("info.php"); 
}
//Coming soon....
if(isset($_GET['search'])){
   include("search.php");
}
?>
</body>
<footer style="text-align: center; margin-top: 4%;">
    <a href="https://validator.w3.org/check/referer">Html Validator</a>
</footer>
</html> 