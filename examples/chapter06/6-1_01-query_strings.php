<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Query Strings</title>
</head>

<body>
    <h1>Query Strings</h1>
    
    <p>
        Modify the URL for this page to see how it changes the REQUEST and SERVER 
        variables. You may also wish to use this 
        <a href="http://www.url-encode-decode.com/">URL encoder/decoder</a>
    </p>
        
    <h2>REQUEST variable</h2>
    <pre><code>   
<?php

print_r($_REQUEST);

?>
    </code></pre>

    <h2>SERVER variable</h2>
    <pre><code>    
<?php

print_r($_SERVER);

?>
    </code></pre>
    
    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
