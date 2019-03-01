<?php

  // process input variables
if (isset($_REQUEST['plist'])) {
    if (strip_tags($_REQUEST['plist']) == 1) {
        $page = 1;
        $title = 'Page 1';
    } else if (strip_tags($_REQUEST['plist']) == 2) {
        $page = 2;
        $title = 'Page 2';
    } else {
        $title = 'Invalid Selection';
    }
} else {
    $page = 'default';
    $title = 'Pick Your Page';
}


?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title><?php echo $title ?></title>
	
    <script language="JavaScript">
	
        // function to submit form if a page is chosen
        function doSubmit() {
            if(document.navForm.plist.selectedIndex != 0) {
            document.navForm.submit();
            }	
        }	
    </script>
</head>

<body>
<?php

if ($page == 1) {

?>  

        <h1>Page 1</h1>
        <p>You have selected page one content.  You may use the navigation list below to change this.</p>

<?php

} else if ($page == 2) {

    ?>

        <h1>Page 2</h1>
        <p>You have selected page two content.  You may use the navigation list below to change this.</p>

<?php

} else {

    ?>

        <h1>Select Your Page</h1>
        
<?php

}

?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" name="navForm">
        <label>
        <select name="plist" onchange="doSubmit();">
        <option value="">Select Your Page</option>
            <option value="1" <?php if ($page == 1) {
                                    echo 'selected="selected"';
                                } ?>>Page 1</option>
        <option value="2" <?php if ($page == 2) {
                            echo 'selected="selected"';
                        } ?>>Page 2</option>
        </select>
        </label>
    </form>

    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
