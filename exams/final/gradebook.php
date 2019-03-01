<?php

$db_host = '127.0.0.1';
$db_port = '3306';
$db_user = 'dbuser';
$db_pass = 'test123';
$db_name = 'gradebook';

$dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);

// if statment is to make sure that when ajax calls this file it only loads this portion
if($_GET['load'] == 'yes'){
    $SQL = "SELECT gb_student_first, gb_student_last ";
    $SQL .= "FROM gb_student ";
    $sth = $dbh->prepare($SQL);
    $sth->execute(); 

   
    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
       echo $row['gb_student_first'] . " " . $row['gb_student_last'] . ", ";
    }
}
else{
    // splits first and last name 
    $student = explode(" ", $_GET['student']); 

    // get the grades of chosen student
    $SQL = "SELECT gb_grade_assignment, gb_grade_letter ";
    $SQL .= "FROM gb_grade g ";
    $SQL .= "JOIN gb_student s ON g.gb_student_id = s.gb_student_id ";
    $SQL .= "WHERE s.gb_student_first = '" . $student[0] . "' ";
    $SQL .= "AND s.gb_student_last = " . "'" . $student[1] . "'";
    
    $sth = $dbh->prepare($SQL);
    $sth->execute(); 

    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        echo $row['gb_grade_assignment'] . " " . $row['gb_grade_letter'] . ", ";
    }
}



