<!DOCTYPE html>
<html>
  <head>
    <title>PHP Array Examples</title>
  </head>
  <body>
    <h1>PHP Array Examples</h1>
    <p>
<?php

  $var1 = array('A','B','C','D');
  $var2 = array('name'=>'Sam','age'=>21,'gender'=>'Male');
  $var3 = 'B';
  $var4 = "X,Y,Z,W";

  $var1[] = 'E';

  echo "Array's and their Keys:<ul>";
  echo "<li>",$var1[3],"</li>";
  echo "<li>",$var2['age'],"</li>";
  echo "<li>",$var1,"</li>";
  echo "<li>",print_r($var1),"</li>";
  echo "<li>",print_r($var2),"</li>";
  echo "<li>",print_r(array_keys($var2)),"</li>";
  echo "<li>",print_r(array_values($var2)),"</li>";
  echo "<li>",is_array($var1),"</li>";
  echo "<li>",is_array($var3),"</li>";
  echo "<li>",in_array($var3,$var1),"</li>";
  echo "<li>",count($var1),"</li>";
  echo "<li>",implode(",",$var1),"</li>";
  echo "<li>",print_r(explode(",",$var4)),"</li>";

  // sort the arrays
  $var5 = $var2;
  sort($var5);
  echo "<li>",print_r($var5),"</li>";

  // now sort keeping keys
  $var5 = $var2;
  asort($var5);
  echo "<li>",print_r($var5),"</li>";

  // finally sort by keys
  $var5 = $var2;
  ksort($var5);
  echo "<li>",print_r($var5),"</li>";
  echo "</ul>";

  echo "Array Iteration:<ul>";
  foreach( $var2 as $key=>$val ) {
    echo "<li>",$key," = ",$val,"</li>";
  }
  echo "</ul>";

  reset($var2);

  echo "Another Way:<ul>";
  while( list($key,$val) = each($var2) ) {
    echo "<li>",$key," = ",$val,"</li>";
    if($key == 'age') break;
  }
  echo "</ul>";

  echo "You left off with: ",current($var2);
    
  

?>
    </p>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
