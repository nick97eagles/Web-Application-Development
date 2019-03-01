<?php

// Load CSV file
function import_csv($filename) {
    $lines = file($filename);
    $data = array();
    foreach($lines as $line) {
        $data[] = str_getcsv($line);
    }
    return $data;
}

$data = import_csv("puzzles.csv");
array_shift($data);

// Print array
echo "var puzzles = [\n";
foreach ($data as $row) {
    echo "  [";
    foreach ($row as $col) {
        echo '"' . $col . '",';
    }
    echo "], \n";
}
echo "];\n";
 
