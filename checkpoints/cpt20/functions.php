<?php

/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 5.4
 *
 * File Name: functions.php
 * Username:  morini       
 * Username:  lugoal
 * Course:    CPTR 220
 * Date:      ?
 */
define('R_NAME', 0);
define('R_POSITION', 1);
define('R_NUMBER', 2);

function import_csv($filename){
    $lines = file($filename);
    $data = array(); 
    foreach($lines as $line){
        $data[] = str_getcsv($line);
    }
    return $data; 
}

function print_roster_table($data) {
    echo "<table>";
    echo "    <tr>";
    echo "        <th>Name</th>\n";
    echo "        <th>Position</th>\n";
    echo "        <th>Number</th>\n";
    echo "    </tr>\n";
    // Print the data rows.
    for ($row = 1; $row < count($data); $row++) {
        echo "    <tr>";
        echo "        <td><a href=\"player.php?number=" . $data[$row][R_NUMBER]. "\">" . $data[$row][R_NAME] . "</a></td>\n";
        echo "        <td>" . $data[$row][R_POSITION] . "</td>\n";
        echo "        <td>" . $data[$row][R_NUMBER] . "</td>\n";
        echo "    </tr>\n";
    }
    echo "</table>";
}

function print_roster_dropdown($data) {
    echo "    <select name=\"number\">\n";
    // Print the data rows.
    for ($row = 1; $row < count($data); $row++) {
        echo "    <option value=\"" . $data[$row][R_NUMBER] . "\">" . $data[$row][R_NAME] . "</option>\n";
    }
    echo "    </select>\n";
}

function get_player($data, $number) {
    for ($row = 1; $row < count($data); $row++) {
        if ($data[$row][R_NUMBER] == $number) {
            return $data[$row];
        }
    }
    return array();
}
