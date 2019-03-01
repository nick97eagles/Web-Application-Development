<?php

# process username
$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_NUMBER_INT);

# process password
$password = $_REQUEST['pword'];

# process status
if (count($_REQUEST['status']) > 0) {
    if (in_array('s', $_REQUEST['status'])) $tmpStatus[] = 'Student';
    if (in_array('f', $_REQUEST['status'])) $tmpStatus[] = 'Faculty';
    if (in_array('g', $_REQUEST['status'])) $tmpStatus[] = 'Guest';
}
$status = join(",", $tmpStatus);

# process standing
$standing = $_REQUEST['standing'];

# process housing
$housing = $_REQUEST['housing'];

# process dinning
$dining = $_REQUEST['dining'];

# process comments
$comments = strip_tags($_REQUEST['comments']);

?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <title>Your Form Submission</title>
    <link rel="stylesheet" href="6-4_02-forms_processing.css"/>
</head>

<body>
    <h1>Your Submission</h1>
    
    <p>
        Thank you for completing the example form.  Your input is as follows.  If you don't like it, you can <a href="6-2_01-forms.php">try again</a>.
    </p>

    <div>
        <div class="label">Username:</div>
        <div class="value"><?= $username ?></div>
    </div>        

    <div>
        <div class="label">Password:</div>
        <div class="value"><?= $password ?></div>
    </div>        

    <div>
        <div class="label">Status:</div>
        <div class="value"><?= $status ?></div>
    </div>        

    <div>
        <div class="label">Standing:</div>
        <div class="value"><?= $standing ?></div>
    </div>        

    <div>
        <div class="label">Housing:</div>
        <div class="value"><?= $housing ?></div>
    </div>        

    <div>
        <div class="label">Dinning Preferences:</div>
        <div class="value"><?= $dining ?></div>
    </div>        

    <div>
        <div class="label">Comments:</div>
        <div class="value" id="comments"><?= $comments ?></div>
    </div>        
    
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
