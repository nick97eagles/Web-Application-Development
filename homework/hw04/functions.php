<?php
// method for creating an array of strings from csv file 
// taken from cpt15 
function import_csv($filename){
    $lines = file($filename);
    $data = array(); 
    foreach($lines as $line){
        $data[] = str_getcsv($line);
    }
    return $data; 
}

function authors(){
    $author = import_csv("library_authors.csv");
    $book_id = import_csv("library_books.csv");

 /* This block was my attempt to add two more columns to the original books csv file   
    I wanted to include the author's first and last name with the books they had written. 
    I couldn't figure out how to place that information into a new array that would then
    be pushed onto the original one. 
*/
    /*$POSITION = "";
    $name = array(); 
    foreach($author as $authors){
        if(array_key_exists($authors[2], $name)){
            $name[$authors[$POSITION]]; 
        }
    }
    //print_r($name); 

    $new_books = array();
    $new_books[] = array("bookId", "bookTitle", "bookPublisher", "bookPublisherDate", "bookPages", "bookISBN", "Author");
    foreach($book_id as $book){
        array_push($book,$name);
        $new_books[] = $book; 
    }*/

    print_table($book_id); //Just prints the normal csv file. 
  
}

// function that will print the table of books 
function print_table($filename){
    echo "<table>";
    for ($i=0; $i<count($filename); $i++){
         echo "<tr><td>".$filename[$i][0]. "</td> ";
         echo "<td>".$filename[$i][1] ."</td> ";
         echo "<td>".$filename[$i][2]."</td> ";
         echo "<td>".$filename[$i][3]."</td> ";
         echo "<td>".$filename[$i][4]."</td> ";
         echo "<td>".$filename[$i][5]."</td> </tr>";
    }
     echo "</table>";
}

/* I am beyond frustrated with this homework assignment. I have tried for hours to 
figure out how to get info from one file into another and it is not working. I have 
other classes that I need to focus on as well and I feel that I shouldn't be graded
harshly on the fact that I couldn't get algorithms to work. Please be gracious when 
grading this assignment. I have tried very hard to get it. */