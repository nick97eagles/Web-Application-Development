<?php
require("functions.php");

//Variables
$error = '';
$name = '';
$seat_num = '';

if(isset($_POST["submit"])){

    //This is suppose to check for two people in the same seat. See function defintion for explanation. 

    /*if(compare($_POST["seat"] == true)){
        $error .= '<p><label>That seat is already taken</label></p>';
    }*/ 
    
    if(empty($_POST["name"])){
        $error .= '<p><label> Please enter your Name</label><//p>';
    }
    else{
        $name = clean_text($_POST["name"]);
    }
    if(empty($_POST["seat"])){
        $error .= '<p><label>Please enter your desired seat number</label></p>';
    }
    else{
        $seat_num = clean_text($_POST["seat"]);
    }
    if($error == ''){
        $file_open = fopen("seating_chart.csv", "a");
        $no_rows = count(file("seating_chart.csv"));
        $form_data = array(
            'name'  => $name,
            'seat'  => $seat_num
        );
        //Puts data into csv file and resets variables
        fputcsv($file_open, $form_data); 
        $error = '<label>Thank you</label>';
        $name = '';
        $seat_num = '';
    }
}

?>

<!-- Start of HTML -->
<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Seating Chart</title>
    <link href="style.css" rel='stylesheet'/>
</head>
<body>

<header>
    <img src="images/banner.jpg" alt="welcome banner">
    <p>CPTR220 seating chart app <p> 
    
<div id="links">
        <a href="http://bulletin.wallawalla.edu/en/2017-2018/2017-2018-Undergraduate-Bulletin/Courses/CPTR-Computer-Science/200/CPTR-235">Class Page</a>
        <a href="https://www.wallawalla.edu">Walla Walla University</a>
</div>

<!--From for url query to get image uploads and seating chart -->
<form method="get" action="index.php" id="radioButtons">
        <input type="submit" value="Upload Image" name="upload">
        <input type="submit" value="Seating Chart" name="chart">
</form>
</header>

<!--Form for getting user's input --> 
<form method="post">
<?php echo $error; ?>
    <div>
     <!-- Gets student's name --> 
        <label style="font-weight: bold;">Enter Name: </label>
        <input type="text" name="name"
        placeholder="Enter Name" 
        value="<?php echo $name; ?>" />
    </div>
    <!-- Gets student's seat number --> 
    <div>
        <label style="font-weight: bold;">Enter Seat Number: </label>
        <input type="text" name="seat"
        placeholder="Enter seat number" 
        value="<?php echo $seat_num; ?>" />
    </div>
    <div id="submit">
        <input type="submit" name="submit" value="Submit"> 
    </div> 
</form>

<?php

if(isset($_GET['upload'])){
    include("upload.php");
}

if(isset($_GET['chart'])){
    include("chart.php");
}
?>

<footer>
|<a href="https://validator.w3.org/check/referer">Validate HTML</a> | 
<a href="http://jigsaw.w3.org/css-validator/check/referer">Validate CSS</a>|

<p>Created by: Nick Morin</p>
</footer>

</body>
</html>