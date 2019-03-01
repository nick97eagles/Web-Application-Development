<!DOCTYPE html>
<html>
  <head>
    <title>PHP String Examples</title>
  </head>
  <body>
    <h1>PHP String Examples</h1>
    <p>
<?php

  $str1 = "This is a string to play with. ";
  $str2 = "Here is another one.";

  echo "Results: <ul>\n";
  echo "<li>",$str1[5],"</li>\n";
  echo "<li>",$str1 . $str2,"</li>\n";
  echo "<li>",strpos($str1,"is"),"</li>\n";
  echo "<li>",substr($str2,5,10),"</li>\n";
  echo "<li>",$str1,"</li>\n";
  echo "<li>",chop($str1),"</li>\n";
  echo "<li>",strtoupper($str2),"</li>\n";
  echo "</ul>";

?>
    </p>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
