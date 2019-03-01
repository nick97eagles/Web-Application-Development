<?php
//function for displaying home screen information
function home(){
   
    $a = get_author_count(); 
    $b = get_book_count(); 
    $s = get_series_count(); 

    echo "<div>";
    echo "<h2 style = \"text-align: center;\">Welcome</h2>";
    echo "<p style = \" text-align: center; font-size: 30px;\">
            On this site there are {$b} books written by
            {$a} authors, for a total of {$s} series.<br> 
            Feel free to browse around and explore!</p>";
    echo "</div>";
    }   

//Function that will allow searching 
//This is a work in progress because more than one button can be checked
// Not the cleanest way but works except for ISBN 
    function input(){
    echo  "<form action=\"index.php\">";
    echo  "<div id=\"search\">";
       echo  "Book: ";
       echo  "<input type=\"radio\" name=\"search_book\" />";
       echo "  Author: ";
       echo  "<input type=\"radio\" name=\"search_author\" />";
       echo "  Pages: ";
       echo "<input type=\"radio\" name=\"search_pages\" />";
       echo "  ISBN #: ";
       echo "<input type=\"radio\" name=\"search_isbn\" />";
       echo "  Publication Date: ";
       echo "<input type=\"radio\" name=\"search_date\" /><br>";
       echo  "<input type=\"text\" name=\"input\" />";
       echo"<input type=\"submit\" />"; 
    echo "</div>";
    echo "</form>";

    }

//Imports a file and creates an array of strings 
function import_csv($filename){
    $lines = file($filename);
    $data = array(); 
    foreach($lines as $line){
        $data[] = str_getcsv($line);
    }
    return $data; 
}

//Read in library csv files and store them as global variables
    $series = file("library_series.csv");
    $authors = file("library_authors.csv");
    $books = file("library_books.csv");
    array_shift($books);
    array_shift($authors);
    array_shift($series);

    // AUTHOR FUNCTIONS ////////////////

//Function that returns the number of authors in the library
//Does this by pushing each author to an array, getting rid of duplicate elements, then returning the number of elements in the array.
    function get_author_count(){
        global $authors;
        $allAuthArr = array();
        foreach($authors as $author){
            $authorarr = str_getcsv($author);
            array_push($allAuthArr,$authorarr[1].$authorarr[2]);
        }
        return count(array_unique($allAuthArr));
    }   

//Function to return all the authors in the library
    function get_all_authors(){
        global $authors;
        $allAuthArr = array();
        foreach($authors as $author){
            $authorarr = str_getcsv($author);
            array_push($allAuthArr,trim($authorarr[1]." ".$authorarr[2]));
        }
        return array_unique($allAuthArr);
    }


//Function to get the author of a book using the book's ID number
//Returns a string containing the author's name or "None", whichever applies
    function get_author($bookID) {
        global $authors;
        foreach($authors as $author) {
            $author = str_replace('"', "", $author);
            $authorarr = explode(',', $author);
            if($bookID == $authorarr[0]){
                return trim($authorarr[1] . " " . $authorarr[2]);
            }
        }
        return "None";
    }

//Function that prints out authors, the number of books that they wrote, and a title of a book they wrote.
    function get_author_list(){
        global $authors;
        $allAuths = array();

        //Set up an array with all the authors in it call allAuths
        foreach($authors as $author) {
            $author = str_replace('"', "", $author);
            $authorarr = explode(',', $author);
            $thisAuthor = trim($authorarr[1] . " " . $authorarr[2]);
            array_push($allAuths, $thisAuthor);
        }

        //Count the number of books each author wrote
        $authKeyArr = array_count_values($allAuths);

        //For each author in the array of authors, find a book that they wrote and associate it with that author using a hash
        foreach($authors as $author) {
            $author = str_replace('"', "", $author);
            $authorarr = explode(',', $author);
            $thisbookid = $authorarr[0];
            $thisAuthor = trim($authorarr[1] . " " . $authorarr[2]);
            $allAuthT[$thisAuthor] = get_book_by_id($thisbookid);
        }

        //set up an array that is all of the authors sorted alphabetically
        $authors1 = get_all_authors();
        sort($authors1);

        //Print the author, the number of books they've written, and a title of one of their books
        foreach($authors1 as $author) {
            $thisNum = $authKeyArr[$author];
            $thisTitle = $allAuthT[$author];
            print "<tr>
                <td><a href='?search_for_author=$author'>$author</a></td>	
				<td>$thisNum</td>
				<td>$thisTitle</td>
			</tr>
			";
        }
    }

//This function will display information about books a selected author has written 
    function author_info($author_name){
        global $authors;
        $needed_authors = array();
        $needed_books = array();
    foreach($authors as $author) {
        $author = str_replace('"', "", $author);
        $authorarr = explode(',', $author);
        $thisAuthor = trim($authorarr[1] . " " . $authorarr[2]);
        $needed_authors[$authorarr[0]] = $thisAuthor;
    }
    foreach($needed_authors as $books => $names){
        if($author_name == $names){
            $needed_books[] = $books;
        }
    }
        echo "<div>";
        echo "<h3>Books $author_name has written</h3>";
    foreach($needed_books as $bookid){
        $books = get_book_by_id($bookid);
        echo $books;
        echo "<br>";
    }
        echo "</div>";
}

    // SERIES FUNCTIONS ////////////

//Function to return all the series in the library
    function get_all_series(){
        global $series;
        $allSeriesArr = array();
        foreach($series as $set) {
            $set = str_replace('"', "", $set);
            $setarr = explode(',', $set);
            array_push($allSeriesArr,$setarr[1]);
        }
        return array_unique($allSeriesArr);
    }

//Function to retrieve what Series a book is in using the book's ID number
//Returns a string containing the series' name or "None", whichever applies
    function get_series($bookID) {
        global $series;
        foreach($series as $set) {
            $set = str_replace('"', "", $set);
            $setarr = explode(',', $set);
            if($bookID == $setarr[0]){
                return "$setarr[1]";
            }
        }
        return "None";
    }


//Function that prints out series, the number of books in the series, and the titles of the books in the series.
    function get_series_list(){
        global $series;
        $seriesHash = array();
		$seriesCount = array();

        //Set up hash storing all the books in a certain series corresponding to the series they're in
        foreach($series as $set){
			$set = str_replace('"', "", $set);
			$setarr = explode(',', $set);
			$seriesHash[$setarr[1]] = $setarr[1] . ", " . get_book_by_id($setarr[0]);
			$seriesHash[$setarr[1]] = ltrim($seriesHash[$setarr[1]], ',');
			//Set up hash storing the number of books in each series
			if (array_key_exists($setarr[1], $seriesCount)) {
				$seriesCount[$setarr[1]] += 1;
			} else {
				$seriesCount[$setarr[1]] = 1;
			}
			
        }

//Print all the series with the number of books in the series and the titles of those books
        $series1 = get_all_series();
        foreach($series1 as $set) {
            $thisNum = $seriesCount[$set];
            $thisTitles = $seriesHash[$set];
            print "<tr style= \"text-align: center; \">
                <td><a href='?search_for_series=$set'>$set</a></td>
				<td>$thisNum</td>
				<td>$thisTitles</td>
			</tr>
			";
        }
    }

//Function that will print all the books that are in a selected series
    function series_info($name){
        global $series;
        $series_list = array();
        foreach($series as $lines){
            $a = str_getcsv($lines);
            if($a[1] == $name){
                $series_list[] = $a[0];
            }
        }
        echo "<div>";
        echo "<h3>Books in this Series</h3>";
        echo "$name<br>";
        foreach($series_list as $bookid){
            $books = get_book_by_id($bookid);
            echo $books;
            echo "<br>";
        }
        echo "</div>";

    }

//Function that returns the number of series in the library
//Does this by pushing each series to an array, getting rid of duplicate elements, then returning the number of elements in the array.
    function get_series_count(){
        global $series;
        $allSerArr = array();
        foreach($series as $set){
            $setarr =str_getcsv($set);
            array_push($allSerArr,$setarr[1]);
        }
        return count(array_unique($allSerArr));
    }

    // BOOK FUNCTIONS ///////////////////

//Function that returns the number of books in the library
    function get_book_count(){
        global $books;
        return count($books);
    }

//Function to retrieve a book's name using its ID number
//Returns a string containing the books's name or "None", whichever applies
    function get_book_by_id($bookid){
        global $books;
        foreach($books as $book) {
            $book = str_replace('"', "", $book);
            $bookarr = explode(',', $book);
            if($bookid==$bookarr[0]){
                return $bookarr[1];
            }
        }
        return "None";
    }   


//Function that prints out all the books along with other information about the book.
    function get_book_list(){
        global $books;
        foreach($books as $book) {
            $book = str_replace('"', "", $book);
            $bookarr = explode(',', $book);
            $thisSeries = get_series($bookarr[0]);
            $thisAuthor = get_author($bookarr[0]);
            print "<tr style= \" text-align: center; \">
            <td><a href='?search_for_book=$bookarr[1]'>$bookarr[1]</a></td>				
                <td>$thisSeries</td>
				<td>$thisAuthor</td>
				<td>$bookarr[4]</td>
				<td>" . trim($bookarr[5]) . "</td>
				<td>$bookarr[3]</td>
				<td>$bookarr[2]</td>
			</tr> 
			";
        }
    }

//This function will display information about a book when selected 
    function book_info($name){
        global $books;
        foreach($books as $book) {
            $book = str_replace('"', "", $book);
            $bookarr = explode(',', $book);
            if($bookarr[1] == $name){
                $bookid = $bookarr[0];
                $publication = $bookarr[3];
                $isbn = $bookarr[5];
                break;
            }
        }
        $author = get_author($bookid);
        $series = get_series($bookid);
    echo "<div style= \"text-align: center\">";
        echo "Book:$name<br>";
        echo "Author:$author<br>";
        echo "Series:$series<br>";
        echo "Publication date:$publication<br>";
        echo "ISBN:$isbn<br>";
    echo "</div>";
    }

//Function that will find a book based on publication date
    function book_pub($pub_id){
        global $books; 
        foreach($books as $book){
            $book = str_replace('"',"", $book);
            $bookarr = explode(',', $book);
            if($bookarr[3] == $pub_id){
                $bookid = $bookarr[0];
                $book_name = $bookarr[1];
                $publication = $bookarr[2];
                $num_pages = $bookarr[4];
                $isbn = $bookarr[5];
                break;
            }
        }
        $author = get_author($bookid);
        $series = get_series($bookid);
        echo "<div style= \"text-align: center\">";
        echo "Book:$book_name<br>";
        echo "Author:$author<br>";
        echo "Series:$series<br>";
        echo "Publication Date: $pub_id<br>";
        echo "Number of Pages:$publication<br>";
        echo "ISBN:$isbn<br>";
    echo "</div>";
    }

//Function that will find book info based off how many pages are in the book 
    function pages($pages){
        global $books; 
        foreach($books as $book){
            $book = str_replace('"',"", $book);
            $bookarr = explode(',', $book);
            if($bookarr[4] == $pages){
                $bookid = $bookarr[0];
                $book_name = $bookarr[1];
                $publication = $bookarr[2];
                $publication_date = $bookarr[3];
                $isbn = $bookarr[5];
                break;
            }
        }
        $author = get_author($bookid);
        $series = get_series($bookid);
        echo "<div style= \"text-align: center\">";
        echo "Book:$book_name<br>";
        echo "Author:$author<br>";
        echo "Series:$series<br>";
        echo "Publication Date: $publication_date<br>";
        echo "Number of Pages:$pages<br>";
        echo "ISBN:$isbn<br>";
    echo "</div>";
    }

//Function that will find book info based on isbn number 
// I can't for the life of me figure out why this function doesn't work. 
// It's the same syntax as my other ones but yet doesn't work
function isbn($isbn_number){
    global $books; 
    foreach($books as $book){
        $book = str_replace('"',"", $book);
        $bookarr = explode(',', $book);
        if($bookarr[5] == $isbn_number){
            $bookid = $bookarr[0];
            $book_name = $bookarr[1];
            $publication = $bookarr[2];
            $publication_date = $bookarr[3];
            $pages = $bookarr[4];
            break;
        }
    }
    $author = get_author($bookid);
    $series = get_series($bookid);
    echo "<div style= \"text-align: center\">";
    echo "Book:$book_name<br>";
    echo "Author:$author<br>";
    echo "Series:$series<br>";
    echo "Publication Date: $publication_date<br>";
    echo "Number of Pages:$pages<br>";
    echo "ISBN:$isbn_number<br>";
echo "</div>";
}

//Function that will search for a book input by user 
// NOT NECESSARY: really don't know why I added this....
    function search($book_name){
        book_info($book_name);
    }
?>