<?php

# include database configuration file
include('db.php');

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
                <th>Student ID<a href="?field=student_id&sort=asc"><img src="images/sort_asc.png" alt="asc" /></a></th>
                <th>Student Name<a href="?field=student_name&sort=asc"><img src="images/sort_asc.png" alt="asc" /></a></th>
                <th>Level<a href="?field=level&sort=asc"><img src="images/sort_asc.png" alt="asc" /></a></th>
                <th>Major<a href="?field=major&sort=asc"><img src="images/sort_asc.png" alt="asc" /></a></th>
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

    <div>
        Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> 
        from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> 
        is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
    </div>

</body>

</html>
