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
        <input type="submit" value="Books" name="books">
        <input type="submit" value="Series" name="series">
        <input type="submit" value="Search" name="search">
    </form> 
</header> 

   <!--These will show different screens based on the query string  -->
<?php
include("functions.php");

if(isset($_GET['home'])){
    home(); 
}

if(isset($_GET['authors'])){
    include("authors.php");
}

if(isset($_GET['books'])){
    include("books.php");
}

if(isset($_GET['series'])){
    include("series.php");
}

if(isset($_GET['search_for_book'])){
    book_info($_GET['search_for_book']);
}

if(isset($_GET['search_for_author'])){
    author_info($_GET['search_for_author']);
}

if(isset($_GET['search_for_series'])){
    series_info($_GET['search_for_series']);
}

if(isset($_GET['search'])){
    input(); 
}

if(isset($_GET['search_book'])){
    search($_GET['input']); 
}

if(isset($_GET['search_author'])){
    author_info($_GET['input']); 
}

if(isset($_GET['search_date'])){
    book_pub($_GET['input']); 
}

if(isset($_GET['search_pages'])){
    pages($_GET['input']); 
}

if(isset($_GET['search_isbn'])){
    isbn($_GET['input']); 
}


?>
</body>
<footer style="text-align: center; margin-top: 4%;">
    <a href=https://validator.w3.org/nu/?doc=http%3A%2F%2Fmorini-cptr220.cs.wallawalla.edu%2Fhomework%2Fhw05%2Findex.php>Html Validator</a>
</footer>
</html> 