<!DOCTYPE html>
<html lang = 'en'>
<body>
<!--  Form just searches for book title  -->
<form id="search">
    Search Book Title: 
    <input name="Search" />
    <input type="submit" value="Search"/>
</form>
<?php
if(isset($_GET['Search'])){
     include("info.php"); 
}
?>
</body> 
</html>