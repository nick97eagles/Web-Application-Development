<?php

# include database configuration file
include('../db.php');

# connect to database
$dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);

# mapping level to english
$level = array('High School', 'Freshman', 'Sophomore', 'Junior', 'Senior');

?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Student List</title>
</head>

<body>
    <h1>Student List</h1>
    
    <p>
        The students enrolled in a CS or MATH class.
    </p>
    
    <table>
       <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Level</th>
                <th>Major</th>
            </tr>
        </thead>
        <tbody>
<?php

$SQL = "SELECT s.student_id,s.student_first,s.student_last,s.student_level, d.department_name ";
$SQL .= "FROM department AS d NATURAL JOIN majors AS m NATURAL JOIN student AS s ";
$SQL .= "WHERE d.department_id = m.department_id AND m.student_id = s.student_id";
$sth = $dbh->prepare($SQL);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row['student_id'] ?></td>
                <td><?= $row['student_first'] . ' ' . $row['student_last'] ?></td>
                <td><?= $level[$row['student_level']] ?></td>
                <td><?= $row['department_name'] ?></td>
            </tr>
<?php
}
?>
    	</tbody>
    </table>

    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>
</body>

</html>
