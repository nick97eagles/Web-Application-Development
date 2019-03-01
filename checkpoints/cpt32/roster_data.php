<?php
/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 9.1
 *
 * File Name: roster_data.php
 * Username:  morini   
 * Username:  floros
 * Course:    CPTR 220
 * Date:      11/16/18
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

// Print array
echo "var roster = [\n";
foreach ($data as $row) {
    echo "  [";
    foreach ($row as $col) {
        echo "'" . $col . "',";
    }
    echo "], \n";
}
echo "];\n";

