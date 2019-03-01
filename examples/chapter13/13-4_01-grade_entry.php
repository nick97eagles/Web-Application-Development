<?php

# include database configuration file
include('db.php');

# load variables from query string
if (isset($_REQUEST['offering_id'])) {
    $offering_id = filter_var($_REQUEST['offering_id'], FILTER_VALIDATE_INT);
}

# connect to database
$dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);

# handle grade entry
if (isset($_POST['grades'])) {
    foreach ($_POST['grades'] as $sid => $grade) {
        $SQL = "UPDATE takes SET takes_grade = '$grade' WHERE student_id=$sid AND offering_id=$offering_id";
        $dbh->query($SQL);
    }
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Grade Entry</title>
</head>

<body>
    <h1>Grade Entry</h1>
    
    <p>
        Select a course offering from the drop-down list below to get a grade roster.  Enter grades 
        in that roster and click <em>save</em> to store those grades.
    </p>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?> ">
        <select name="offering_id">
<?php

$SQL = "SELECT offering_id,course_name,term_name,offering_section FROM ";
$SQL .= "((offering NATURAL JOIN term) NATURAL JOIN course) ORDER BY ";
$SQL .= "term_id,course_prefix,course_num";
$sth = $dbh->prepare($SQL);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $cname = $row['course_name'];
    if ($row['offering_section']) {
        $cname .= ', ' . $row['offering_section'];
    }
    $cname .= ', ' . $row['term_name'];
    ?>       
            <option value="<?= $row['offering_id'] ?>"<?php 
    if (isset($offering_id) && $offering_id == $row['offering_id']) {
        echo ' selected="selected"';
    }
            ?>><?= $cname ?></option>
<?php 
}
?>
        </select>
        <input type="submit" name="submit" value=" Load Roster "/>
    </form>
<?php

if (isset($offering_id)) { ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="offering_id" value="<?= $offering_id ?>"/>
        <table>
	        <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
	        <tbody>
<?php

$SQL = "SELECT student_id,student_first,student_last,takes_grade FROM ";
$SQL .= "takes NATURAL JOIN student WHERE offering_id=" . $offering_id;
$sth = $dbh->prepare($SQL);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row['student_id'] ?></td>
                    <td><?= $row['student_first'] . ' ' . $row['student_last'] ?></td>
                    <td><input type="text" size="4" name="grades[<?= $row['student_id'] ?>]" value="<?= $row['takes_grade'] ?>" /></td>
                </tr>
<?php

}
?>
            </tbody>
        </table>
        <input type="submit" name="submit_grades" value=" Store Grades "/>
    </form>
<?php

}
?>

    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>