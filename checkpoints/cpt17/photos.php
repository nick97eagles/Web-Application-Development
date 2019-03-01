<?php

/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 6.1
 *
 * File Name: photos.php
 * Username:  morini
 * Username:  lugoal
 * Course:    CPTR 220
 * Date:      10/22/18
 */

?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Display Random Picture</title>
    <link rel="stylesheet" type="text/css" href="photos.css">
    <meta charset="UTF-8">
</head>

<body>
    <header>
        <!-- Google Searches -->
        <nav>
            <a href="https://www.google.com/search?q=Walla Walla University">WWU</a> | 
            <a href="https://www.google.com/search?q=Pink Pirates">Pink Pirates</a> | 
            <a href="https://www.google.com/search?q=Random Name Generator">Random Name Generator</a>
        </nav>
        <hr>
    </header>

    <h1>Photo Links</h1>

    <!-- TODO Create Three Photos Links -->
    <ul>
        <li><a href="https://picsum.photos/200/300/?random">Sample photo 1</a></li>
        <li><a href="https://picsum.photos/200/300/?random">Sample photo 2</a></li>
        <li><a href="https://picsum.photos/200/300/?random">Sample photo 3</a></li>
    </ul>

    <hr>

    <!-- TODO Add HTML Form to Get Random Photos -->
    <h1>Photo Form</h1>
   
    <!-- Form 1 is for querying random photos based on number input -->
     <form action="https://picsum.photos/200/300">
        <div>
            Enter an image number: 
            <input name="image" value="" />
            <input type="submit" value="Search Image"/>
        </div>
        </form> 
        
    <!-- Form 2 is for crop gravity selection with a drop down list -->     
        <form action="https://picsum.photos/200/300">
        <div id="form2">
            <select name="gravity">
            <option> east </option>
            <option> west </option>
            <option> north </option>
            <option> south </option>
            <option> center </option>
            </select>
            <input type = "Submit"/>
        </div>
        </form>

    
    <footer>
        <hr>
        <p>
            <!-- Validation Links -->
            <a href="https://validator.w3.org/check/referer">validate HTML</a> | 
            <a href="http://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
        </p>    
    </footer>

</body>

</html>