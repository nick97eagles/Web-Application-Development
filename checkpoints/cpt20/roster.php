<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pink Pirates Roster</title>
    <meta charset="UTF-8">
</head>

<body>
<h1>Pink Pirates Roster</h1>
<?php
    include("functions.php");
    $team_pink = import_csv("roster_pink.csv");
    print_roster_table($team_pink);
?>


    <br />

    <form action="player.php" method="post">
        <label for="number">Find a players details:</label>
        <?php print_roster_dropdown($team_pink); ?>
        <input type="submit" value="View Player" name="submit">
    </form>


    <hr>
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a> | 
        <a href="http://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>    

</body>

</html>
