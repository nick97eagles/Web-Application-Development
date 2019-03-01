<?php

  // function with local variable
  function LocalVar() {
    $local = 0;
    $local++;
    echo $local;
  }

  // function with static local variable
  function StaticVar() {
    static $local = 0;
    $local++;
    echo $local;
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>PHP Variable Examples</title>	 
  </head>
  <body>
    <h1>PHP Variable Examples</h1>
    <p>
<?php

  error_reporting(15);

  $variable_1 = 'hello';
  $variable_2 = 'there';
  $variable_3 = 'how';
  $variable_4 = 'are';
  $variable_5 = 'you';

  for($i=1;$i<6;$i++) {
      
    // double quotes
    $toshow = "variable_$i";
    echo $toshow . ': ' . $$toshow;
      
    // separating space
    echo '<br />';    
            
  }


  echo '<br /><br />Wrong: ';
  for($i=0;$i<9;$i++) { LocalVar(); }

  echo '<br /><br />Right: ';
  for($i=0;$i<9;$i++) { StaticVar(); }


?>  
    </p>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
