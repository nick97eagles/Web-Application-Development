<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Hidden Inputs</title>
    <link rel="stylsheet" href="6-2_03-styling_forms.css"/>
</head>

<body>

    <h1>Hidden Inputs</h1>    
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <p>
            <label for="query">Query:</label>
            <input type="text" name="query" />
        </p>
        <input type="hidden" name="sneaky" value="you can't see me"/>
    </form>

    <h2>REQUEST variable</h2>
    <pre>    
<?php

print_r($_REQUEST);

?>
    </pre>
    
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
