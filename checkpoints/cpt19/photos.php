<?php

/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 6.1 to 6.2
 *
 * File Name: photos.php
 * Username:  morini
 * Username:  lugoal
 * Course:    CPTR 220
 * Date:      10/25/18
 */

?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Random Picture</title>
    <link rel="stylesheet" type="text/css" href="photos.css">
    <meta charset="UTF-8">
</head>

<body>

   
    <h1>Photo Form For Image</h1>

    <!-- Radio type option  -->

    <form action ="https://picsum.photos/200/300/" target = "_blank">
        <div>
            Crop Gravity: 
            <input type = "radio" name = "gravity" value = "east" /> East
            <input type = "radio" name = "gravity" value = "west" /> West
            <input type = "radio" name = "gravity" value = "north" /> North
            <input type = "radio" name = "gravity" value = "south" /> South
            <input type = "radio" name = "gravity" value = "center" /> Center <br>
            <input type = "checkbox" name = "blur" /> Blur 
            <input type = "submit" />
        </div>
    </form>

  <!--  <form action ="https://picsum.photos/200/300/">
        <div> 
            Blur Option: 
            <input type = "checkbox" name = "blur" /> Blur 
            <input type = "submit"/> 
        </div> 
    </form> -->
            
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