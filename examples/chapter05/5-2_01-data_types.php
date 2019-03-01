<!DOCTYPE html>
<html>
  <head>
    <title>PHP data type examples</title>
  </head>
  <body>
    <h1>PHP Data Type Examples</h1>
    <p>	
<?php

  $var1 = "40.2";
  $var2 = "40";
  $var3 = 40.2;
  $var4 = 40;
  $var5 = true;
  $var2 = 30 + "10";

  echo "<ul>\n";
  echo "  <li>" . gettype($var1) . "</li>\n";
  echo "  <li>" . gettype($var2) . "</li>\n";
  echo "  <li>" . gettype($var3) . "</li>\n";
  echo "  <li>" . gettype($var4) . "</li>\n";
  echo "  <li>" . gettype($var5) . "</li>\n";
  echo "  <li>" . gettype($var6) . "</li>\n";
  echo "</ul>";

  echo "Evaluations: <ul>";
  echo "<li>",$var1==$var2,"</li>";
  echo "<li>",(int)($var1==$var2),"</li>";
  echo "<li>",(int)$var1==(int)$var2,"</li>";
  echo "<li>",$var1==$var3,"</li>";
  echo "<li>",$var1===$var3,"</li>";
  echo "<li>",$var2=="40.0","</li>";
  echo "<li>",strcmp($var2,"40.0"),"</li>";
  echo "</ul>";

?>
    </p>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
