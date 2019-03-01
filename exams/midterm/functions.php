<?php
//Variables
$info = file("seating_chart.csv");
$seatNum = 1; 
$rows = 4;
$column = 7; 
$empty = 0; 
$chart = array(); 
$seat_chart = array(); 

//Checks to see if a seat is already chosen
//Doesn't work just yet and I can't figure out why 
function compare($seat){
   require("seating_chart.csv");
   $f = fopen("seating_chart.csv","r");
   $result = false; 
   while($row = fgetcsv($f)){
       if($row[1] == $seat){
           $result = true; 
           break; 
       }
       else{
           $result = false; 
       }
   }
   fclose($f);
   return $result; 
}

//This function will clean up the user's input and make it easier for the computer to read from csv. 
function clean_text($string){
    $string = trim($string);
    $string = stripcslashes($string);
    $string = htmlspecialchars($string); 
    return $string; 
}

//creates chart 
function chart(){
    global $rows,
           $column,
           $empty,
           $seat_chart; 
    for($i=0; $i<$rows; $i++){
        $seat_chart[$i] = array(); 
        for($j=0; $j<$column; $j++){
            $seat_chart[$i][$j] = 99; 
        }
    }

    //each seat next to an aisle seat will be set to null 
    $seat_chart[0][2]= 0;
    $seat_chart[1][2]= 0;
    $seat_chart[2][2]= 0;
    $seat_chart[3][0]= 0;
    $seat_chart[3][1]= 0;
    $seat_chart[3][2]= 0;

    //numbers each available seat
    $seatNum = 1; 
    for($i=0; $i<$rows; $i++){
        for($j=0; $j<$column; $j++){
            if($seat_chart[$i][$j] != $empty){
                $seat_chart[$i][$j] = $seatNum; 
                $seatNum++; 
            }
        }
    }
}

//displays seating chart 
//breaks as more students are added, cant' for the life of me figure out how to fix it 
function display_chart(){
    $seat = "<img src=\"images/seat.jpg\"  alt=\"seat\" style=\"width:128px; height:128px;\">";
    $blank = "<img src=\"images/blank.jpg\" alt=\"blank\" style=\"width:128px; height:128px;\">";

    global $rows, //4
           $column, //7
           $empty, //0
           $chart, //array()
           $seat_chart; //array()

    $student = file('seating_chart.csv');
    
    echo "<h3 style=\"text-align: center;\">Seating Chart</h3>";
    echo "<table>"; 
        for($i=0; $i<$rows; $i++){
            echo "<tr>";
                for($j=0; $j<$column; $j++){
                    $s = $seat_chart[$i][$j]; 

                    foreach($student as $students){
                        $students = str_replace('"',"", $students);
                        $studentArray = explode(',', $students);
                    
                        if($studentArray[1] == $s){
                            echo "<td style=\"text-align:center;\">$studentArray[0]</td>";
                        } 
                    }
                    
                    if($seat_chart[$i][$j] == $empty){
                        echo "<td>$blank</td>";
                    }
                    else{
                        echo "<td>$seat</td>";
                    }
                }
            echo "</tr>"; 
        }
    echo "</table>";
}
?>