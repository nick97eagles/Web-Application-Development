<?php

    // create a base class
    class baseClass {
	
      var $name;  // name of this object
	
      function __construct() {
	$this->name = "base guy";
        echo "I'm Initialized!<br />\n";
      }
	
      function whoAmI() {
	  echo "I'm the ",$this->name,"<br />\n";
      }
	
    }


    // create a child class
    class extendedClass extends baseClass {
	
      function __construct() {
	parent::__construct();
        $this->name = "child guy";
      }
	
    }


    // create a grandchild class
    class extendedClass2 extends extendedClass {
	
      function extendedClass2() {
	parent::__construct();
        $this->name = "grand child guy";
      }
	
      function whoAmI() {
	  echo "And me, I'm the ",$this->name,"!<br />\n";
      }
	
    }
	    

?>	
<!DOCTYPE html>
<html>
  <head>
    <title>Object Oriented Example</title>
  </head>
  <body>
    <h1>PHP Objects Example</h1>
<?php

    $obj = new baseClass();
    $obj->whoAmI();

    echo "    <br />\n";

    $obj2 = new extendedClass();
    $obj2->whoAmI();

    echo "    <br />\n";

    $obj3 = new extendedClass2();
    $obj3->whoAmI();

?>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>    
  </body>
</html>
