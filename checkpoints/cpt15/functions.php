<?php

/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 5.4
 *
 * File Name: functions.php
 * Username:  morini    
 * Username:  etieyo
 * Course:    CPTR 220
 * Date:      10/18/18
 */

 function import_csv($filename){
    $lines = file($filename);
    $data = array(); 
    foreach($lines as $line){
        $data[] = str_getcsv($line);
    }
    return $data; 
}


