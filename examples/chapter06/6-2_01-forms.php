<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Form Example</title>
    <link rel="stylesheet" href="6-2_03-styling_forms.css"/>
</head>

<body>
    <h1>A Simple Form</h1>
    
    <!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get"> -->
    <form action="6-4_02-forms_processing.php" method="get">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" size="10" maxlength="15" value="enter username" />
	
            <label for="pword">Password:</label>
            <input type="password" name="pword" value="you can't read this!" />
	
            <label for="status">Status:</label>
            <input type="checkbox" name="status[]" value="s" />Student
            <input type="checkbox" name="status[]" value="f" checked="checked" />Faculty
            <input type="checkbox" name="status[]" value="s" />Staff
            <input type="checkbox" name="status[]" value="g" />Guest
            
            <label for="standing">Standing:</label>
            <input type="radio" name="standing" value="fr" />Freshman
            <input type="radio" name="standing" value="so" />Sophomore
            <input type="radio" name="standing" value="jr" />Junior
            <input type="radio" name="standing" value="sr" />Senior
            <input type="radio" name="standing" value="na" checked="checked" />Not Applicable
            
            <label for="housing">Hosing:</label>
            <select name="housing">
                <optgroup label="On Campus">
                    <option value="c">Connard</option>
                    <option value="f">Foreman</option>
                    <option value="m">Meske</option>
                    <option value="s">Sittner</option>
                </optgroup>
                <optgroup label="Off Campus">
                    <option value="co">College Owned</option>
                    <option value="ot">Other</option>
                </optgroup>
            </select>
            
            <label for="dining[]">Dining:</label>
            <select name="dining[]" multiple="multiple" size="3">
                <option value="c">Cafeteria</option>
                <option value="h">At Home</option>
                <option value="p">Professors&apos; Homes</option>
                <option value="t" selected="selected">Taco Bell</option>
                <option value="d" selected="selected">Del Taco</option>
                <option value="y" selected="selected">Yungapettie&apos;s</option>
            </select>
            
            <label for="comments">Comments:</label>
            <textarea name="comments" rows="4" cols="80">Place Comments Here</textarea>
            
            <input type="reset" value="Reset Form" />
        <input type="submit" value="Submit Form" />
        </p>
    </form>
    
    <pre>
<?php 
print_r($_REQUEST)
?>
    </pre>

    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
