<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pink Pirates Roster</title>
    <meta charset="UTF-8">
</head>

<body>
<h1>Pink Pirates Roster</h1>

<!-- Counts how many players there are for each position --> 
<?php
    include("functions.php");
    $team_pink = import_csv("roster_pink.csv");
    print_table($team_pink);

    $POSITION = 1;

    array_shift($team_pink);
    //array_shift($team_red);
    
    $counts = array(); 
    foreach($team_pink as $player){
        if (array_key_exists($player[1], $counts)){
            $counts[$player[$POSITION]]++;
        } else{
            $counts[$player[$POSITION]] = 1; 
        }
    }
    //print_r($counts);

// prints table with how many players for each position 
    echo "<table>";
        foreach ($counts as $position => $count) {
            echo "     <tr>";
            echo "        <td>" . $position . "</td>\n";
            echo "        <td>" . $count . "</td>\n";
            echo "     </tr>\n";
            $first = false;        
        }    
    echo "</table>";
?>

    <h1>Red Bullets Roster</h1>

<?php
    $team_red = import_csv("roster_red.csv");
    print_table($team_red);

    $POSITION = 1;

    array_shift($team_red);

    //counts how many players for each position there are 
    $counts = array(); 
    foreach($team_red as $player){
        if (array_key_exists($player[1], $counts)){
            $counts[$player[$POSITION]]++;
        } else{
            $counts[$player[$POSITION]] = 1; 
        }
    }

// prints table with how many players for each position 
    echo "<table>";
        foreach ($counts as $position => $count) {
            echo "     <tr>";
            echo "        <td>" . $position . "</td>\n";
            echo "        <td>" . $count . "</td>\n";
            echo "     </tr>\n";
            $first = false;        
        }    
    echo "</table>";

?>
    <hr>
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a> | 
        <a href="http://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>    

</body>

</html>