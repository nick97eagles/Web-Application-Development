<!DOCTYPE html>
<html>
  <head>
    <title>The Current Date</title>
  </head>
  <body>
    <h1>The current Date: </h1>
    <p><?= date("l, F jS, Y"); ?></p>
<?php if(date("G") > 20) { ?>     
    <p>It is late</p>
<?php } else { ?>      
    <p>It is still early</p>
<?php } ?>
    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
