<?php

  # verify the student id
if (isset($_REQUEST['student_id'])) {
    $student_id = filter_var($_REQUEST['student_id'], FILTER_VALIDATE_INT);
} else {
    $student_id = '';
}

  # include database configuration file
include('db.php');

  # connect to database
$dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);

  # take care of dropping a class
if (isset($_REQUEST['del'])) {
    if ($student_id != '') {
        foreach ($_REQUEST['del'] as $oid => $junk) {
            $SQL = "DELETE FROM takes WHERE student_id=$student_id AND offering_id=$oid";
            $dbh->query($SQL);
        }
    };
}

  # add a course to a term
if (isset($_REQUEST['add']) && $student_id != '') {
    foreach ($_REQUEST['add'] as $tid => $junk) {
        $oid = $_REQUEST['toadd_' . $tid];
        $SQL = "INSERT INTO takes (student_id,offering_id) VALUES ($student_id,$oid)";
        $dbh->query($SQL);
    }
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Student Enrollment</title>
</head>

<body>
    <h1>Student Enrollment</h1>
    
    <p>
      Enter a student ID number to access a student&apos;s class schedule grouped by term.  
      You may then add or drop classes to any of the terms displayed.
    </p>

    <form action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="student_id" value="<?= $student_id ?>" placeholder="Student ID"/>
        <input type="submit" name="load" value=" Load Schedule "/>

<?php

  # load the name of this student
$SQL = "SELECT student_first,student_last FROM student WHERE student_id=$student_id";
$sth = $dbh->prepare($SQL);
$sth->execute();

  # if the student exists, print their name
if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    echo '<h2>' . $row['student_first'] . ' ' . $row['student_last'] . '</h2>';
      
  # if the student does not exist, print an error message
} else if ($student_id != '') {
    echo '<h2>No Student Found</h2>';
}

  # now load the student schedule information
$SQL = "SELECT offering_id,term_name,term_id,course_name,course_prefix,course_num,offering_section,";
$SQL .= "offering_instructor,offering_time FROM ((takes NATURAL JOIN offering)";
$SQL .= " NATURAL JOIN term) NATURAL JOIN course WHERE student_id=" . $student_id;
$SQL .= " ORDER BY term_id,course_prefix,course_num";
$sth = $dbh->prepare($SQL);
$sth->execute();

$last_term = '';
echo '<ul>';
while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    if ($row['term_name'] != $last_term) {
        if ($last_term != '') {
            echo '</ul></li>';
        } ?>
    <li><?= $row['term_name'] ?><select name="toadd_<?= $row['term_id'] ?>"><?php

    $SQL = "SELECT offering_id,course_name,offering_section FROM (offering NATURAL JOIN";
    $SQL .= " term) NATURAL JOIN course WHERE term_id=" . $row['term_id'];
    $sth2 = $dbh->prepare($SQL);
    $sth2->execute();

    while ($opt = $sth2->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $opt['offering_id'] . '">' . $opt['course_name'] . ' ' . $opt['offering_section'] . '</option>';
    }

    ?>
    </select>
    <input type="submit" name="add[<?= $row['term_id'] ?>]" value=" Add " />
      <ul>
<?php

    }
    $last_term = $row['term_name'];
    echo '<li>' . $row['course_prefix'] . $row['course_num'] . ': ' . $row['course_name'];
    echo " <input type='submit' name='del[" . $row['offering_id'] . "]' value=' Drop '/></li>";
}


?>
        </ul>
    </form>

    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>