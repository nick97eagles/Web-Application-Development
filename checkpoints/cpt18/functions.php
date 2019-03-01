<?php

/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 5.4
 *
 * File Name: functions.php
 * Username:  morini   
 * Course:    CPTR 220
 * Date:      10/24/18
 */

function import_csv($filename){
    $lines = file($filename);
    $data = array(); 
    foreach($lines as $line){
        $data[] = str_getcsv($line);
    }
    return $data; 
}

function print_table($data) {
    $first = true;
    echo "<table>";
    foreach ($data as $row) {
        echo "    <tr>";
        foreach ($row as $col) {
            if ($first) {
                // Print the header row.
                echo "        <th>" . $col . "</th>\n";
            } else {    
                // Print the data rows.
                echo "        <td>" . $col . "</td>\n";
            }
        }
        echo "    </tr>\n";
        $first = false;
    }
    echo "</table>";
}
