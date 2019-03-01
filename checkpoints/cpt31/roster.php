<?php
/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 8.4
 *
 * File Name: roster.js
 * Username:  morini    
 * Username:  floros
 * Course:    CPTR 220
 * Date:      11/15/18
 */
 function import_csv($filename){
     $lines =file($filename);
     $data = array(); 
     foreach($lines as $line){
         $data[] = str_getcsv($line);
     }
     return $data; 
 }

 $data = import_csv("roster_pink.csv");
array_shift($data);

 echo "var roster = [\n";
 foreach($data as $row){
     echo "[";
     foreach($row as $col){
         echo "'" . $col . "',"; 
     }
     echo "], \n";
 }
 echo "];\n";
?>

function printTable(){
    for(var i = 0; i < roster.length; i++){
       console.log("hello");
    }
    
}
printTable();
 