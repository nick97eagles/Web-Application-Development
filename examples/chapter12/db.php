<?php

$db_host = '127.0.0.1';
$db_port = '3307';
$db_user = 'dbname';
$db_pass = 'test123';
$db_name = 'todo';

try {
    $dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name",$db_user,$db_pass);  
} catch(Exception $e) {
    echo 'database error';
    exit;
}
?>