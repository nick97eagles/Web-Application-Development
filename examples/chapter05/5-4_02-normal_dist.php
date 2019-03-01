<?php

  // number of decimal places
  $decimal = 4;

  // function to approximate cumulative normal distribution using power series
  function normalDist($zScore) {
    $p = floatval(0.2316419);
    $b1 = floatval(0.319381530);
    $b2 = floatval(-0.356563782);
    $b3 = floatval(1.781477937);
    $b4 = floatval(-1.821255978);
    $b5 = floatval(1.330274429);
    $t = 1/(1 + ($p * floatval($zScore)));
    $zx = (1/(sqrt(2 * pi())) * (exp(0 - pow($zScore, 2)/2)));
      
    $px = 1 - floatval($zx) * (($b1 * $t) + ($b2 * pow($t, 2)) + ($b3 * pow($t, 3)) + ($b4 * pow($t, 4)) + ($b5 * pow($t,5)));
    return $px;
  }

  // function to print a row for z = #.#
  function print_row($z = 0) {
    
    // register global variable
    global $decimal;
      
    // row heading
    echo "        <tr>\n";
    echo "          <th>",sprintf("%0.01f",$z),"</th>\n";
      
    // entries in row
    for ($i=0.00;$i<=0.09;$i+=0.01) {
      echo "          <td>",sprintf('%0.0'.$decimal.'f',normalDist($z+$i)),"</td>\n";
    }

    // end row
    echo "        </tr>\n";
      
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Normal Distribution Table</title>
  </head>
  <body>

    <table border="1" cellpadding="5" cellspacing="0" align="center">
      <thead>
        <tr>
	  <th></th>
<?php
      for ($i=0;$i<=0.09;$i+=0.01) {
        echo '          <th>',sprintf("%0.02f",$i)."</th>\n";
      }
?>      
        </tr>
      </thead>
      <tbody>
<?php
      for ($z=0;$z<3.1;$z+=0.1) {
          print_row($z);
      }
?>
      </tbody>
    </table>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>	
  </body>
</html>
