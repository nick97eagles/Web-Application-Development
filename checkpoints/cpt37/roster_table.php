<?php
/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 12.1
 *
 * File Name: roster_table.php
 * Username:  morini   
 * Username:  warrwa
 * Course:    CPTR 220
 * Date:      12/3/18
 */

// Load CSV file
function import_csv($filename) {
    $lines = file($filename);
    $data = array();
    foreach($lines as $line) {
        $data[] = str_getcsv($line);
    }
    return $data;
}

$data = import_csv("roster_pink.csv");
array_shift($data);

// TODO Print table


echo "<table style=\"text-align: center;\">\n";
echo "<tr><th>Name</th><th>Position</th><th>Number</th></tr>\n";
foreach ($data as $lines){
    echo " <tr>"; 
    foreach($lines as $item){
        echo "<td>" . $item . "</td>";
    }
    echo "</tr>\n";
}
echo "</table>"; 