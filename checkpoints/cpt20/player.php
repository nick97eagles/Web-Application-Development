<!DOCTYPE html>
<html lang="en">

<head>
    <title>Player</title>
    <meta charset="UTF-8">
</head>

<body>

   
    <h1>Player</h1>

    <?php
        include("functions.php");
        $players_list_raw = import_csv("roster_pink.csv");
        //print_roster_table($players_list_raw);
        $player = get_player($players_list_raw, $_REQUEST["number"]);
    
    ?>
    <img src="uploads/player.jpeg" alt="player image" />
    
     <ul>
        <li>Player Name: <?= $player[0] ?></li>
        <li>Position: <?= $player[1] ?></li>
        <li>Number: <?= $player[2] ?></li>
     </ul>
    
    <footer>
        <hr>
        <p>
            <!-- Validation Links -->
            <a href="https://validator.w3.org/check/referer">validate HTML</a> | 
            <a href="http://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
        </p>    
    </footer>

</body>

</html>